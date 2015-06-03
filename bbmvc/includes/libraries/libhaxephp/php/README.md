Library documentation: [PHP HaXe API](http://api.haxe.org/php/index.html)

 * [Using native PHP with HaXe](http://www.aymericlamboley.fr/blog/using-native-php-with-haxe-php/)
 * [The HaXe Magic, old docs](http://old.haxe.org/doc/advanced/magic)

For interface conversion: [PhpToHaxe - tool for helping use php from haxe](http://phptohaxe.haqteam.com/code.php)

[Wrapping External PHP Libraries](http://old.haxe.org/doc/php/extern_libraries)

###### Php Magic

There are four magic identifiers in php target:

 * `__php__("php code")` construct enables you to directly embed Php code into your Haxe code.
 * `__call__("function", arg, arg, arg...)` calls a php function with the desired number of arguments and returns whatever the php function returns.
 * `__var__(global, paramname)` has been introduced to easily get the values from global vars.
 * `__physeq__(val1, val2)` Strict equals test between the two values. Returns a Bool.
