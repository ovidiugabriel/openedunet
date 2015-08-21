<?php

class Factory {
    static public function getSecurityClass($module_classname) {
        $security_class = $module_classname . 'Security';
        
        // TODO: Use ClassLoader here ...
        if (!is_file($file = (_DIR_MODULES . '/' . $_module_path . '/class.' . $security_class . '.php'))) {
            throw new Exception('Security class ' . $security_class . ' missing!');
        }
        require_once $file;
        return new $security_class ();
    }
    
    static public function getSeoClass($module) {
        $seo_class = $module . 'Seo';

        // TODO: Use ClassLoader here ...
        if (!is_file($file = (_DIR_MODULES . '/' . $params['module'] . '/class.' . $seo_class . '.php'))) {
            throw new Exception('Seo class ' . $seo_class . ' missing!');    
        }
        
        require_once $file;
        return new $seo_class();
    }
}
