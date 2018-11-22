
package lodash;

class Collection {
    public function countBy(?iteratee : Dynamic) : Dynamic {
        return Lo.countBy(this, iteratee);
    }
    
    public function forEach(?iteratee : Dynamic) : Collection {
        return Lo.forEach(this, iteratee);
    }
    
    public function forEachRight(?iteratee : Dynamic -> Void) : Collection {
        return Lo.forEachRight(this, iteratee);
    }
    
    @:overload(function (?predicate : Dynamic) : Bool{})
    public function every(?predicate : Predicate) : Bool {
        return Lo.every(this, predicate);
    }
    
    @:overload(function (?predicate : Dynamic) : ArrayType{})
    public function filter(?predicate : Predicate) : ArrayType {
        return Lo.filter(this, predicate);
    }
    
    @:overload(function (?predicate : Dynamic, ?fromIndex : Int = 0) : Dynamic {})
    public function find(?predicate : Predicate, ?fromIndex : Int = 0) : Dynamic {
        return Lo.find(this, predicate, fromIndex);
    }
    
    public function findLast(?predicate : Predicate, ?fromIndex : Int) : Dynamic {
        return Lo.findLast(this, predicate, fromIndex);
    }
    
    public function flatMap(?iteratee : Iteratee) : ArrayType {
        return Lo.flatMap(this, iteratee);
    }
    
    public function flatMapDeep(?iteratee : Iteratee) : ArrayType {
        return Lo.flatMapDeep(this, iteratee);
    }
    
    public function flatMapDepth(?iteratee : Iteratee, ?depth : Int = 1) : ArrayType {
        return Lo.flatMapDepth(this, iteratee, depth);
    }
    
    public function groupBy(?iteratee : Iteratee): Dynamic {
        return Lo.groupBy(this, iteratee);
    }
    
    public function includes(value : Dynamic, ?fromIndex : Int = 0) : Bool {
        return Lo.includes(this, value, fromIndex);
    }

    @:overload(function (path : Dynamic, ?args : Dynamic) : ArrayType {})
    public static function invokeMap(collection : Collection, path : Dynamic, ?args : Array<Dynamic>) : ArrayType {
        return Lo.invokeMap(this, path, args);
    }

    @:overload(function (?iteratee : Dynamic) : Dynamic {})
    public function keyBy(?iteratee : Iteratee) : Dynamic {
        return Lo.keyBy(this, iteratee);
    }

    @:overload(function(?iteratees : Dynamic) : ArrayType {})
    public function map(?iteratees : Iteratee) : ArrayType {
        return Lo.map(this, iteratees);
    }

    public function orderBy(?iteratees : Array<String>, ?orders : Array<String>) {
        return Lo.orderBy(iteratees, orders);
    }

    @:overload(function (?predicate : Dynamic) : ArrayType {})
    public function partition(?predicate : Predicate) : ArrayType {
        return Lo.partition(this, predicate);
    }
    
    @:overload(function (?iteratee : Dynamic, ?accumulator : Dynamic) : Dynamic {})
    public function reduce(?iteratee : Iteratee, ?accumulator : Dynamic) : Dynamic {
        return Lo.reduce(this, iteratee, accumulator);
    }
    
    @:overload(function (?iteratee : Dynamic, ?accumulator : Dynamic) : Dynamic {})
    public function reduceRight(?iteratee : Iteratee, ?accumulator : Dynamic) : Dynamic {
        return Lo.reduceRight(this, iteratee, accumulator);
    }

    @:overload(function (?predicate : Dynamic) : ArrayType {})
    public function reject(?predicate : Predicate) : ArrayType {   
        return Lo.reject(this, predicate);
    }
    
    public function sample() : Dynamic {
        return Lo.sample(this);
    }
    
    public function sampleSize(?n : Int = 1) : Array<Dynamic> {
        return Lo.sampleSize(this, n);
    }
    
    public function shuffle() : Array<Dynamic> {
        return Lo.shuffle(this);
    }
    
    public function size() : Int {
        return Lo.size(this);
    }

    @:overload(function (?predicate : Dynamic) : Bool {})
    public function some(?predicate : Predicate) : Bool {
        return Lo.some(this, predicate);
    }
    
    @:overload(function (?iteratees : Array<Dynamic>) : ArrayType {})
    public function sortBy(?iteratees : Array<Iteratee>) : ArrayType {
        return Lo.sortBy(this, iteratees);
    }
} // end-class
