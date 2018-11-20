
package lodash;


abstract ArrayType(Array<Dynamic>) {
    /**
        [static] fromIntArray()
    **/
    @:from
    static public function fromIntArray(value : Array<Dynamic>) : ArrayType {
        return new ArrayType(value);
    }

    /**
        new()
    **/
    public function new(value : Array<Dynamic>) {
        this = value;
    }

    /**
        copy()
    **/
    public function copy() : ArrayType {
        return this.copy();
    }

    /**
        push()
    **/
    public function push(element : Dynamic) : Int {
        return this.push(element);
    }

    /**
        length()
    **/
    public function length() : Int {
        return this.length;
    }

    /**
        toArray()
    **/
    @:to
    public function toArray() : Array<Dynamic> {
        return this;
    }
}
