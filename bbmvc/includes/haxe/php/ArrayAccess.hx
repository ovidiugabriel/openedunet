
package php;

// Provides a class that can be accessed using brackets.
// This is used for the PHP runtime.
interface ArrayAccess {
    public function offsetExists ( offset : Dynamic ) : Bool;
    public function offsetGet ( offset : Dynamic ) : Dynamic;
    public function offsetSet ( offset : Dynamic , value :Dynamic ) : Void;
    public function offsetUnset ( offset : Dynamic ) : Void;
}
