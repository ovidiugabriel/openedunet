
// Compile with:
//
//      haxe -cp /opt/haxe/std/ lodash.Lo

package lodash;

import haxe.extern.Rest;
import haxe.ds.StringMap;

// Some type aliases for convenience
typedef Variant    = Dynamic;
// typedef ArrayType  = Array<Variant>;
typedef Iteratee   = Dynamic -> Dynamic;
typedef Comparator = Dynamic -> Dynamic -> Int; //  (arrVal, othVal)
typedef Predicate  = Dynamic -> Bool;

class Lo {
    static public var Boolean(get, never) : Bool;
    static public var undefined(get, never) : Dynamic;
    static public var arguments(get, never) : Dynamic;
    static public var values(get, never) : Dynamic;
    static public var memoize(get, never) : Dynamic;

    /**
        [static] get_Boolean()
    **/
    @:extern
    static inline public function get_Boolean() : Bool {
        return untyped __js__('Boolean');
    }

    /**
        [static] undefined()
    **/
    @:extern
    static inline public function get_undefined() : Dynamic {
        #if js
        return untyped __js__('undefined');
        #end
    }

    /**
        [static] arguments()
     **/
    @:extern
    static inline public function get_arguments() : Dynamic {
        #if js
        return untyped __js__('arguments');
        #end
    }

    /**
        [static] values()
     **/
    static inline public function get_values() : ArrayType {
        #if js
        return lo().values;
        #end
    }

    /**
        Creates a function that memoizes the result of func. If resolver is provided, 
        it determines the cache key for storing the result based on the arguments 
        provided to the memoized function. By default, the first argument provided 
        to the memoized function is used as the map cache key. The func is invoked 
        with the this binding of the memoized function.

        Note: The cache is exposed as the cache property on the memoized function. 
        Its creation may be customized by replacing the _.memoize.Cache constructor 
        with one whose instances implement the Map method interface of clear, 
        delete, get, has, and set.

        Arguments

            func (Function): The function to have its output memoized.
            [resolver] (Function): The function to resolve the cache key.

        Returns

            (Function): Returns the new memoized function.
    **/
    static inline public function get_memoize() : Dynamic {
        #if js
        return lo().memoize;
        #end
    }

    /**
        [static] prototype()
    **/
    static public function prototype(type : Dynamic, method : String) : Dynamic {
        #if js
        return untyped __js__('type.prototype[method]');
        #end
    }
    
    /**
        [static] arr()

        Forces cast to Array<Dynamic>.
        In other words, to be used each time you see the message:
        Arrays of mixed types are only allowed if the type is forced to Array<Dynamic>
    **/
    @:extern
    static inline public function arr(array : Array<Dynamic>) : Array<Dynamic> {
        return array;
    }

    /**
        [static] newEmptyArray()
    **/
    static public function newEmptyArray(?length : Int) : Array<Dynamic> {
        #if js
            return untyped __js__('new Array(length)');
        #end
    }

    /**
        Returns the lodash JavaScript reference.
        Can be used as 'placeholder' to curried functions (partial applications).
    **/
    public static function lo() : Dynamic {
        #if js
            return untyped __js__('_');
        #end
    }

    /**
        Converts value to an array.

        Arguments
            value (*): The value to convert.
        Returns
            (Array): Returns the converted array.
    **/
    public static function toArray(value : Dynamic) : ArrayType {
        #if js
        return lo().toArray(value);
        #end
    }

    /**
        Makes use of variable list of parameters feature available in JavaScript
        that is not available in HaXe
    */
    private static function apply(func : Dynamic, params : Dynamic) : Dynamic {
        #if js
            return untyped __js__('func.apply(null, params)');
        #end
    }

    // -------------------------------------------------------------------------
    // Array
    // -------------------------------------------------------------------------

    /**
        Creates an array of elements split into groups the length of size.
        If array can't be split evenly, the final chunk will be the remaining elements.

        Arguments

            array - The array to process.
            size - The length of each chunk

        Returns

            Returns the new array of chunks.
    **/
    public static function chunk(array : ArrayType, ?size : Int = 1) : ArrayType {
        #if js
            return lo().chunk(array, size);
        #end
    }

    /**
        Creates an array with all falsey values removed.
        The values false, null, 0, "", undefined, and NaN are falsey.

        Arguments

            array: The array to compact.

        Returns

            Returns the new array of filtered values.
    **/
    public static function compact(array : ArrayType) : ArrayType {
        #if js
            return lo().compact(array);
        #end
    }

