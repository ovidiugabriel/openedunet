<?php

/* Copyright (C) 2014 Haxe Foundation - Do not change */

class php_Web {
    public function __construct(){}
    static function getParams() {
        $a = array_merge($_GET, $_POST);
        if (get_magic_quotes_gpc()) {
            reset($a); 
            while (list($k, $v) = each($a)) {
                $a[$k] = stripslashes(strval($v));
            }
        }
        return php_Lib::hashOfAssociativeArray($a);
    }
    static $isModNeko;
    public function __toString() { return 'php.Web'; }
}

// If it is not CLI the it is mod Neko
php_Web::$isModNeko = !php_Lib::isCli();
