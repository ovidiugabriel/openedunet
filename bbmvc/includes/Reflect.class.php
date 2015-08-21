<?php

class Reflect {
    public static function getReflectionClass($class) {
        static $reflections = array();
        if (!isset($reflections[$class])) {
            $reflections[$class] = new ReflectionClass($class);
        }
        return $reflections[$class];
    }
    
    public static function getReflectionMethod($class, $method) {
        static $reflections = array();
        if (!isset($reflections[$class][$method])) {
            $reflections[$class][$method] = new ReflectionMethod ( $class, $method );
        }
        return $reflections[$class][$method];
    }
    
    public static function invoke($object, $method, $args) {
        return call_user_func_array ( array ($object, $method ), $args );
    }
}