    /**
        Creates a new array concatenating array with any additional arrays and/or values.

        Arguments

            array (Array): The array to concatenate.
            [values] (...*): The values to concatenate.

        Returns

            (Array): Returns the new concatenated array.
    **/
    public static function concat(array : ArrayType) : ArrayType {
        #if js
            return apply(lo().concat, array);
        #end
    }

    /**
        Creates an array of array values not included in the other given arrays
        using SameValueZero for equality comparisons.

        The order and references of result values are determined by the first array.

        Unlike _.pullAll, this method returns a new array.

        Arguments

            array - The array to inspect.
            values - The values to exclude.

        Returns

            (Array): Returns the new array of filtered values.
    **/
    public static function difference(array : ArrayType) : ArrayType {
        #if js
            return apply(lo().difference, array);
        #end
    }

    /**
        This method is like _.difference except that it accepts iteratee which is
        invoked for each element of array and values to generate the criterion by
        which they're compared.
        The order and references of result values are determined by the first array.
        The iteratee is invoked with one argument: (value).

        Note: Unlike _.pullAllBy, this method returns a new array.

        Arguments

            array - The array to inspect.
            values - The values to exclude.
            iteratee - The iteratee invoked per element.

        Returns

            (Array): Returns the new array of filtered values.

    **/
    @:overload(function (array : ArrayType, iteratee : String) : ArrayType{})
    public static function differenceBy(array : ArrayType, ?iteratee : Iteratee) : ArrayType {
        #if js
            var params: ArrayType = array.copy();
            if (null != iteratee) {
                params.push(iteratee);
            }
            return apply(lo().differenceBy, params);
        #end
    }

    /**
        This method is like _.difference except that it accepts comparator which i
        s invoked to compare elements of array to values. The order and references
        of result values are determined by the first array. The comparator is
        invoked with two arguments: (arrVal, othVal).

        Note: Unlike _.pullAllWith, this method returns a new array.

        Arguments

            array (Array): The array to inspect.
            [values] (...Array): The values to exclude.
            [comparator] (Function): The comparator invoked per element.

        Returns

            (Array): Returns the new array of filtered values.
    **/
    public static function differenceWith(array : ArrayType, ?comparator : Comparator) : ArrayType {
        #if js
            var params: ArrayType = array.copy();
            if (null != comparator) {
                params.push(comparator);
            }
            return apply(lo().differenceWith, params);
        #end
    }

    /**
        Creates a slice of array with n elements dropped from the beginning.

        Arguments

            array (Array): The array to query.
            [n=1] (number): The number of elements to drop.

        Returns

            (Array): Returns the slice of array.
    **/
    public static function drop(array : ArrayType, ?n : Int = 1) : ArrayType {
        #if js
            return lo().drop(array, n);
        #end
    }

    /**
        Creates a slice of array with n elements dropped from the end.

        Arguments

            array (Array): The array to query.
            [n=1] (number): The number of elements to drop.

        Returns

            (Array): Returns the slice of array.
    **/
    public static function dropRight(array : ArrayType, ?n : Int = 1) : ArrayType {
        #if js
            return lo().dropRight(array, n);
        #end
    }

    /**
        Creates a slice of array excluding elements dropped from the end.
        Elements are dropped until predicate returns falsey.
        The predicate is invoked with three arguments: (value, index, array).

        Arguments

            array (Array): The array to query.
            [predicate=_.identity] (Function): The function invoked per iteration.

        Returns

        (Array): Returns the slice of array.
    **/
    @:overload(function (array : ArrayType, ?predicate : Dynamic) : ArrayType {})
    public static function dropRightWhile(array : ArrayType, ?predicate : Predicate) : ArrayType {
        #if js
            return lo().dropRightWhile(array, predicate);
        #end
    }

    /**
        Creates a slice of array excluding elements dropped from the beginning.
        Elements are dropped until predicate returns falsey. The predicate is
        invoked with three arguments: (value, index, array).

        Arguments

            array (Array): The array to query.
            [predicate=_.identity] (Function): The function invoked per iteration.

        Returns

        (Array): Returns the slice of array.
    **/
    @:overload(function (array : ArrayType, ?predicate : Dynamic) : ArrayType{})
    public static function dropWhile(array : ArrayType, ?predicate : Predicate): ArrayType {
        #if js
            return lo().dropWhile(array, predicate);
        #end
    }

