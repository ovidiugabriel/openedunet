At this moment this library seems to be too bloated for current use.

http://www.aymericlamboley.fr/blog/using-native-php-with-haxe-php/
http://old.haxe.org/doc/advanced/magic

Php Magic

There are four magic identifiers in php:

__php__("php code") construct enables you to directly embed Php code into your Haxe code.
__call__("function", arg, arg, arg...) calls a php function with the desired number of arguments and returns whatever the php function returns.
__var__(global, paramname) has been introduced to easily get the values from global vars.
__physeq__(val1, val2) Strict equals test between the two values. Returns a Bool.

-------------------------------------------------------------------------------
var value:String = "test";
untyped __php__("echo '<pre>'; print_r($value); echo '</pre>'; ");

// translates to 
// $isFalse = false === $value;
var isFalse = untyped __physeq__(false, value);

// returns a NativeArray with values [1,2,3]
var value = untyped __call__("array", 1,2,3); 

// To get the value of $_SERVER['REQUEST_METHOD'] you can write the following
// (note that the dollar sign is omitted)
var value : String = untyped __var__('_SERVER', 'REQUEST_METHOD')  
-------------------------------------------------------------------------------

http://old.haxe.org/doc/php/extern_libraries

Simple.class.php

<?php
function makeSimple($text) {
    return new Simple($text);
}

function printSimple($simple) {
    $simple-> doPrint();
}

class Simple
{
    public $text;
    
    public function __construct($text) {
        $this->text = $text;
    }
    
    public function doPrint() {
        echo $this->text;
    }
    
    protected function changeText($text) {
        $this->text = $text;
    }
}

class Simple2 extends Simple{
    public function __construct($text) {
        parent::__construct($text);
    }
    
    public function makeChange($text) {
        changeText($text);
    }
}
?>

src/test/Simple.hx

package test;

extern class Simple 
{
    static function __init__():Void untyped {
        __call__("require_once", "Simple.class.php");
    }

    public var text:Dynamic;
    
    public function new(something:Dynamic):Void;
    public function doPrint():Void;
    function changeText(text:Dynamic):Void;
}
src/test/Simple2.hx

package test;

extern class Simple2<T> extends Simple
{
    static function __init__():Void {
        untyped __call__("require_once", "Simple.class.php");
    }
    
    public function new(text:T):Void;
    
    public function makeChange(text:T):Void;
}
src/test/SimpleHelper.hx

package test;

class SimpleHelper {
    public static inline function makeSimple(text):Simple return untyped __call__("makeSimple", text)
    public static inline function makeSimple2<T>(vari:T) return new Simple2(vari)
    public static inline function printSimple(simple:Simple) untyped __call__("printSimple", simple)
}