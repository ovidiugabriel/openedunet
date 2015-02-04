<?php

/* Copyright (C) 2014 Haxe Foundation - Do not change */

class php_Lib {
    public function __construct(){}
    static function hprint($v) {
        echo(Std::string($v));
    }
    static function isCli() {
        return (0 == strncasecmp(PHP_SAPI, 'cli', 3));
    }
    static function hashOfAssociativeArray($arr) {
        $h = new haxe_ds_StringMap();
        $h->h = $arr;
        return $h;
    }
    public function __toString() { return 'php.Lib'; }
}
