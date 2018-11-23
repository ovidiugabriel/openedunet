
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
    
    public function fromPairs() : StringMap<Dynamic> {    
        return Lo.fromPairs(this);
    }

    public function indexOf(value : Dynamic, ?fromIndex : Int = 0) : Int {
        return Lo.indexOf(this, value, fromIndex);
    }

    public function initial() : ArrayType {
        return Lo.initial(this);
    }
    
    public static function intersection() : ArrayType {
        return Lo.intersection(this);
    }
    
    @:overload(function (?iteratee : Dynamic) : ArrayType {})
    public static function intersectionBy(?iteratee : Iteratee) : ArrayType {
        return Lo.intersectionBy(this, iteratee);
    }

    public function intersectionWith(?comparator : Comparator) : ArrayType {
        return Lo.intersectionWith(this, comparator);
    }
    
    public function join(?separator : String =',') : String {
        return Lo.join(this);
    }
    
    public function last() : Dynamic {
        return Lo.last(this);
    }
    
    public function lastIndexOf(value : Dynamic, ?fromIndex : Int) : Int {
        return Lo.lastIndexOf(this, value, fromIndex);
    }

    public function nth(?n : Int = 0) : Dynamic {
        return Lo.nth(this, n);
    }
    
    public function pull(?values : Array<Dynamic>) : ArrayType {
        return Lo.pull(this, values);
    }
    
    public function pullAll(?values : ArrayType) : ArrayType {
        return Lo.pullAll(values);
    }
    
    @:overload(function (values : ArrayType, ?iteratee : Dynamic) : ArrayType {})
    public function pullAllBy(values : ArrayType, ?iteratee : Iteratee) : ArrayType {
        return Lo.pullAllBy(this, values, iteratee);
    }
    
    public function pullAllWith(values : ArrayType, ?comparator : Comparator) : ArrayType {
        return Lo.pullAllWith(this, values, comparator);
    }
    
    public function pullAt(array : ArrayType, indexes : Array<Int>) : ArrayType {
        return Lo.pullAt(this, indexes);
    }
    
    public function remove(?predicate: Predicate): ArrayType {
        return Lo.remove(this, predicate);
    }
    
    public function reverse() : ArrayType {
        return Lo.reverse(this);
    }
    
    public function slice(?start : Int = 0, ?end : Int) : ArrayType {
        return Lo.slice(this, start, end);
    }
    
    public function sortedIndex(value : Dynamic) : Int {
        return Lo.sortedIndex(this, value);
    }
    
    @:overload(function (value : Dynamic, ?iteratee : Dynamic) : Int {})
    public function sortedIndexBy(value : Dynamic, ?iteratee : Iteratee) : Int {
        return Lo.sortedIndexBy(this, value, iteratee);
    }
    
    public function sortedIndexOf(value : Dynamic) : Int {
        return Lo.sortedIndexOf(this, value);
    }
    
    public function sortedLastIndex(value: Dynamic): Int {
        return Lo.sortedLastIndex(this, value);
    }
    
    @:overload(function (value : Dynamic, ?iteratee: Dynamic) : Int {})
    public function sortedLastIndexBy(value : Dynamic, ?iteratee : Iteratee) : Int {
        return Lo.sortedLastIndexBy(this, value, iteratee);
    }
    
    public function sortedLastIndexOf(value : Dynamic) : Int {
        return Lo.sortedLastIndexOf(this, value);
    }
    
    public function sortedUniq() : ArrayType {
        return Lo.sortedUniq(this);
    }
    
    public function sortedUniqBy(?iteratee : Iteratee) : ArrayType {
        return Lo.sortedUniqBy(this, iteratee);
    }
    
    public function tail() : ArrayType {
        return Lo.tail(this);
    }
    
    public function take(?n : Int = 1) : ArrayType {
        return Lo.take(this, n);
    }

    public function takeRight(?n : Int = 1) : ArrayType {
        return Lo.takeRight(this, n);
    }
    
    @:overload(function (?predicate : Dynamic) : ArrayType {})
    public function takeRightWhile(?predicate : Predicate) : ArrayType {
        return Lo.takeRightWhile(this, predicate);
    }
    
    @:overload(function (?predicate: Dynamic): ArrayType {})
    public function takeWhile(?predicate : Predicate) : ArrayType {
        return Lo.takeWhile(this, predicate);
    }
    
    public function union() : ArrayType {
        return Lo.union(this);
    }
    
    @:overload(function (?iteratee: Dynamic) : ArrayType {})
    public function unionBy(?iteratee: Iteratee) : ArrayType {
        return Lo.unionBy(this, iteratee);
    }
    
    public function unionWith(?comparator: Comparator): ArrayType {
        return Lo.unionWith(this, comparator);
    }
    
    public function uniq(): ArrayType {
        return Lo.uniq(this);
    }
    
    @:overload(function (?iteratee : Dynamic) : ArrayType {})
    public function uniqBy(?iteratee : Iteratee) : ArrayType {
        return Lo.uniqBy(this, iteratee);
    }
    
    public function uniqWith(?comparator : Comparator) : ArrayType {
        return Lo.uniqWith(this, comparator);
    }
    
    public function unzip() : ArrayType {
        return Lo.unzip(this);
    }
    
    public function unzipWith(?iteratee : Dynamic) : ArrayType {
        return Lo.unzipWith(this, iteratee);
    }
    
    public function without() : ArrayType {
        return Lo.without(this);
    }
    
    public function xor() : ArrayType {
        return Lo.xor(this);
    }
    
    public function xorBy(?iteratee : Dynamic) : ArrayType {
        return Lo.xorBy(this, iteratee);
    }
    
    public function xorWith(?comparator : Comparator) : ArrayType {
        return Lo.xorWith(this, comparator);
    }
    
    public function zip() : ArrayType {
        return Lo.zip(this);
    }
    /*
    public function zipObject(props: ArrayType, values: ArrayType): Dynamic {
    }
*/
  
    /*
    public function zipObjectDeep(props: ArrayType, values: ArrayType): Dynamic {
    }
*/
    
    public function zipWith(?iteratee : Dynamic) : ArrayType {
        return Lo.zipWith(this, iteratee);
    }

} // end-class
