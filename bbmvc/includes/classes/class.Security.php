<?php

/* * *************************************************************************
 *                               class.Security.php
 *                    ------------------------------------
 *            begin     : 04.04.2007
 *            copyright : (C) 2007 Ovidiu Farauanu, Mihai Brehar
 *            email     : ovidiugabriel@gmail.com, mihai@secure-hosting.ro
 *
 *    $Id:class.Security.php 262 2007-06-07 18:38:47Z mihai $
 *
 * ************************************************************************* */

 /*
  * Copyright (c) 2007-2015, BMR Soft srl, ICE Control srl
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
/* 20.09.2015           Compacted isInt(), isNatural()                       */
/* 20.09.2015           Moved checkVariables() function from Dispatcher.     */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/* History (END).                                                            */
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

/**
 * @package	barebone
 * @version SVN: $Id:class.Security.php 262 2007-06-07 18:38:47Z mihai $
 * @author Ovidiu Farauanu <ovidiugabriel@gmail.com>
 */
if (!defined('_VALID_ACCESS')) {
    throw new Exception('Access denied!');
}

/**
 * @access public
 */
class Security {
    /** 
     * @param mixed $value
     */
    static public function checkVariablesGeneral($value) {
        static $secrules = null;
        if (null == $secrules) {
            // FIXME: Add a better loader
            // $secrules = require_once 'secrules.php';
        }
        
        foreach($secrules as $key => $rule){
            if (!$rule['enabled']) { // rule is not enabled
                continue;
            }

            if (is_array($value)) {
                foreach ($value as $v) {
                    checkVariablesGeneral($v);
                }
            } else {
                if (preg_match($rule['rule'], urldecode($value))) {
                    throw new Exception("{$key} Attack");
                    die; // Do not continue past this point.
                }
            }
        }
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
    static public function checkVariables(ReflectionClass $class, Security $security, /* string */ $array) {
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
     * @param string $input
     * @param string $scanFormat
     * @param string $printFormat
     * @param callable $escapeFunction
     * @param string $type
     * @return string
     */
    static public function scanPrintEscape($input, $scanFormat, $printFormat = null, $escapeFunction = null, $type = 'text') {
        $scanResult = sscanf($input, $scanFormat);
        if (null == $printFormat) {    // If print format not specified
            $printFormat = $scanFormat; // use the same format as for scan
        }
        array_unshift($scanResult, $printFormat);
        $printResult = call_user_func_array('sprintf', $scanResult);
        if (null != $escapeFunction) {
            return $escapeFunction($printResult, $type);
        }
        return $printResult;
    }

    /**
     *
     * @param string $string
     * @return boolean
     */
    protected function isInt($string) {
        return (bool) ereg("^\-{0,1}[0-9]+$", $string);
    }

    /**
     *
     * @param string $string
     * @return boolean
     */
    protected function isNatural($string) {
        return (bool) ereg("^[0-9]+$", $string);
    }

}

// EOF
