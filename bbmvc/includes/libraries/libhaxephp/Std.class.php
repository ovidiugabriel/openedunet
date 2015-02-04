<?php

/* Copyright (C) 2014 Haxe Foundation - Do not change */

class Std {
    public function __construct(){}
    static public function string($s) {
        return _hx_string_rec($s, "");
    }
    public function __toString() { return 'Std'; }
}
