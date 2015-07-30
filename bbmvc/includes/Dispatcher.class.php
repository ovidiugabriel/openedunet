<?php

/* * *************************************************************************
 *                            Dispatcher.class.php
 *                    ------------------------------------
 *            begin     : Oct 30, 2006
 *            copyright : (C) Brehar Mihai-Tudor
 *            email     : mihai@secure-hosting.ro
 *
 *    $Id$
 *
 * *************************************************************************

 * *************************************************************************
 *  Copyright (c) 2006-2015, BMR Soft srl, ICE Control srl
 *  All rights reserved.
 *
 *  Redistribution and use in source and binary forms, with or without
 *  modification, are permitted provided that the following conditions are met:
 *      - Redistributions of source code must retain the above copyright
 *        notice, this list of conditions and the following disclaimer.
 *      - Redistributions in binary form must reproduce the above copyright
 *        notice, this list of conditions and the following disclaimer in the
 *        documentation and/or other materials provided with the distribution.
 *      - Neither the name of the <organization> nor the
 *        names of its contributors may be used to endorse or promote products
 *        derived from this software without specific prior written permission.
 *
 *  THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 *  ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 *  WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 *  DISCLAIMED. IN NO EVENT SHALL <COPYRIGHT HOLDER> BE LIABLE FOR ANY
 *  DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 *  (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 *  LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 *  ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 *  (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 *  SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/* History (Start).                                                          */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/*                                                                           */
/* Date         Name    Reason                                               */
/* ------------------------------------------------------------------------- */
/* 27.06.2015           Added HaXe StringMap support                         */
/* 27.06.2015           Added HaXe anonymous structure support               */
/* 22.06.2015           Replaced dispatcher function with Dispatcher class   */
/* 08.06.2015           Moved require_object(), etc to class_loader.php      */
/* 13.06.2014           Added InvalidArgumentException to import()           */
/* 11.03.2014           Added require_object(), require_class()              */
/*                      and improved construct().                            */
/* 26.02.2014           Added import() and create() functions                */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/* History (END).                                                            */
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

/**
 * @package barebone
 */

if (!defined('_VALID_ACCESS')) {
    throw new Exception('Access denied!');
}


/*                                                                           */
/* INCLUDE FILES (DEPENDENCIES)                                              */
/*                                                                           */

require_once __DIR__ . '/NativeArray.class.php';



/**
 * Public interface function to allow usage of redirect() function,
 * without using resolution operator.
 *
 * The controller class also defines a redirect() method that can be used
 * from children Controller classes in HaXe without referincing the Dispatcher.
 * Althought this is not a recommended practice.
 *
 * @param array|string $params
 * @return void
 * @throws InvalidArgumentException
 */
function redirect($params) {
    return Dispatcher::redirect($params);
}

// TODO: Consider moving to a `headers` class or something like that.
function no_cache() {
    Dispatcher::header('Last-Modified', gmdate('D, d M Y H:i:s') . ' GMT');
    Dispatcher::header('Cache-Control', 'no-store, no-cache, must-revalidate');
    Dispatcher::header('Cache-Control', 'post-check=0, pre-check=0', Dispatcher::HEADER_REPLACE_NO);
    Dispatcher::header('Pragma', 'no-cache');
}

/**
 * The Core building block of the framework. Along with the ClassLoader, the
 * Dispatcher creates the foundation of this framework.
 *
 * @package barebone
 */
class Dispatcher {
    /**
     * Do not replace existing header.
     *
     * Used as 3rd parameter for Dispatcher::header()
     */
    const HEADER_REPLACE_NO  = false;

    /**
     * Replace existing header.
     *
     * Used as 3rd parameter for Dispatcher::header()
     */
    const HEADER_REPLACE_YES = true;

