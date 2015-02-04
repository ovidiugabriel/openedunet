At this moment this library seems to be too bloated for current use.

http://www.aymericlamboley.fr/blog/using-native-php-with-haxe-php/
http://old.haxe.org/doc/advanced/magic
http://old.haxe.org/doc/php/extern_libraries

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