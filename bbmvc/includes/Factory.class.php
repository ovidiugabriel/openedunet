<?php

/* ************************************************************************* */
/*                                                                           */
/*  Title:       Factory.class.php                                           */
/*                                                                           */
/*  Created on:  24.10.2015 at 11:47:37                                      */
/*  Email:       ovidiugabriel@gmail.com                                     */
/*  Copyright:   (C) 2015 ICE Control srl. All Rights Reserved.              */
/*                                                                           */
/*  $Id$                                                                     */
/*                                                                           */
/* ************************************************************************* */

/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/* History (Start).                                                          */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/*                                                                           */
/* Date         Name    Reason                                               */
/* ------------------------------------------------------------------------- */
/* 25.10.2015           Added getDispatcher() and getClassLoader()           */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/* History (END).                                                            */
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

class Factory {
    /**
     * 
     * @param string $module_classname
     * @return Security
     * @throws Exception
     */
    static public function getSecurityClass($module_classname) {
        $security_class = $module_classname . 'Security';
        
        // FIXME: $_module_path not initialized ...
        
        // TODO: Use ClassLoader here ...
        if (!is_file($file = (_DIR_MODULES . '/' . $_module_path . '/class.' . $security_class . '.php'))) {
            throw new Exception('Security class ' . $security_class . ' missing!');
        }
        require_once $file;
        return new $security_class ();
    }
    
    /**
     * 
     * @param string $module
     * @return SeoBase
     * @throws Exception
     */
    static public function getSeoClass($module) {
        $seo_class = $module . 'Seo';

        // FIXME:  $params['module'] not initialized
        
        // TODO: Use ClassLoader here ...
        if (!is_file($file = (_DIR_MODULES . '/' . $params['module'] . '/class.' . $seo_class . '.php'))) {
            throw new Exception('Seo class ' . $seo_class . ' missing!');    
        }
        
        require_once $file;
        return new $seo_class();
    }
    
    /**
     * 
     * @return Dispatcher
     */
    static public function getDispatcher() {
        return ClassLoader::getInstance('Dispatcher');
    }
    
    /**
     * 
     * @return ClassLoader
     */
    static public function getClassLoader() {
        return ClassLoader::getInstance('ClassLoader');
    }
}