    /**
        Fills elements of array with value from start up to, but not including, end.

        Note: This method mutates array.

        Arguments

            array (Array): The array to fill.
            value (*): The value to fill array with.
            [start=0] (number): The start position.
            [end=array.length] (number): The end position.

        Returns

            (Array): Returns array.
    **/
    public static function fill(array : ArrayType, value :Dynamic, ?start : Int = 0, ?end : Int) : ArrayType {
        #if js
            return lo().fill(array, value, start, end);
        #end
    }

    /**
        This method is like _.find except that it returns the index of the first
        element predicate returns truthy for instead of the element itself.

        Arguments

            array (Array): The array to inspect.
            [predicate=_.identity] (Function): The function invoked per iteration.
            [fromIndex=0] (number): The index to search from.

        Returns

            (number): Returns the index of the found element, else -1.
    **/
    @:overload(function (array: ArrayType, ?predicate: Dynamic, ?fromIndex: Int = 0): ArrayType {})
    public static function findIndex(array : ArrayType, ?predicate : Predicate, ?fromIndex : Int = 0) : ArrayType {
        #if js
            return lo().findIndex(array, predicate, fromIndex);
        #end
    }

    /**
        This method is like _.findIndex except that it iterates over elements of
        collection from right to left.

        Arguments

            array (Array): The array to inspect.
            [predicate=_.identity] (Function): The function invoked per iteration.
            [fromIndex=array.length-1] (number): The index to search from.

        Returns

            (number): Returns the index of the found element, else -1.
    **/
    @:overload(function (array: ArrayType, ?predicate: Dynamic, ?fromIndex: Int): ArrayType {})
    public static function findLastIndex(array : ArrayType, ?predicate : Predicate, ?fromIndex : Int) : ArrayType {
        #if js
            return lo().findLastIndex(array, predicate, fromIndex);
        #end
    }

    /**
        Gets the first element of array.

        Aliases: _.first

        Arguments

            array (Array): The array to query.

        Returns

            (*): Returns the first element of array.
    **/
    public static function head(array: ArrayType): ArrayType {
        #if js
            return lo().head(array);
        #end
    }

    /**
        Flattens array a single level deep.

        Arguments

            array (Array): The array to flatten.

        Returns

            (Array): Returns the new flattened array.
    **/
    public static function flatten(array : ArrayType) : ArrayType {
        #if js
            return lo().flatten(array);
        #end
    }

    /**
        Recursively flattens array.

        Arguments

            array (Array): The array to flatten.

        Returns

            (Array): Returns the new flattened array.
    **/
    public static function flattenDeep(array : ArrayType) : ArrayType {
        #if js
            return lo().flattenDeep(array);
        #end
    }

    /**
        Recursively flatten array up to depth times.

        Arguments

            array (Array): The array to flatten.
            [depth=1] (number): The maximum recursion depth.

        Returns

            (Array): Returns the new flattened array.
    **/
    public static function flattenDepth(array : ArrayType, ?depth : Int = 1) : ArrayType {
        #if js
            return lo().flattenDepth(array, depth);
        #end
    }

    /**
        The inverse of _.toPairs; this method returns an object composed from
        key-value pairs.

        Arguments

            pairs (Array): The key-value pairs.

        Returns

            (Object): Returns the new object.
    **/
    public static function fromPairs(pairs : Array<ArrayType>) : StringMap<Dynamic> {
        #if js
            return lo().fromPairs(pairs);
        #end
    }

    /**
        Gets the index at which the first occurrence of value is found in array
        using SameValueZero for equality comparisons. If fromIndex is negative,
        it's used as the offset from the end of array.

        Arguments

            array (Array): The array to inspect.
            value (*): The value to search for.
            [fromIndex=0] (number): The index to search from.

        Returns

            (number): Returns the index of the matched value, else -1.
    **/
    public static function indexOf(array: ArrayType, value: Dynamic, ?fromIndex: Int = 0): Int {
        #if js
            return lo().indexOf(array, value, fromIndex);
        #end
    }

    /**
        Gets all but the last element of array.

        Arguments

            array (Array): The array to query.

        Returns

            (Array): Returns the slice of array.
    **/
    public static function initial(array : ArrayType) : ArrayType {
        #if js
            return lo().initial(array);
        #end
    }