    /**
     * Sends header to instruct the client to execute a redirect.
     *
     * @param array|string $params The list of parameters used to build a query string. <br/>
     *      If a string is given then it is used as is. <br/>
     *      Haxe types are supported. <br/>
     * @return void
     * @throws InvalidArgumentException
     *
     */
    static public function redirect($params) {
        // If HaXe Runtime is loaded and the argument is an anonymous structure
        // it is automatically converted to a native array
        $params =  NativeArray::fromHaxeType($params);

        $url_params = '';

        if (is_array($params) || ($params instanceof ArrayAccess)) {
            foreach ($params as $key => $value) {

                if (is_array($value)) {
                    //arrays are also possible, in this case, we are "expanding" the array
                    foreach ($value as $sub_key => $sub_value) {
                        $url_params .= $key . '[' . $sub_key . ']=' . urlencode($sub_value) . '&';
                    }
                } else {
                    $url_params .= $key . '='. urlencode($value) .'&';
                }
            }

            //removing the last ampersend
            $url_params = '?' . substr($url_params, 0, strlen($url_params) - 1);
        } elseif (is_string($params)) {
            // If string passed as argument ...
            $url_params = $params;
        } else {
            throw new InvalidArgumentException('Wrong type argument passed to redirect()');
        }
        $url = _URL_MAIN . '/' . _FILE_MAIN . $url_params;

        //saving session...
        session_write_close();

        require_object('Response')->addHeader('Location', $url);
        die;
    }

    /**
     * Performs a security check on the contents of superglobal variables and throws
     * an exception if suspicious input is found.
     *
     * @param ReflectionClass $class a reflection of the Security class instance
     * @param Security $security an instance of the Security class
     * @param string $array the name of the superglobal to check: _GET, _POST, _COOKIE
     * @return void
     * @throws Exception throws SecurityException if something strange has been found in the input
     */
    static public function checkVariables(ReflectionClass $class, Security $security, $array) {
        //$array should be $_GET, $_POST, $_COOKIE
        global $$array;
        if (empty($$array)) {
            return;
        }

        foreach ($$array as $key => $value) {
            if (('module' == $key) || ('action' == $key)) {
                //skipping module and action parameters
                continue;
            }

            //the security class should have a method called check_GET_variableName (just an example)
            $function_name = 'check' . $array . '_' . $key;
            $method = $class->getMethod($function_name); //if the method does not exist, an exception will be thrown
            //finally, calling the function
            $security->$function_name($value);
        }
    }

    /**
     * Creates an URL string using Seo classes specified in a module.
     * This functionality is in reverse of what routers do in a web application.
     *
     * @param array $params the list of parameters. Haxe types are supported.
     * @param boolean $html_entity whether to encode HTML entities
     * @return string the URL using _URL_MAIN as base
     */
    static public function getSeoUrl($params, $html_entity = false) {
        $params = NativeArray::fromHaxeType($params);
        assert( is_array($params) || ($params instanceof ArrayAccess) );

        if (isset($params['href'])) {
            return _URL_MAIN . '/' . $params['href'];
        }

        if (empty($params['module'])) {
            throw new Exception('getSeoUrl - no module');
            return;
        }

        $href = _FILE_MAIN . '?'; // URL to be used if SEO is not enabled.
        $parts = array();
        foreach ($params as $key => $value) {
            if (substr($key, 0, 4) == 'seo_') { // ignoring seo_* params
                continue;
            }
            $parts[] = $key . '=' .$value;
        }

        $href = implode(($html_entity ? '&amp;' : '&'), $parts);
        // done building $href

        if (!_USE_SEO_LINKS) {
            return _URL_MAIN . '/' . $href;
        }

        if (empty($params['action'])) {
            $params['action'] = _DEFAULT_ACTION;
        }

        // calling the seo functions of the module
        $seo_class = $params['module'] . 'Seo';

        if (is_file(_DIR_MODULES . '/' . $params['module'] . '/class.' . $seo_class . '.php')) { // module file check
            include_once(_DIR_MODULES . '/' . $params['module'] . '/class.' . $seo_class . '.php');
            try {
                $class = new ReflectionClass($seo_class); //throws exception if the class is not existing
                $action = 'seo_' . $params['action'];
                $method = $class->getMethod($action); //check for public method
                if ($method->isPublic()) {
                    $obj = new $seo_class();
                    return _URL_MAIN . '/' . $obj->$action($params); //calling the seo method
                }
            } catch (Exception $e) {
                // no seo_class or method not existing
            }
        }

        return _URL_MAIN . '/' . $href;
    }
} // end class Dispatcher

// EOF
