
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
    
    // -------------------------------------------------------------------------
    // Array (Lo. wrappers)
    // -------------------------------------------------------------------------

    public function chunk(?size : Int = 1) : ArrayType {
        return Lo.chunk(this, size);
    }
    
    public function compact() : ArrayType {
        return Lo.compact(this);
    }
    
    public function concat() : ArrayType {
        return Lo.concat(this);
    }
    
    public function difference() : ArrayType {
        return Lo.difference(this);
    }
    
    @:overload(function (iteratee : String) : ArrayType{})
    public function differenceBy(?iteratee : Iteratee) : ArrayType {
        return Lo.differenceBy(this, iteratee);
    }
    
    public function differenceWith(?comparator : Comparator) : ArrayType {
        return Lo.differenceWith(this, comparator);
    }
    
    public function drop(?n : Int = 1) : ArrayType {
        return Lo.drop(this, n);
    }
    
    public function dropRight(array : ArrayType, ?n : Int = 1) : ArrayType {
        return Lo.dropRight(this, n);
    }
    
    @:overload(function (?predicate : Dynamic) : ArrayType {})
    public function dropRightWhile(?predicate : Predicate) : ArrayType {
        return Lo.dropRightWhile(this, predicate);
    }
    
    @:overload(function (?predicate : Dynamic) : ArrayType{})
    public function dropWhile(?predicate : Predicate): ArrayType {
        return Lo.dropWhile(this, predicate);
    }
    
    public function fill(value : Dynamic, ?start : Int = 0, ?end : Int) : ArrayType {
        return Lo.fill(this, value, start, end);
    }
    
    @:overload(function (?predicate : Dynamic, ?fromIndex : Int = 0) : ArrayType {})
    public function findIndex(?predicate : Predicate, ?fromIndex : Int = 0) : ArrayType {
        return Lo.findIndex(this, predicate, fromIndex);
    }
    
    @:overload(function (?predicate: Dynamic, ?fromIndex: Int): ArrayType {})
    public function findLastIndex(?predicate : Predicate, ?fromIndex : Int) : ArrayType {
        return Lo.findLastIndex(this, predicate, fromIndex);
    }
    
    public function head() : ArrayType {
        return Lo.head(this);
    }
    
    public function flatten() : ArrayType {
        return Lo.flatten(this);
    }

    public function flattenDeep() : ArrayType {
        return Lo.flattenDeep(this);
    }

    public function flattenDepth(?depth : Int = 1) : ArrayType {
        return Lo.flattenDepth(this, depth);
    }
    
    /*
    FIXME: Incompatible signature
    public function fromPairs(pairs : Array<ArrayType>) : StringMap<Dynamic> {    
    }
    */

} // end-class