    /**
        Creates an array of unique values that are included in all given arrays
        using SameValueZero for equality comparisons.
        The order and references of result values are determined by the first array.

        Arguments

            [arrays] (...Array): The arrays to inspect.

        Returns

            (Array): Returns the new array of intersecting values.
    **/
    public static function intersection(arrays : Array<ArrayType>) : ArrayType {
        #if js
            return apply(lo().intersection, arrays);
        #end
    }

    /**
        This method is like _.intersection except that it accepts iteratee which
        is invoked for each element of each arrays to generate the criterion by
        which they're compared. The order and references of result values are
        determined by the first array.
        The iteratee is invoked with one argument: (value).
    **/
    @:overload(function (arrays : Array<ArrayType>, ?iteratee : Dynamic): ArrayType {})
    public static function intersectionBy(arrays : Array<ArrayType>, ?iteratee : Iteratee) : ArrayType {
        #if js
            var params : Array<Dynamic> = arrays.copy();
            if (null != iteratee) {
                params.push(iteratee);
            }
            return apply(lo().intersectionBy, params);
        #end
    }

    /**
        This method is like _.intersection except that it accepts comparator
        which is invoked to compare elements of arrays. The order and references
        of result values are determined by the first array. The comparator is
        invoked with two arguments: (arrVal, othVal).

        Arguments

            [arrays] (...Array): The arrays to inspect.
            [iteratee=_.identity] (Function): The iteratee invoked per element.

        Returns

            (Array): Returns the new array of intersecting values.
    **/
    public static function intersectionWith(arrays: Array<Dynamic>, ?comparator: Comparator): ArrayType {
        #if js
            var params : Array<Dynamic> = arrays.copy();
            if (null != comparator) {
                params.push(comparator);
            }
            return apply(lo().intersectionWith, params);
        #end
    }

    /**
        Converts all elements in array into a string separated by separator.

        Arguments

            array (Array): The array to convert.
            [separator=','] (string): The element separator.

        Returns

            (string): Returns the joined string.
    **/
    public static function join(array : ArrayType, ?separator : String =',') : String {
        #if js
            return lo().join(array, separator);
        #end
    }

    /**
        Gets the last element of array.

        Arguments

            array (Array): The array to query.

        Returns

            (*): Returns the last element of array.
    **/
    public static function last(array : ArrayType) : Dynamic {
        #if js
            return lo().last(array);
        #end
    }

    /**
        This method is like _.indexOf except that it iterates over elements of
        array from right to left.

        Arguments

            array (Array): The array to inspect.
            value (*): The value to search for.
            [fromIndex=array.length-1] (number): The index to search from.

        Returns

            (number): Returns the index of the matched value, else -1.
    **/
    public static function lastIndexOf(array : ArrayType, value : Dynamic, ?fromIndex : Int) : Int {
        #if js
            return lo().lastIndexOf(array, value, fromIndex);
        #end
    }

    /**
        Gets the element at index n of array. If n is negative, the nth element
        from the end is returned.

        Returns the nth element of array.

        Arguments

            array (Array): The array to query.
            [n=0] (number): The index of the element to return.

        Returns

            (*): Returns the nth element of array.
    **/
    public static function nth(array : ArrayType, ?n : Int = 0) : Dynamic {
        #if js
            return lo().nth(array, n);
        #end
    }

    /**
        Removes all given values from array using SameValueZero for equality
        comparisons.

        Note: Unlike _.without, this method mutates array. Use _.remove to remove
        elements from an array by predicate.

        Arguments

            array (Array): The array to modify.
            [values] (...*): The values to remove.

        Returns

            (Array): Returns array.
    **/
    public static function pull(array : ArrayType, ?values : Array<Dynamic>) : ArrayType {
        #if js
            var params = new Array<Dynamic>();
            params.push(array);
            if (null != values) {
                for (v in values) {
                    params.push(v);
                }
            }
            return apply(lo().pull, params);
        #end
    }

    /**
        This method is like _.pull except that it accepts an array of values to remove.

        Note: Unlike _.difference, this method mutates array.

        Arguments

            array (Array): The array to modify.
            values (Array): The values to remove.

        Returns

            (Array): Returns array.
    **/
    public static function pullAll(array : ArrayType, ?values : ArrayType) : ArrayType {
        #if js
            return lo().pullAll(array, values);
        #end
    }

