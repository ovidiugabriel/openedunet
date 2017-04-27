
package php;

interface ArrayAccess {
    public function boolean offsetExists ( offset : Dynamic );
    public function offsetGet ( offset : Dynamic ) : Dynamic;
    public function offsetSet ( offset : Dynamic , value :Dynamic ) : Void;
    public function offsetUnset ( offset : Dynamic ) : Void;
}
