<?php

/* * *************************************************************************
 *                            ClassLoader.class.php
 *                    ------------------------------------
 *            begin     : Apr 10, 2007
 *            copyright : (C) Brehar Mihai-Tudor,  BMR Soft srl, ICE Control srl
 *            email     : mihai@secure-hosting.ro
 *
 *    $Id$
 *
 * ************************************************************************* */

/*
 * Copyright (c) 2006, BMR Soft srl, ICE Control srl
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
/* 25.10.2015           Make use of ClassLoader::getResource()               */
/* 16.10.2015           Added addIncludePath() method                        */
/* 18.09.2015           Blocked PHP_Invoker loading                          */
/* 30.07.2015           Switched to from class.F.php to F.class.php          */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/* History (END).                                                            */
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

/**
 * @package barebone
 */


if (!defined('_VALID_ACCESS')) {
    throw new Exception('Access denied!');
}


/**
 * The building block of the framework that makes runtime magic possible. ClassLoader
 * is responsible with loading classes at runtime based on their package path.
 * Along with the ClassLoader, the Dispatcher creates the foundation of this framework.
 *
 * @package barebone
 * @access public
 */
class ClassLoader {
    const RESOURCE_TYPE_CLASS = 'class';
    static private $removed_classes = array();

    /**
     * Finds the resource with the given name.
     *
     * @param string $name
     * @param string $type
     * @proto static public getResource(name:String):String
     */
    static public function getResource($name, $type) {
        $allowed_types = array(self::RESOURCE_TYPE_CLASS);
        if (!in_array($type, $allowed_types)) {
            throw new Exception("Type {$type} not allowed");
        }
        return str_replace('.', '/', $name) . ".{$type}.php";
    }

    /**
     * Registers the __autoload function if it exists and the ClassLoader::autoload()
     * function as autoload functions. It shall be called from bootstrap.
     */
    static public function register() {
        if (function_exists('__autoload')) {
            spl_autoload_register('__autoload');
        }
        spl_autoload_register(array('ClassLoader', 'autoload'));
    }

    /**
     * Put a class name on the list of classes that won't be loaded.
     * Introduced to mute errors that are caused by libraries trying to use
     * class_exists() function, that triggers auto-loading with require_once().
     *
     * @param  string $class_name
     * @return void
     */
    static public function removeClass($class_name) {
        if (!in_array($class_name, self::$removed_classes)) {
            self::$removed_classes[] = $class_name;
        }
    }

    /**
     *
     * @see http://php.net/manual/en/function.spl-autoload.php
     * @see http://php.net/manual/en/function.spl-autoload-register.php
     *
     * @param string $class_name
     * @return void
     */
    static public function autoload($class_name) {
        if (in_array($class_name, self::$removed_classes)) {
            return;
        }
        require_once $class_name . '.class.php';
    }

    /**
     * In Haxe, import is a reserved keyword.
     *
     * [_import description]
     * @return [type] [description]
     * @proto static public _import(name:String):Void
     */
    static public function _import($name, $fn = null) {
        return self::import($name, $fn);
    }

    /**
     * Part of class loader (not dispatcher).
     * Name respects the format defined by:
     * https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md
     *
     * Acts in a way similar with: https://docs.joomla.org/Jimport
     *
     * @param string $name
     * @return void
     * @throws InvalidArgumentException
     *
     */
    static public function import($name, $fn = null) {
        $pieces = explode('.', $name);
        $class = array_pop($pieces);

        $st = substr($class, 0, 1);
        if ((!ctype_alpha($st)) && ('_' != $st)) {
            throw new InvalidArgumentException('Illegal identifier: ' . $class, 1);
        }

        require_once self::getResource($name, self::RESOURCE_TYPE_CLASS);
        if (null !== $fn) {
            $fn();
        }
    }

    /**
     * If you have a Java background:
     *
     * <code>
     *      Test t = Class.forName("test").newInstance();
     * </code>
     *
     *
     * <code>
     *      // In the header we do all imports to favor op-code cache
     *      import('test');
     *
     *      // Inside functions/methods we create instances
     *      $t = ClassLoader::createInstance('test');
     * </code>
     *
     * @param string $name
     * @return object
     * @proto static public createInstance(name:String):Dynamic
     */
    static public function createInstance($name) {
        return self::getInstance($name, false);
    }