    /**
        This method is like _.pullAll except that it accepts iteratee which is
        invoked for each element of array and values to generate the criterion by
        which they're compared. The iteratee is invoked with one argument: (value).

        Note: Unlike _.differenceBy, this method mutates array.

        Arguments

            array (Array): The array to modify.
            values (Array): The values to remove.
            [iteratee=_.identity] (Function): The iteratee invoked per element.

        Returns

            (Array): Returns array.
    **/
    @:overload(function (array: ArrayType, values: ArrayType, ?iteratee: Dynamic): ArrayType {})
    public static function pullAllBy(array : ArrayType, values : ArrayType, ?iteratee : Iteratee) : ArrayType {
        #if js
            return lo().pullAllBy(array, values, iteratee);
        #end
    }

    /**
        This method is like _.pullAll except that it accepts comparator which is
        invoked to compare elements of array to values. The comparator is invoked
        with two arguments: (arrVal, othVal).

        Note: Unlike _.differenceWith, this method mutates array.


        Arguments

            array (Array): The array to modify.
            values (Array): The values to remove.
            [comparator] (Function): The comparator invoked per element.

        Returns

            (Array): Returns array.
    **/
    public static function pullAllWith(array : ArrayType, values : ArrayType, ?comparator : Comparator) : ArrayType {
        #if js
            return lo().pullAllWith(array, values, comparator);
        #end
    }

    /**
        Removes elements from array corresponding to indexes and returns an array of removed elements.

        Note: Unlike _.at, this method mutates array.

        Returns the new array of removed elements.

        Arguments

            array (Array): The array to modify.
            [indexes] (...(number|number[])): The indexes of elements to remove.

        Returns

            (Array): Returns the new array of removed elements.
    **/
    public static function pullAt(array : ArrayType, indexes : Array<Int>) : ArrayType {
        #if js
            return lo().pullAt(array, indexes);
        #end
    }

    /**
        Removes all elements from array that predicate returns truthy for and
        returns an array of the removed elements. The predicate is invoked with three arguments: (value, index, array).

        Note: Unlike _.filter, this method mutates array. Use _.pull to pull elements from an array by value.

        Arguments

            array (Array): The array to modify.
            [predicate=_.identity] (Function): The function invoked per iteration.

        Returns

            (Array): Returns the new array of removed elements
    **/
    public static function remove(array : ArrayType, ?predicate : Predicate) : ArrayType {
        #if js
            return lo().remove(array, predicate);
        #end
    }

    /**
        Reverses array so that the first element becomes the last, the second
        element becomes the second to last, and so on.

        Note: This method mutates array and is based on Array#reverse.

        Arguments

            array (Array): The array to modify.

        Returns

            (Array): Returns array.
    **/
    public static function reverse(array : ArrayType) : ArrayType {
        #if js
            return lo().reverse(array);
        #end
    }

    /**
        Creates a slice of array from start up to, but not including, end.

        Arguments

            array (Array): The array to slice.
            [start=0] (number): The start position.
            [end=array.length] (number): The end position.

        Returns

            (Array): Returns the slice of array.
     **/
    public static function slice(array : ArrayType, ?start : Int = 0, ?end : Int) : ArrayType {
        #if js
            return lo().slice(array, start, end);
        #end
    }

    /**
        Uses a binary search to determine the lowest index at which value should
        be inserted into array in order to maintain its sort order.

        Arguments

            array (Array): The sorted array to inspect.
            value (*): The value to evaluate.

        Returns

            (number): Returns the index at which value should be inserted into array.
    **/
    public static function sortedIndex(array : ArrayType, value : Dynamic) : Int {
        #if js
            return lo().sortedIndex(array, value);
        #end
    }

    /**
        This method is like _.sortedIndex except that it accepts iteratee which
        is invoked for value and each element of array to compute their sort ranking.
        The iteratee is invoked with one argument: (value).

        Arguments

            array (Array): The sorted array to inspect.
            value (*): The value to evaluate.
            [iteratee=_.identity] (Function): The iteratee invoked per element.

        Returns

            (number): Returns the index at which value should be inserted into array.
    **/
    @:overload(function (array: ArrayType, value: Dynamic, ?iteratee: Dynamic): Int {})
    public static function sortedIndexBy(array : ArrayType, value : Dynamic, ?iteratee : Iteratee) : Int {
        #if js
            return lo().sortedIndexBy(array, value, iteratee);
        #end
    }

