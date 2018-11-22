
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

        Arguments

            array (Array): The array to query.
            [n=1] (number): The number of elements to take.

        Returns

            (Array): Returns the slice of array.
    **/
    public static function take(array: ArrayType, ?n: Int =1): ArrayType {
        #if js
            return lo().take(array, n);
        #end
    }

    /**
        Creates a slice of array with n elements taken from the end.

        Arguments

            array (Array): The array to query.
            [n=1] (number): The number of elements to take.

        Returns

            (Array): Returns the slice of array.
    **/
    public static function takeRight(array: ArrayType, ?n: Int = 1): ArrayType {
        #if js
            return lo().takeRight(array, n);
        #end
    }

    /**
        Creates a slice of array with elements taken from the end. Elements are
        taken until predicate returns falsey. The predicate is invoked with three
        arguments: (value, index, array).

        Arguments

            array (Array): The array to query.
            [predicate=_.identity] (Function): The function invoked per iteration.

        Returns

            (Array): Returns the slice of array.
    **/
    @:overload(function (array: ArrayType, ?predicate: Dynamic): ArrayType {})
    public static function takeRightWhile(array: ArrayType, ?predicate: Predicate): ArrayType {
        #if js
            return lo().takeRightWhile(array, predicate);
        #end
    }

    /**
        Creates a slice of array with elements taken from the beginning.
        Elements are taken until predicate returns falsey. The predicate is
        invoked with three arguments: (value, index, array).

        Arguments

            array (Array): The array to query.
            [predicate=_.identity] (Function): The function invoked per iteration.

        Returns

            (Array): Returns the slice of array.
    **/
    @:overload(function (array: ArrayType, ?predicate: Dynamic): ArrayType {})
    public static function takeWhile(array : ArrayType, ?predicate : Predicate) : ArrayType {
        #if js
            return lo().takeWhile(array, predicate);
        #end
    }

    /**
        Creates an array of unique values, in order, from all given arrays using
        SameValueZero for equality comparisons.

        Arguments

            [arrays] (...Array): The arrays to inspect.

        Returns

            (Array): Returns the new array of combined values.
    **/
    public static function union(arrays: Array<Dynamic>): ArrayType {
        #if js
            return apply(lo().union, arrays);
        #end
    }

    /**
        This method is like _.union except that it accepts iteratee which is
        invoked for each element of each arrays to generate the criterion by which
        uniqueness is computed. Result values are chosen from the first array in
        which the value occurs. The iteratee is invoked with one argument: (value).

        Arguments

            [arrays] (...Array): The arrays to inspect.
            [iteratee=_.identity] (Function): The iteratee invoked per element.

        Returns

            (Array): Returns the new array of combined values.
    **/
    @:overload(function (arrays: Array<Dynamic>, ?iteratee: Dynamic): ArrayType {})
    public static function unionBy(arrays: Array<Dynamic>, ?iteratee: Iteratee): ArrayType {
        #if js
            var params = arrays.copy();
            if (null != iteratee) {
                params.push(iteratee);
            }
            return apply(lo().unionBy, params);
        #end
    }

    /**
        This method is like _.union except that it accepts comparator which is
        invoked to compare elements of arrays. Result values are chosen from the
        first array in which the value occurs. The comparator is invoked with
        two arguments: (arrVal, othVal).

        Arguments

            [arrays] (...Array): The arrays to inspect.
            [comparator] (Function): The comparator invoked per element.

        Returns

            (Array): Returns the new array of combined values.
    **/
    public static function unionWith(arrays: Array<Dynamic>, ?comparator: Comparator): ArrayType {
        #if js
            var params = arrays.copy();
            if (null != comparator) {
                params.push(comparator);
            }
            return apply(lo().unionWith, params);
        #end
    }

    /**
        Creates a duplicate-free version of an array, using SameValueZero for
        equality comparisons, in which only the first occurrence of each element
        is kept. The order of result values is determined by the order they occur
        in the array.

        Arguments

            array (Array): The array to inspect.

        Returns

            (Array): Returns the new duplicate free array.
    **/
    public static function uniq(array: ArrayType): ArrayType {
        #if js
            return lo().uniq(array);
        #end
    }

    /**
        This method is like _.uniq except that it accepts iteratee which is invoked
        for each element in array to generate the criterion by which uniqueness
        is computed. The order of result values is determined by the order they
        occur in the array. The iteratee is invoked with one argument: (value).

        Returns the new duplicate free array.

        Arguments

            array (Array): The array to inspect.
            [iteratee=_.identity] (Function): The iteratee invoked per element.

        Returns

            (Array): Returns the new duplicate free array.
    **/
    @:overload(function (array: ArrayType, ?iteratee: Dynamic): ArrayType {})
    public static function uniqBy(array: ArrayType, ?iteratee: Iteratee): ArrayType {
        #if js
            return lo().uniqBy(array, iteratee);
        #end
    }

    /**
        This method is like _.uniq except that it accepts comparator which is
        invoked to compare elements of array. The order of result values is
        determined by the order they occur in the array.The comparator is invoked
        with two arguments: (arrVal, othVal).

        Returns the new duplicate free array.

        Arguments

            array (Array): The array to inspect.
            [comparator] (Function): The comparator invoked per element.

        Returns

            (Array): Returns the new duplicate free array.
    **/
    public static function uniqWith(array: ArrayType, ?comparator:Comparator): ArrayType {
        #if js
            return lo().uniqWith(array, comparator);
        #end
    }

    /**
        This method is like _.zip except that it accepts an array of grouped
        elements and creates an array regrouping the elements to their pre-zip
        configuration.

        Returns the new array of regrouped elements.

        Arguments

            array (Array): The array of grouped elements to process.

        Returns

            (Array): Returns the new array of regrouped elements.
    **/
    public static function unzip(array: ArrayType): ArrayType {
        #if js
            return lo().unzip(array);
        #end
    }

    /**
        This method is like _.unzip except that it accepts iteratee to specify
        how regrouped values should be combined. The iteratee is invoked with the
        elements of each group: (...group).

        Returns the new array of regrouped elements.

        Arguments

            array (Array): The array of grouped elements to process.
            [iteratee=_.identity] (Function): The function to combine regrouped values.

        Returns

            (Array): Returns the new array of regrouped elements.
    **/
    public static function unzipWith(array: ArrayType, ?iteratee: Dynamic): ArrayType {
        #if js
            return lo().unzipWith(array, iteratee);
        #end
    }

    /**
        Creates an array excluding all given values using SameValueZero for equality comparisons.

         Returns the new array of filtered values.

        Arguments

            array (Array): The array to inspect.
            [values] (...*): The values to exclude.

        Returns

            (Array): Returns the new array of filtered values.
    **/
    public static function without(values: ArrayType): ArrayType {
        #if js
            return apply(lo().without, values);
        #end
    }

    /**
        Creates an array of unique values that is the symmetric difference of the
        given arrays. The order of result values is determined by the order they
        occur in the arrays.

        Returns the new array of filtered values.

        Arguments

            [arrays] (...Array): The arrays to inspect.

        Returns

            (Array): Returns the new array of filtered values.

    **/
    public static function xor(arrays: Array<ArrayType>): ArrayType {
        #if js
            return apply(lo().xor, arrays);
        #end
    }

    /**

        This method is like _.xor except that it accepts iteratee which is invoked
        for each element of each arrays to generate the criterion by which by which
        they're compared. The order of result values is determined by the order
        they occur in the arrays. The iteratee is invoked with one argument: (value).

        Returns the new array of filtered values.

        Arguments

            [arrays] (...Array): The arrays to inspect.
            [iteratee=_.identity] (Function): The iteratee invoked per element.

        Returns

            (Array): Returns the new array of filtered values.
    **/
    public static function xorBy(arrays: Array<Dynamic>, ?iteratee: Dynamic): ArrayType {
        #if js
            var params = arrays.copy();
            if (null != iteratee) {
                params.push(iteratee);
            }
            return apply(lo().xorBy, params);
        #end
    }

    /**
        This method is like _.xor except that it accepts comparator which is
        invoked to compare elements of arrays. The order of result values is
        determined by the order they occur in the arrays. The comparator is
        invoked with two arguments: (arrVal, othVal).

        Arguments

            [arrays] (...Array): The arrays to inspect.
            [comparator] (Function): The comparator invoked per element.

        Returns

            (Array): Returns the new array of filtered values.
    **/
    public static function xorWith(arrays: Array<Dynamic>, ?comparator: Comparator): ArrayType {
        #if js
            var params = arrays.copy();
            if (null != comparator) {
                params.push(comparator);
            }
            return apply(lo().xorWith, params);
        #end
    }

    /**
        Creates an array of grouped elements, the first of which contains the
        first elements of the given arrays, the second of which contains the
        second elements of the given arrays, and so on.

        Arguments

            [arrays] (...Array): The arrays to process.

        Returns

            (Array): Returns the new array of grouped elements.
    **/
    public static function zip(arrays: Array<ArrayType>): ArrayType {
        #if js
            return apply(lo().zip, arrays);
        #end
    }

    /**
        This method is like _.fromPairs except that it accepts two arrays, one of
        property identifiers and one of corresponding values.

        Arguments

            [props=[]] (Array): The property identifiers.
            [values=[]] (Array): The property values.

        Returns

            (Object): Returns the new object.
    **/
    public static function zipObject(props: ArrayType, values: ArrayType): Dynamic {
        #if js
            return lo().zipObject(props, values);
        #end
    }

    /**
        This method is like _.zipObject except that it supports property paths.

        Returns the new object.

        Arguments

            [props=[]] (Array): The property identifiers.
            [values=[]] (Array): The property values.

        Returns

            (Object): Returns the new object.
    **/
    public static function zipObjectDeep(props: ArrayType, values: ArrayType): Dynamic {
        #if js
            return lo().zipObjectDeep(props, values);
        #end
    }

    /**
        This method is like _.zip except that it accepts iteratee to specify how
        grouped values should be combined. The iteratee is invoked with the elements
        of each group: (...group).

        Arguments

            [arrays] (...Array): The arrays to process.
            [iteratee=_.identity] (Function): The function to combine grouped values.

        Returns

            (Array): Returns the new array of grouped elements.
    **/
    public static function zipWith(arrays: Array<ArrayType>, ?iteratee: Dynamic): ArrayType {
        #if js
            var params = arrays.copy();
            if (null != iteratee) {
                params.push(iteratee);
            }
            return apply(lo().zipWith, params);
        #end
    }

    // -------------------------------------------------------------------------
    // Collection
    // -------------------------------------------------------------------------

    /**
        Creates an object composed of keys generated from the results of running
        each element of collection thru iteratee. The corresponding value of each
        key is the number of times the key was returned by iteratee. The iteratee
        is invoked with one argument: (value).

        Returns the composed aggregate object.

        Arguments

            collection (Array|Object): The collection to iterate over.
            [iteratee=_.identity] (Function): The iteratee to transform keys.

        Returns

            (Object): Returns the composed aggregate object.
    **/
    public static function countBy(collection: Collection, ?iteratee: Dynamic): Dynamic {
        #if js
            return lo().countBy(collection, iteratee);
        #end
    }
    
    /**
        Iterates over elements of collection and invokes iteratee for each element.
        The iteratee is invoked with three arguments: (value, index|key, collection).
        Iteratee functions may exit iteration early by explicitly returning false.

        Note: As with other "Collections" methods, objects with a "length" property
        are iterated like arrays. To avoid this behavior use _.forIn or _.forOwn
        for object iteration.

        Aliases: _.each

        Arguments

            collection (Array|Object): The collection to iterate over.
            [iteratee=_.identity] (Function): The function invoked per iteration.

        Returns

            (*): Returns collection.
    **/
    public static function forEach(collection: Collection, ?iteratee: Dynamic): Collection {
        #if js
            return lo().forEach(collection, iteratee);
        #end
    }
    /**
        This method is like _.forEach except that it iterates over elements of
        collection from right to left.

        Aliases: _.eachRight

        Arguments

            collection (Array|Object): The collection to iterate over.
            [iteratee=_.identity] (Function): The function invoked per iteration.

        Returns

            (*): Returns collection.
    **/
    public static function forEachRight(collection: Collection, ?iteratee: Dynamic -> Void): Collection {
        #if js
            return lo().forEachRight(collection, iteratee);
        #end
    }

    /**
        Checks if predicate returns truthy for all elements of collection. Iteration
        is stopped once predicate returns falsey. The predicate is invoked with
        three arguments: (value, index|key, collection).

        Note: This method returns true for empty collections because everything
        is true of elements of empty collections.

        Returns true if all elements pass the predicate check, else false.

        Arguments

            collection (Array|Object): The collection to iterate over.
            [predicate=_.identity] (Function): The function invoked per iteration.

        Returns

            (boolean): Returns true if all elements pass the predicate check, else false.
    **/
    @:overload(function (collection: Collection, ?predicate: Dynamic): Bool{})
    public static function every(collection: Collection, ?predicate: Predicate): Bool {
        #if js
            return lo().every(collection, predicate);
        #end
    }

    /**
        Iterates over elements of collection, returning an array of all elements
        predicate returns truthy for. The predicate is invoked with three arguments:
        (value, index|key, collection).

        Note: Unlike _.remove, this method returns a new array.

        Returns the new filtered array.

        Arguments

            collection (Array|Object): The collection to iterate over.
            [predicate=_.identity] (Function): The function invoked per iteration.

        Returns

            (Array): Returns the new filtered array.
    **/
    @:overload(function (collection: Collection, ?predicate: Dynamic): ArrayType{})
    public static function filter(collection: Collection, ?predicate: Predicate): ArrayType {
        #if js
            return lo().filter(collection, predicate);
        #end
    }
    
    /**
        Iterates over elements of collection, returning the first element predicate
        returns truthy for. The predicate is invoked with three arguments:
        (value, index|key, collection).

        Returns the matched element, else undefined.

        Arguments

            collection (Array|Object): The collection to inspect.
            [predicate=_.identity] (Function): The function invoked per iteration.
            [fromIndex=0] (number): The index to search from.

        Returns

            (*): Returns the matched element, else undefined.
    **/
    @:overload(function (collection: Collection, ?predicate: Dynamic, ?fromIndex: Int = 0): Dynamic {})
    public static function find(collection: Collection, ?predicate: Predicate, ?fromIndex: Int = 0): Dynamic {
        #if js
            return lo().find(collection, predicate, fromIndex);
        #end
    }

    /**
        This method is like _.find except that it iterates over elements of
        collection from right to left.

        Returns the matched element, else undefined.

        Arguments

            collection (Array|Object): The collection to inspect.
            [predicate=_.identity] (Function): The function invoked per iteration.
            [fromIndex=collection.length-1] (number): The index to search from.

        Returns

            (*): Returns the matched element, else undefined.
    **/
    public static function findLast(collection: Collection, ?predicate: Predicate, ?fromIndex : Int): Dynamic {
        #if js
            return lo().findLast(collection, predicate, fromIndex);
        #end
    }

    /**
        Creates a flattened array of values by running each element in collection
        thru iteratee and flattening the mapped results. The iteratee is invoked
        with three arguments: (value, index|key, collection).

        Returns the new flattened array.

        Arguments

            collection (Array|Object): The collection to iterate over.
            [iteratee=_.identity] (Function): The function invoked per iteration.

        Returns

            (Array): Returns the new flattened array.
    **/
    public static function flatMap(collection: Collection, ?iteratee: Iteratee): ArrayType {
        #if js
            return lo().flatMap(collection, iteratee);
        #end
    }

    /**
        This method is like _.flatMap except that it recursively flattens the mapped results.

        Returns the new flattened array.

        Arguments

            collection (Array|Object): The collection to iterate over.
            [iteratee=_.identity] (Function): The function invoked per iteration.

        Returns

            (Array): Returns the new flattened array.
    **/
    public static function flatMapDeep(collection: Collection, ?iteratee: Iteratee): ArrayType {
        #if js
            return lo().flatMapDeep(collection, iteratee);
        #end
    }

    /**
        This method is like _.flatMap except that it recursively flattens the mapped results up to depth times.

        Returns the new flattened array.

        Arguments

            collection (Array|Object): The collection to iterate over.
            [iteratee=_.identity] (Function): The function invoked per iteration.
            [depth=1] (number): The maximum recursion depth.

        Returns

            (Array): Returns the new flattened array
    **/
    public static function flatMapDepth(collection: Collection, ?iteratee: Iteratee, ?depth: Int = 1): ArrayType {
        #if js
            return lo().flatMapDepth(collection, iteratee, depth);
        #end
    }

    /**
        Creates an object composed of keys generated from the results of running
        each element of collection thru iteratee. The order of grouped values is
        determined by the order they occur in collection. The corresponding value
        of each key is an array of elements responsible for generating the key.
        The iteratee is invoked with one argument: (value).

        Returns the composed aggregate object.

        Arguments

            collection (Array|Object): The collection to iterate over.
            [iteratee=_.identity] (Function): The iteratee to transform keys.

        Returns

            (Object): Returns the composed aggregate object.
    **/
    @:overload(function (collection: Collection, ?iteratee: Dynamic): Dynamic {})
    public static function groupBy(collection: Collection, ?iteratee: Iteratee): Dynamic {
        #if js
            return lo().groupBy(collection, iteratee);
        #end
    }

    /**
        Checks if value is in collection. If collection is a string, it's checked for a substring of value, otherwise
        SameValueZero is used for equality comparisons. If fromIndex is negative, it's used as the offset from the end
        of collection.

        Returns true if value is found, else false.

        Arguments

            collection (Array|Object|string): The collection to inspect.
            value (*): The value to search for.
            [fromIndex=0] (number): The index to search from.

        Returns

            (boolean): Returns true if value is found, else false.
    **/
    public static function includes(collection: Collection, value: Dynamic, ?fromIndex: Int = 0): Bool {
        #if js
            return lo().includes(collection, value, fromIndex);
        #end
    }

    /**
        Invokes the method at path of each element in collection, returning an array
        of the results of each invoked method. Any additional arguments are provided
        to each invoked method. If path is a function, it's invoked for, and this
        bound to, each element in collection.

        Arguments

            collection (Array|Object): The collection to iterate over.
            path (Array|Function|string): The path of the method to invoke or the function invoked per iteration.
            [args] (...*): The arguments to invoke each method with.

        Returns

            (Array): Returns the array of results.
    **/
    @:overload(function (collection: Collection, path: Dynamic, ?args: Dynamic): ArrayType {})
    public static function invokeMap(collection: Collection, path: Dynamic, ?args: Array<Dynamic>): ArrayType {
        #if js
            return lo().invokeMap(collection, path, args);
        #end
    }

    /**
        Creates an object composed of keys generated from the results of running
        each element of collection thru iteratee. The corresponding value of each
        key is the last element responsible for generating the key. The iteratee
        is invoked with one argument: (value).

        Returns the composed aggregate object.

        Arguments

            collection (Array|Object): The collection to iterate over.
            path (Array|Function|string): The path of the method to invoke or the function invoked per iteration.
            [args] (...*): The arguments to invoke each method with.

        Returns

            (Array): Returns the array of results.
    **/
    @:overload(function (collection: Collection, ?iteratee: Dynamic): Dynamic {})
    public static function keyBy(collection: Collection, ?iteratee: Iteratee): Dynamic {
        #if js
            return lo().keyBy(collection, iteratee);
        #end
    }

    /**
        Creates an array of values by running each element in collection thru iteratee.
        The iteratee is invoked with three arguments: (value, index|key, collection).

        Many lodash methods are guarded to work as iteratees for methods like _.every,
        _.filter, _.map, _.mapValues, _.reject, and _.some.

        Arguments

            collection (Array|Object): The collection to iterate over.
            path (Array|Function|string): The path of the method to invoke or the function invoked per iteration.
            [args] (...*): The arguments to invoke each method with.

        Returns

            (Array): Returns the array of results.
     **/
    @:overload(function(collection: Collection, ?iteratees: Dynamic): ArrayType {})
    public static function map(collection: Collection, ?iteratees: Iteratee): ArrayType {
        #if js
            return lo().map(collection, iteratees);
        #end
    }

    /**
        collection (Array|Object): The collection to iterate over.
        [iteratees=[_.identity]] (Array[]|Function[]|Object[]|string[]): The iteratees to sort by.
        [orders] (string[]): The sort orders of iteratees.

        Arguments

            collection (Array|Object): The collection to iterate over.
            [iteratees=[_.identity]] (Array[]|Function[]|Object[]|string[]): The iteratees to sort by.
            [orders] (string[]): The sort orders of iteratees.

        Returns

            (Array): Returns the new sorted array.
    **/
    public static function orderBy(collection: Collection, ?iteratees: Array<String>, ?orders: Array<String>) {
        #if js
            return lo().orderBy(collection, iteratees, orders);
        #end
    }

    /**
        partition()

        Creates an array of elements split into two groups, the first of which
        contains elements predicate returns truthy for, the second of which
        contains elements predicate returns falsey for. The predicate is invoked
        with one argument: (value).

        Arguments

            collection (Array|Object): The collection to iterate over.
            [predicate=_.identity] (Function): The function invoked per iteration.

        Returns

            (Array): Returns the array of grouped elements.
    **/
    @:overload(function (collection: Collection, ?predicate: Dynamic): ArrayType {})
    public static function partition(collection: Collection, ?predicate: Predicate): ArrayType {
        #if js
            return lo().partition(collection, predicate);
        #end
    }

    /**
        reduce()

        Reduces collection to a value which is the accumulated result of running
        each element in collection thru iteratee, where each successive invocation
        is supplied the return value of the previous. If accumulator is not given,
        the first element of collection is used as the initial value. The iteratee
        is invoked with four arguments:
        (accumulator, value, index|key, collection).

        Many lodash methods are guarded to work as iteratees for methods like
        _.reduce, _.reduceRight, and _.transform.

        The guarded methods are:
        assign, defaults, defaultsDeep, includes, merge, orderBy, and sortBy

        Arguments

            collection (Array|Object): The collection to iterate over.
            [iteratee=_.identity] (Function): The function invoked per iteration.
            [accumulator] (*): The initial value.

        Returns

            (*): Returns the accumulated value.

    **/
    @:overload(function (collection: Collection, ?iteratee: Dynamic, ?accumulator: Dynamic): Dynamic {})
    public static function reduce(collection: Collection, ?iteratee: Iteratee, ?accumulator: Dynamic): Dynamic {
        #if js
            return lo().reduce(collection, iteratee, accumulator);
        #end
    }

    /**
        reduceRight()

        This method is like _.reduce except that it iterates over elements of
        collection from right to left.

        Arguments

            collection (Array|Object): The collection to iterate over.
            [iteratee=_.identity] (Function): The function invoked per iteration.
            [accumulator] (*): The initial value.

        Returns

            (*): Returns the accumulated value.
    **/
    @:overload(function (collection: Collection, ?iteratee: Dynamic, ?accumulator: Dynamic): Dynamic {})
    public static function reduceRight(collection: Collection, ?iteratee: Iteratee, ?accumulator: Dynamic): Dynamic {
        #if js
            return lo().reduceRight(collection, iteratee, accumulator);
        #end
    }

    /**
        reject()


        The opposite of _.filter; this method returns the elements of collection
        that predicate does not return truthy for.

        Arguments

            collection (Array|Object): The collection to iterate over.
            [predicate=_.identity] (Function): The function invoked per iteration.

        Returns

            (Array): Returns the new filtered array.
    **/
    @:overload(function (collection: Collection, ?predicate: Dynamic): ArrayType {})
    public static function reject(collection: Collection, ?predicate: Predicate): ArrayType {
        #if js
            return lo().reject(collection, predicate);
        #end
    }

    /**
        sample()

        Gets a random element from collection.

        Arguments

            collection (Array|Object): The collection to sample.

        Returns

            (*): Returns the random element.
    **/
    public static function sample(collection: Collection): Dynamic {
        #if js
            return lo().sample(collection);
        #end
    }

    /**
        sampleSize()

        Gets n random elements at unique keys from collection up to the size of collection.

        Arguments

            collection (Array|Object): The collection to sample.
            [n=1] (number): The number of elements to sample.

        Returns

            (Array): Returns the random elements.
    **/
    public static function sampleSize(collection: Collection, ?n: Int = 1): Array<Dynamic> {
        #if js
            return lo().sampleSize(collection, n);
        #end
    }

    /**
        shuffle()

        Creates an array of shuffled values, using a version of the Fisher-Yates shuffle.

        Arguments

            collection (Array|Object): The collection to shuffle.

        Returns

            (Array): Returns the new shuffled array.
    **/
    public static function shuffle(collection: Collection): Array<Dynamic> {
        #if js
            return lo().shuffle(collection);
        #end
    }

    /**
        size()

        Gets the size of collection by returning its length for array-like values 
        or the number of own enumerable string keyed properties for objects.

        Arguments

            collection (Array|Object|string): The collection to inspect.

        Returns

            (number): Returns the collection size.
    **/
    public static function size(collection: Collection): Int {
        #if js
            return lo().size(collection);
        #end
    }

    /**
        some()

        Checks if predicate returns truthy for any element of collection. 
        Iteration is stopped once predicate returns truthy. 
        The predicate is invoked with three arguments: (value, index|key, collection).

        Arguments

            collection (Array|Object): The collection to iterate over.
            [predicate=_.identity] (Function): The function invoked per iteration.

        Returns

            (boolean): Returns true if any element passes the predicate check, else false.

    **/
    @:overload(function (collection: Collection, ?predicate: Dynamic): Bool {})
    public static function some(collection: Collection, ?predicate: Predicate): Bool {
        #if js
            return lo().some(collection, predicate);
        #end
    }


    /**
        sortBy()

        Creates an array of elements, sorted in ascending order by the results
        of running each element in a collection thru each iteratee. This method
        performs a stable sort, that is, it preserves the original sort order of
        equal elements. The iteratees are invoked with one argument: (value).

        Arguments

            collection (Array|Object): The collection to iterate over.
            [iteratees=[_.identity]] (...(Function|Function[])): The iteratees to sort by.

        Returns

            (Array): Returns the new sorted array.
    **/
    @:overload(function (collection: Collection, ?iteratees: Array<Dynamic>): ArrayType {})
    public static function sortBy(collection: Collection, ?iteratees: Array<Iteratee>): ArrayType {
        #if js
            return lo().sortBy(collection, iteratees);
        #end
    }
}
