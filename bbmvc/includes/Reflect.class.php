<?php

/* ************************************************************************* */
/*                                                                           */
/*  Title:       Reflect.php                                                 */
/*                                                                           */
/*  Created on:  16.10.2015 at 07:54:34                                      */
/*  Email:       ovidiugabriel@gmail.com                                     */
/*  Copyright:   (C) 2015 ICE Control srl. All Rights Reserved.              */
/*                                                                           */
/*  $Id$                                                                     */
/*                                                                           */
/* ************************************************************************* */

/* * *************************************************************************
 *  Copyright (c) 2015, ICE Control srl
 *  All rights reserved.
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
 *
 * ************************************************************************* */

/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/* History (Start).                                                          */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/*                                                                           */
/* Date         Name    Reason                                               */
/* ------------------------------------------------------------------------- */
/* 16.10.2015           Added comments                                       */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/* History (END).                                                            */
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */


class Reflect {
    /** 
     * A specific class loader implementation is not needed because to be passed
     * as parameter because the Barebone system class loader provides the static method
     * ClassLoader::addIncludePath() which is based on the native PHP loader.
     * 
     * So if you come from a Java background, calling this function is equivalent with:
     * 
     * <code>
     *      Class<Test> c = Class.forName(name);
     * </code>
     * 
     * @param string|object $class - Either a string containing the name of the class to reflect, or an object.
     * @return ReflectionClass
     * @proto static public getReflectionClass(s_class:Dynamic):php.ReflectionClass
     */
    static public function getReflectionClass($class) {
        static $reflections = array();
        $class_name = self::getClassName($class);
        if (!isset($reflections[$class_name])) {
            $reflections[$class_name] = new ReflectionClass($class);
        }
        return $reflections[$class_name];
    }
    
    /**
     * 
     * @staticvar array $reflections
     * @param string $class
     * @param string $method
     * @return ReflectionMethod
     * @proto static public getReflectionMethod(class:String, method:String):ReflectionMethod
     */
    static public function getReflectionMethod($class, $method) {
        static $reflections = array();
        $class_name = self::getClassName($class);
        if (!isset($reflections[$class_name][$method])) {
            $reflection_class = self::getReflectionClass($class);
            $reflections[$class_name][$method] = $reflection_class->getMethod($method);
        }
        return $reflections[$class_name][$method];
    }
    
    /**
     * 
     * @param object $object
     * @param string $method
     * @param array $args
     * @return mixed
     * @proto static public invoke(object:Dynamic, method:String, ?args:Array):Dynamic
     */
    static public function invoke($object, $method, array $args = array()) {
        return call_user_func_array(array($object, $method), $args);
    }
    
    /**
     * 
     * @param string|object $class
     * @return string
     * @noproto
     */
    static private function getClassName($class) {
        return is_string($class) ? $class : get_class($class);
    }
}