    /**
        This method is like _.indexOf except that it performs a binary search on a sorted array.

        Returns the index of the matched value, else -1.

        Arguments

            array (Array): The array to inspect.
            value (*): The value to search for.

        Returns

            (number): Returns the index of the matched value, else -1.
    **/
    public static function sortedIndexOf(array : ArrayType, value : Dynamic) : Int {
        #if js
            return lo().sortedIndexOf(array, value);
        #end
    }

    /**
        This method is like _.sortedIndex except that it returns the highest index
        at which value should be inserted into array in order to maintain its sort order.

        Returns the index at which value should be inserted into array.

        Arguments

            array (Array): The sorted array to inspect.
            value (*): The value to evaluate.

        Returns

            (number): Returns the index at which value should be inserted into array.
    **/
    public static function sortedLastIndex(array : ArrayType, value : Dynamic) : Int {
        #if js
            return lo().sortedLastIndex(array, value);
        #end
    }

    /**
        This method is like _.sortedLastIndex except that it accepts iteratee
        which is invoked for value and each element of array to compute their
        sort ranking. The iteratee is invoked with one argument: (value).

        Returns the index at which value should be inserted into array.

        Arguments

            array (Array): The sorted array to inspect.
            value (*): The value to evaluate.
            [iteratee=_.identity] (Function): The iteratee invoked per element.

        Returns

            (number): Returns the index at which value should be inserted into array.
    **/
    @:overload(function (array: ArrayType, value: Dynamic, ?iteratee: Dynamic): Int {})
    public static function sortedLastIndexBy(array : ArrayType, value : Dynamic, ?iteratee : Iteratee) : Int {
        #if js
            return lo().sortedLastIndexBy(array, value, iteratee);
        #end
    }

    /**
        This method is like _.lastIndexOf except that it performs a binary search on a sorted array.

        Returns the index of the matched value, else -1.

        Arguments

            array (Array): The array to inspect.
            value (*): The value to search for.

        Returns

            (number): Returns the index of the matched value, else -1.
    **/
    public static function sortedLastIndexOf(array : ArrayType, value : Dynamic) : Int {
        #if js
            return lo().sortedLastIndexOf(array, value);
        #end
    }

    /**
        This method is like _.uniq except that it's designed and optimized for
        sorted arrays.

        Arguments

            array (Array): The array to inspect.

        Returns

            (Array): Returns the new duplicate free array.
    **/
    public static function sortedUniq(array: ArrayType): ArrayType {
        #if js
            return lo().sortedUniq(array);
        #end
    }

    /**
        This method is like _.uniqBy except that it's designed and optimized for
        sorted arrays.

        Arguments

            array (Array): The array to inspect.
            [iteratee] (Function): The iteratee invoked per element.

        Returns

            (Array): Returns the new duplicate free array
    **/
    public static function sortedUniqBy(array: ArrayType, ?iteratee: Iteratee): ArrayType {
        #if js
            return lo().sortedUniqBy(array, iteratee);
        #end
    }

    /**
        Gets all but the first element of array.

        Arguments

            array (Array): The array to query.

        Returns

            (Array): Returns the slice of array.
    **/
    public static function tail(array: ArrayType): ArrayType {
        #if js
            return lo().tail(array);
        #end
    }

    /**
        Creates a slice of array with n elements taken from the beginning.
    **/
    public static function take(array: ArrayType, ?n: Int =1): ArrayType;

    /**
        Creates a slice of array with n elements taken from the end.
    **/
    public static function takeRight(array: ArrayType, ?n: Int = 1): ArrayType;

    /**
        Creates a slice of array with elements taken from the end. Elements are 
        taken until predicate returns falsey. The predicate is invoked with three 
        arguments: (value, index, array).
    **/
    public static function takeRightWhile(array: ArrayType, ?predicate: Predicate): ArrayType;

    /**
        Creates a slice of array with elements taken from the beginning. 
        Elements are taken until predicate returns falsey. The predicate is 
        invoked with three arguments: (value, index, array).
    **/
    public static function takeWhile(array: ArrayType, ?predicate: Predicate): ArrayType;

    /**
        Creates an array of unique values, in order, from all given arrays using
        SameValueZero for equality comparisons.
    **/
    public static function union(arrays: Array<ArrayType>): ArrayType;

