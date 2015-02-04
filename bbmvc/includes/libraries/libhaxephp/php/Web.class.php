<?php

  /*
      Copyright (C)2005-2012 Haxe Foundation
      
      Permission is hereby granted, free of charge, to any person obtaining a
      copy of this software and associated documentation files (the "Software"),
      to deal in the Software without restriction, including without limitation
      the rights to use, copy, modify, merge, publish, distribute, sublicense,
      and/or sell copies of the Software, and to permit persons to whom the
      Software is furnished to do so, subject to the following conditions:
      
      The above copyright notice and this permission notice shall be included in
      all copies or substantial portions of the Software.
      
      THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
      IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
      FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
      AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
      LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
      FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
      DEALINGS IN THE SOFTWARE.
  */

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
