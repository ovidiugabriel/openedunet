<?php

/* * *************************************************************************
 *                            Dispatcher.class.php
 *                    ------------------------------------
 *            begin     : Oct 30, 2006
 *            copyright : (C) Brehar Mihai-Tudor,  BMR Soft srl, ICE Control srl
 *            email     : mihai@secure-hosting.ro
 *
 *    $Id$
 *
 * **************************************************************************/

 /*
  * Copyright (c) 2006-2015, BMR Soft srl, ICE Control srl
  * All rights reserved.
  *
  * Redistribution and use in source and binary forms, with or without modification,
  * are permitted provided that the following conditions are met:
  *
  * 1. Redistributions of source code must retain the above copyright notice, this
  * list of conditions and the following disclaimer.
  *
  * 2. Redistributions in binary form must reproduce the above copyright notice,
  * this list of conditions and the following disclaimer in the documentation
  * and/or other materials provided with the distribution.
  *
  * 3. Neither the name of the copyright holder nor the names of its contributors
  * may be used to endorse or promote products derived from this software without
  * specific prior written permission.
  *
  * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
  * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
  * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
  * IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT,
  * INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
  * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
  * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF
  * LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE
  * OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF
  * ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
  */

/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/* History (Start).                                                          */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/*                                                                           */
/* Date         Name    Reason                                               */
/* ------------------------------------------------------------------------- */
/* 16.10.2015           Fixed a bug in executeAction()                       */
/* 20.09.2015           Moved checkVariables() to Security class             */
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
    Dispatcher::header('Cache-Control', 'post-check=0, pre-check=0', Response::HEADER_REPLACE_NO);
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
     *
     * @var array
     */
    private $formats = array();
    
    /** 
     * @param array $formats the list of regular expression formats used to call the action method
     */
    public function __construct(array $formats = array()) {
        $this->formats = $formats;
    }

    /**
     * Sends header to instruct the client to execute a redirect.
     *
     * @param array|string $params_list The list of parameters used to build a query string. <br/>
     *      If a string is given then it is used as is. <br/>
     *      Haxe types are supported. <br/>
     * @return void
     * @throws InvalidArgumentException
     *
     */
    static public function redirect($params_list) {
        // If HaXe Runtime is loaded and the argument is an anonymous structure
        // it is automatically converted to a native array
        $params =  NativeArray::fromHaxeType($params_list);

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

        // TODO: load barebone.Response here instead of Response
        require_object('Response')->addHeader('Location', $url);
        die;
    }

    /* Moved checkVariables() to Security class */

    /**
     * Creates an URL string using Seo classes specified in a module.
     * This functionality is in reverse of what routers do in a web application.
     *
     * @param array $params_list the list of parameters. Haxe types are supported.
     * @param boolean $html_entity whether to encode HTML entities
     * @return string the URL using _URL_MAIN as base
     */
    static public function getSeoUrl($params_list, $html_entity = false) {
        $params = NativeArray::fromHaxeType($params_list);
        assert( is_array($params) || ($params instanceof ArrayAccess) );

        if (isset($params['href'])) {
            return _URL_MAIN . '/' . $params['href'];
        }

        if (empty($params['module'])) {
            throw new Exception('getSeoUrl - no module');
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
        try {
            $action = 'seo_' . $params['action'];

            $obj = Factory::getSeoClass($params['module']);
            $method = Reflect::getReflectionMethod($obj, $action);
            
            if ($method->isPublic()) {
                
                return _URL_MAIN . '/' . $obj->$action($params); //calling the seo method
            }
        } catch (Exception $e) {
            log_message(LOG_ERR, $e->getMessage());
            // no seo_class or method not existing
        }
        return _URL_MAIN . '/' . $href;
    }
    
    /**
     * Runs the `action` method. Dispatches the call into the current object
     * trying to invoke a function that can respond to the `action` request.
     *
     * If there is no such action, and exception will be thrown.
     *
     * @param string $module_classname the name of the class
     * @param string $func_name the name of the method
     * @param array $param_arr
     * @return mixed
     * @throws Exception
     */
    public function executeAction($module_classname, $func_name, array $param_arr = array()) {
        //
        // - "action_" prefix is used in Kohana and FuelPHP
        // - "do" prefix is used by the HaXe web dispatcher (See package: http://api.haxe.org/haxe/web/)
        // - Barebone MVC and CodeIgniter, CakePHP, etc. used no prefix;
        // - Phalcon uses "Action" suffix.
        //

        // BareboneMVC solves this issue with case insensitive elegant pattern matching
        // You just have to register other formats if needded.
        $controller = new $module_classname();
        foreach ($this->formats as $format) {
            $matches = array();
            if (0 == preg_match('/' . $format . '/i', $func_name, $matches)) {
                continue;
            }            
            $method_name = $matches[1];
            if (!method_exists($controller, $method_name)) {
                throw new Exception("Method {$module_classname}::{$method_name}() does not exists.", 1);
            }
            return Reflect::invoke($controller, $method_name, $param_arr);
        }
        // invoke() method throws an exception if method does not exists
        // so we don't check if method exists prior to this call
        return Reflect::invoke($controller, $func_name, $param_arr);
    }

    static public function dispatch() {
        // We are running the old code for a while.
        require __DIR__ . '/dispatcher.php';
    }
} // end class Dispatcher

// EOF
