
//
// For the PHP implementation see:
//    https://github.com/ovidiugabriel/openedunet/blob/master/bbmvc/includes/ClassLoader.class.php
//
extern class ClassLoader {
    static public function getResource(name : String) : String;
    static public function register() : Void;
    static public function removeClass(className : String) : Void;
    static public function autoload(className : String) : Void;
    static public function _import(name : String, ?callback : Dynamic) : Void;
    static public function createInstance(name : String) : Dynamic;
    static public function getInstance(?name : String = null, ?singleton : Bool = true) : Dynamic;
    static public function singleton(name : String) : Dynamic;
    static public function requireObject(name : String, ?fn : Dynamic = null) : Dynamic;
    static public function requireClass(name : String, ?fn : Dynamic = null) : Dynamic;
    static public function addIncludePath(path : String) : Void;
}
