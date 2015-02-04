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

class haxe_Log {
    public function __construct(){}
    static function trace($v, $infos = null) { return call_user_func_array(self::$trace, array($v, $infos)); }
    public static $trace = null;
    function __toString() { return 'haxe.Log'; }
}
haxe_Log::$trace = array(new _hx_lambda(array(), "haxe_Log_0"), 'execute');
function haxe_Log_0($v, $infos) {
    {
        if($infos !== null && $infos->customParams !== null) {
            $extra = "";
            {
                $_g = 0;
                $_g1 = $infos->customParams;
                while($_g < $_g1->length) {
                    $v1 = $_g1[$_g];
                    ++$_g;
                    $extra .= "," . Std::string($v1);
                    unset($v1);
                }
            }
            _hx_trace(Std::string($v) . _hx_string_or_null($extra), $infos);
        } else {
            _hx_trace($v, $infos);
        }
    }
}
