<?php

/* * *************************************************************************
 *                            class_loader.php
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

if (!defined('_VALID_ACCESS')) {
    throw new Exception('Access denied!');
}

/**
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

/**
 * Part of class loader (not dispatcher).
 * Name respects the format defined by:
 * https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md 
 * 
 * Acts in a way similar with: https://docs.joomla.org/Jimport
 *
 * @throws InvalidArgumentException
 */
function import($name) {
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
 * @param string $name
 * @param boolean $singleton
 * @return object
 */
function get_instance($name = null, $singleton = true) {
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

    return singleton($name);   
}

function singleton($name) {
    static $instances = array();

    if (!isset($instances[$name])) {
        $instances[$name] = new $name();
    }
    return $instances[$name];
}

function require_object($name, $fn = null) {
    import($name);
    $object = construct($name, true);
    if (null == $fn) {
        return $object;
    }
    return $fn($object);
}

function require_class($name, $fn = null) {
    import($name);
    $object = construct($name, false);
    if (null == $fn) {
        return $object;
    }
    return $fn($object);
}

// EOF
