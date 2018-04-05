
//
// For the PHP implementation see:
//    https://github.com/ovidiugabriel/openedunet/blob/master/bbmvc/includes/ClassLoader.class.php
//
extern class ClassLoader {
    static public function _import(name : String, ?callback : Dynamic) : Void;
    static public function createInstance(name : String) : Dynamic;
}
