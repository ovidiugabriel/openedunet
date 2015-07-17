<?php

/* * *************************************************************************
 *                            ClassLoader.class.php
 *                    ------------------------------------
 *            begin     : Apr 10, 2007
 *            copyright : (C) Brehar Mihai-Tudor
 *            email     : mihai@secure-hosting.ro
 *
 *    $Id$
 *
 * ************************************************************************* */

/* * *************************************************************************
 *
 *    This program is Free Software; you can redistribute it and/or
 *    modify it under the terms of the GNU General Public License
 *    as published by the Free Software Foundation; either version 2
 *    of the License, or (at your option) any later version.
 *
 *    This program is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *    GNU General Public License for more details.
 *    You should have received a copy of the GNU General Public License
 *    along with this program; if not, write to the Free Software
 *    Foundation, Inc., 59 Temple Place - Suite 330,
 *    Boston, MA  02111-1307, USA.
 *
 * ************************************************************************* */

/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/* History (Start).                                                          */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/*                                                                           */
/* Date         Name    Reason                                               */
/* ------------------------------------------------------------------------- */
/*                                                                           */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/* History (END).                                                            */
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */


if (!defined('_VALID_ACCESS')) {
    throw new Exception('Access denied!');
}

/**
 *
 * @see http://php.net/manual/en/function.spl-autoload.php
 * @see http://php.net/manual/en/function.spl-autoload-register.php
 * 
 * @param string $class_name
 * @return null
 */
function __autoload($class_name) {

    switch ($class_name) {

        case 'Smarty':
            if (is_file($file = (_DIR_LIBRARIES . '/Smarty-' . _SMARTY_VERSION . '/libs/Smarty.class.php'))) {
                // smarty is bundled in bbmvc package
                require_once $file;
            } else {
                // smarty is not bundled in bbmvc package, maybe it is bundled in php distro
                require_once 'Smarty.class.php';
            }
            return;

        default:
            require_once _DIR_PROJECT . '/includes/classes/class.' . $class_name . '.php';
    }
}

/** @access public */
class ClassLoader {
    static public function autoload() {
        
    }
    
    /** 
     * Part of class loader (not dispatcher).
     * Name respects the format defined by:
     * https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md 
     * 
     * Acts in a way similar with: https://docs.joomla.org/Jimport
     * 
     * @param string $name
     * @throws InvalidArgumentException
     * @proto static public import(name:String) 
     */
    static public function import($name) {
        $pieces = explode('.', $name);
        $class = array_pop($pieces);

        $st = substr($class, 0, 1);
        if ((!ctype_alpha($st)) && ('_' != $st)) {
            throw new InvalidArgumentException('Illegal identifier: ' . $class, 1);        
        }

        $path = implode('/', $pieces) . '/class.' . $class . '.php' ;
        require_once $path;
    }
    
    /** 
     * @proto static public createInstance(name:String) 
     * @param string $name
     * @return object
     */
    static public function createInstance($name) {
        return self::getInstance($name, false);
    }
    
    /** 
     * If you feel the need to change object properties prior to use,
     * please consider using require_object / require_class instead.
     * 
     * @param string $name
     * @param boolean $singleton - when FALSE a new instance is created
     * @return object
     * @proto static public getInstance(name:String, singleton:Bool) 
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
     * @proto static public singleton(name:String) 
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
     * Returns the instance or the value returned by the callback function.
     * 
     * @param string $name
     * @param callable $fn
     * @return mixed
     * @proto static public requireObject<F>(name:String, fn:F)
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
     * @proto static public requireClass<F>(name:String, fn:F)
     */
    static public function requireClass($name, $fn = null) {
        self::import($name);
        $object = self::createInstance($name);
        if (null == $fn) {
            return $object;
        }
        return $fn($object);
    }
}

/*                                                                    */
/* --- ALIAS FUNCTIONS ---                                            */
/*                                                                    */

/** Alias of ClassLoader::import() */
function import($name) { return ClassLoader::import($name); }

/** Alias of ClassLoader::createInstance() */
function create_instance($name) { return ClassLoader::createInstance($instance); }

/** Alias of ClassLoader::getInstance() */
function get_instance($name = null, $singleton = true) { return ClassLoader::getInstance($name, $singleton); }

/** Alias of ClassLoader::singleton() */
function singleton($name) { return ClassLoader::singleton($name); }

/** Alias of ClassLoader::requireObject() */
function require_object($name, $fn = null) { return ClassLoader::requireObject($name, $fn); }

/** Alias of ClassLoader::requireClass() */
function require_class($name, $fn = null) { return ClassLoader::requireClass($name, $fn); }

// EOF
