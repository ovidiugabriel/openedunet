
package php;

extern class ArrayObject implements IteratorAggregate 
    implements ArrayAccess 
    implements Serializable 
    implements Countable 
{
    public function new(?input : Dynamic, ?flags : Int, ?iteratorClass : String);   
    public function append ( value : Dynamic ):Void;
    public function asort ( ):Void;
    public function count ( ):Int;
    public function exchangeArray ( input : Dynamic ):php.NativeArray;
    public function getArrayCopy ( ):php.NativeArray;
    public function getFlags ( ):Int;
    public function getIterator ( ):php.ArrayIterator;
    public function getIteratorClass ( ):String;
    public function ksort ( ):Void;
    public function natcasesort ( ):Void;
    public function natsort ( ):Void;
    public function offsetExists ( index : Dynamic ):Bool;
    public function offsetGet ( index : Dynamic ):Dynamic;
    public function offsetSet ( index : Dynamic , newval : Dynamic ):Void;
    public function offsetUnset ( index : Dynamic ):Void;
    public function serialize ( ):String;
    public function setFlags ( flags : Int ):Void;
    public function setIteratorClass ( iteratorClass : String ):Void;
    public function uasort ( cmpFunction : php.Callable ):Void;
    public function uksort ( cmpFunction : php.Callable ):Void;
    public function unserialize ( serialized : String ):Void;
}