    /**
        This method is like _.union except that it accepts iteratee which is 
        invoked for each element of each arrays to generate the criterion by which 
        uniqueness is computed. Result values are chosen from the first array in 
        which the value occurs. The iteratee is invoked with one argument: (value).
    **/
    public static function unionBy(arrays: Array<ArrayType>, ?iteratee: Iteratee): ArrayType;

    /**
        This method is like _.union except that it accepts comparator which is 
        invoked to compare elements of arrays. Result values are chosen from the 
        first array in which the value occurs. The comparator is invoked with 
        two arguments: (arrVal, othVal).
    **/
    public static function unionWith(arrays: Array<ArrayType>, ?comparator: Comparator): ArrayType;

    /**
        Creates a duplicate-free version of an array, using SameValueZero for 
        equality comparisons, in which only the first occurrence of each element 
        is kept. The order of result values is determined by the order they occur 
        in the array.
    **/
    public static function uniq(array: ArrayType): ArrayType;

    /**
        This method is like _.uniq except that it accepts iteratee which is invoked 
        for each element in array to generate the criterion by which uniqueness 
        is computed. The order of result values is determined by the order they 
        occur in the array. The iteratee is invoked with one argument: (value).

        Returns the new duplicate free array.
    **/
    public static function uniqBy(array: ArrayType, ?iteratee: Iteratee): ArrayType;

    /**
        This method is like _.uniq except that it accepts comparator which is 
        invoked to compare elements of array. The order of result values is 
        determined by the order they occur in the array.The comparator is invoked 
        with two arguments: (arrVal, othVal).

        Returns the new duplicate free array.
    **/
    public static function uniqWith(array: ArrayType, ?comparator:Comparator): ArrayType;

    /**
        This method is like _.zip except that it accepts an array of grouped 
        elements and creates an array regrouping the elements to their pre-zip 
        configuration.

        Returns the new array of regrouped elements.
    **/
    public static function unzip(array: ArrayType): ArrayType;

    /**
        This method is like _.unzip except that it accepts iteratee to specify 
        how regrouped values should be combined. The iteratee is invoked with the 
        elements of each group: (...group).

        Returns the new array of regrouped elements.
    **/
    public static function unzipWith(array: ArrayType, ?iteratee: Iteratee): ArrayType;

    /**
        Creates an array excluding all given values using SameValueZero for equality comparisons.

         Returns the new array of filtered values.
    **/
    public static function without(array: ArrayType, values: ArrayType): ArrayType;

    /**
        Creates an array of unique values that is the symmetric difference of the 
        given arrays. The order of result values is determined by the order they 
        occur in the arrays.

        Returns the new array of filtered values.
    **/
    public static function xor(arrays: Array<ArrayType>): ArrayType;

    /**

        This method is like _.xor except that it accepts iteratee which is invoked 
        for each element of each arrays to generate the criterion by which by which 
        they're compared. The order of result values is determined by the order 
        they occur in the arrays. The iteratee is invoked with one argument: (value).

        Returns the new array of filtered values.
    **/
    public static function xorBy(arrays: Array<ArrayType>, ?iteratee: Iteratee): ArrayType;

    /**
        This method is like _.xor except that it accepts comparator which is 
        invoked to compare elements of arrays. The order of result values is 
        determined by the order they occur in the arrays. The comparator is 
        invoked with two arguments: (arrVal, othVal).
    **/
    public static function xorWith(arrays: Array<ArrayType>, ?comparator: Comparator): ArrayType;

    /**
        Creates an array of grouped elements, the first of which contains the 
        first elements of the given arrays, the second of which contains the 
        second elements of the given arrays, and so on.
    **/
    public static function zip(arrays: Array<ArrayType>): ArrayType;

    /**
        This method is like _.fromPairs except that it accepts two arrays, one of 
        property identifiers and one of corresponding values.
    **/
    public static function zipObject(props: ArrayType, values: ArrayType): Variant;

    /**
        This method is like _.zipObject except that it supports property paths.

        Returns the new object.
    **/
    public static function zipObjectDeep(props: ArrayType, values: ArrayType): Variant;

    /**
        This method is like _.zip except that it accepts iteratee to specify how 
        grouped values should be combined. The iteratee is invoked with the elements 
        of each group: (...group).
    **/
    public static function zipWith(arrays: Array<ArrayType>, ?iteratee: Iteratee): ArrayType;
}
