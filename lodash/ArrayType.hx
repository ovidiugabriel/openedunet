
package lodash;

abstract ArrayType(Array<Variant>) {
    @:from
    static public function fromIntArray(value : Array<Int>) {
        return new ArrayType(value);
    }

    public function new(value : Array<Variant>) {
        this = value;
    }
}