    /**
     * If you feel the need to change object properties prior to use,
     * please consider using ClassLoader::requireObject() or ClassLoader::requireClass() instead.
     *
     * @param string $name
     * @param boolean $singleton - when FALSE a new instance is created
     * @return object
     * @proto static public getInstance(name:String, singleton:Bool):Dynamic
     */
    static public function getInstance($name = null, $singleton = true) {
        if (null === $name) {
            // TODO: Return the active controller and throw a deprecation warning.
        }

        $class = str_replace('.', '_', $name);
        if (!$singleton) {
            return new $class;
        }

        // otherwise is singleton and we are searching for Class()

        if (function_exists($class)) {
            return $class();
        }

        // search for Class::instance()

        if (method_exists($class, 'instance')) {
            return call_user_func(array($class, 'getInstance'));
        }

        // search for Class::getInstance()

        if (method_exists($class, 'getInstance')) {
            return call_user_func(array($class, 'getInstance'));
        }

        return self::singleton($name);
    }

    /**
     * @param string $name
     * @return object
     * @proto static public singleton(name:String):Dynamic
     */
    static public function singleton($name) {
        static $instances = array();

        if (!isset($instances[$name])) {
            $instances[$name] = new $name();
        }
        return $instances[$name];
    }

    /**
     * Returns the singleton instance of the given type name.
     * If a callable is specified, then it returns the instance or the value returned by the callback function.
     *
     * @param string $name
     * @param callable $fn
     * @return mixed
     * @proto static public requireObject<F>(name:String, fn:F):Dynamic
     */
    static public function requireObject($name, $fn = null) {
        self::import($name);
        $object = self::getInstance($name);
        if (null == $fn) {
            return $object;
        }
        return $fn($object);
    }

    /**
     * Creates an instance of the given type name.
     * Returns the instance or the value returned by the callback function.
     *
     * @param string $name
     * @param callable $fn
     * @return mixed
     * @proto static public requireClass<F>(name:String, fn:F):Dynamic
     */
    static public function requireClass($name, $fn = null) {
        self::import($name);
        $object = self::createInstance($name);
        if (null == $fn) {
            return $object;
        }
        return $fn($object);
    }

    /**
     *
     * @param string $path
     * @return void
     */
    static public function addIncludePath($path) {
        set_include_path(get_include_path() . PATH_SEPARATOR . $path);
    }

}

/**
 * @param string $package
 * @return void
 */
function declare_namespace($package) {
    $bt = debug_backtrace();
    $file = $bt[0]['file'];
}

/*                                                                    */
/* --- ALIAS FUNCTIONS ---                                            */
/*                                                                    */

/**
 * Alias of ClassLoader::import()
 *
 * @param string $name
 * @param callback $fn
 * @return void
 */
function import($name, $fn = null) {
    ClassLoader::import($name, $fn);
}

/**
 * Alias of ClassLoader::createInstance()
 *
 * @param string $name
 * @return object
 */
function create_instance($name) {
    return ClassLoader::createInstance($instance);
}

/**
 * Alias of ClassLoader::getInstance()
 *
 * @param string $name
 * @param boolean $singleton
 * @return object
 */
function get_instance($name = null, $singleton = true) {
    return ClassLoader::getInstance($name, $singleton);
}

/**
 * Alias of ClassLoader::singleton()
 *
 * @param string $name
 * @return object
 */
function singleton($name) {
    return ClassLoader::singleton($name);
}

/**
 * Alias of ClassLoader::requireObject()
 *
 * @param string $name
 * @param callable $fn
 * @return mixed
 */
function require_object($name, $fn = null) {
    return ClassLoader::requireObject($name, $fn);
}

/**
 * Alias of ClassLoader::requireClass()
 *
 * @param string $name
 * @param callable $fn
 * @return mixed
 */
function require_class($name, $fn = null) {
    return ClassLoader::requireClass($name, $fn);
}

// EOF
