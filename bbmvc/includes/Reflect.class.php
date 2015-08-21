<?php

class Reflect {
    /** 
     * @param string|object $class - Either a string containing the name of the class to reflect, or an object.
     * @return ReflectionClass
     * @proto static public function getReflectionClass(s_class:Dynamic):php.ReflectionClass
     */
    public static function getReflectionClass($class) {
        static $reflections = array();
        $class_name = self::getClassName($class);
        if (!isset($reflections[$class_name])) {
            $reflections[$class_name] = new ReflectionClass($class);
        }
        return $reflections[$class_name];
    }
    
    public static function getReflectionMethod($class, $method) {
        static $reflections = array();
        $class_name = self::getClassName($class);
        if (!isset($reflections[$class_name][$method])) {
            $reflection_class = self::getReflectionClass($class);
            $reflections[$class_name][$method] = $reflection_class->getMethod($method);
        }
        return $reflections[$class_name][$method];
    }
    
    public static function invoke($object, $method, $args) {
        return call_user_func_array ( array ($object, $method ), $args );
    }
    
    private static function getClassName($class) {
        return is_string($class) ? $class : get_class($class);
    }
}
