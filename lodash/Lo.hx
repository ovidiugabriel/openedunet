
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

class Main {
    public static function main() {
        Lo.chunk([1, 2, 3], 1);
    }
}

class Lo {
    static public var Boolean(get, never) : Bool;
    static public var undefined(get, never) : Dynamic;
    static public var arguments(get, never) : Dynamic;
    static public var values(get, never) : Dynamic;

    /**
        [static] get_Boolean()
    **/
    @:extern
    static inline public function get_Boolean(): Bool {
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
        Creates an array of elements split into groups the length of size. 
        If array can't be split evenly, the final chunk will be the remaining elements.
    **/
    public static function chunk(array: ArrayType, ?size: Int = 1): ArrayType;

    /** 
        Creates an array with all falsey values removed. 
        The values false, null, 0, "", undefined, and NaN are falsey.
    **/
    public static function compact(array: ArrayType): ArrayType;

    /**
        Creates a new array concatenating array with any additional arrays and/or values.
    **/
    public static function concat(array: ArrayType, values: Rest<ArrayType>): ArrayType;

    /**
        Creates an array of array values not included in the other given arrays 
        using SameValueZero for equality comparisons. 

        The order and references of result values are determined by the first array.

        Unlike _.pullAll, this method returns a new array.
    **/
    public static function difference(array: ArrayType, values: Rest<ArrayType>): ArrayType;

    /**
        This method is like _.difference except that it accepts iteratee which is 
        invoked for each element of array and values to generate the criterion by 
        which they're compared. 
        The order and references of result values are determined by the first array. 
        The iteratee is invoked with one argument: (value).

        Note: Unlike _.pullAllBy, this method returns a new array.
    **/
    public static function differenceBy(array: ArrayType, ?values: ArrayType, ?iteratee : Iteratee): ArrayType;

    /**
        This method is like _.difference except that it accepts comparator which i
        s invoked to compare elements of array to values. The order and references 
        of result values are determined by the first array. The comparator is 
        invoked with two arguments: (arrVal, othVal).

        Note: Unlike _.pullAllWith, this method returns a new array.
    **/
    public static function differenceWith(array: ArrayType, ?values: ArrayType, ?comparator : Comparator): ArrayType;

    /**
        Creates a slice of array with n elements dropped from the beginning.
    **/
    public static function drop(array: ArrayType, ?n: Int = 1): ArrayType;

    /**
        Creates a slice of array with n elements dropped from the end.
    **/
    public static function dropRight(array: ArrayType, ?n: Int = 1): ArrayType;

    /**
        Creates a slice of array excluding elements dropped from the end. 
        Elements are dropped until predicate returns falsey. 
        The predicate is invoked with three arguments: (value, index, array).
    **/
    public static function dropRightWhile(array: ArrayType, ?predicate: Predicate): ArrayType;

    /**
        Creates a slice of array excluding elements dropped from the beginning. 
        Elements are dropped until predicate returns falsey. The predicate is 
        invoked with three arguments: (value, index, array).
    **/
    public static function dropWhile(array: ArrayType, ?predicate: Predicate): ArrayType;

    /** 
        Fills elements of array with value from start up to, but not including, end.

        Note: This method mutates array.
    **/
    public static function fill(array: ArrayType, value:Variant, ?start: Int = 0, ?end: Int): ArrayType;

    /**
        This method is like _.find except that it returns the index of the first 
        element predicate returns truthy for instead of the element itself.
    **/
    public static function findIndex(array: ArrayType, ?predicate: Predicate, ?fromIndex: Int = 0): ArrayType;

    /**
        This method is like _.findIndex except that it iterates over elements of 
        collection from right to left.
    **/
    public static function findLastIndex(array: ArrayType, ?predicate: Predicate, ?fromIndex: Int): ArrayType;

    /**
        Gets the first element of array.
    **/
    public static function head(array: ArrayType): ArrayType;

    /**
        Flattens array a single level deep.
    **/
    public static function flatten(array: ArrayType): ArrayType;

    /**
        Recursively flattens array.
    **/
    public static function flattenDeep(array: ArrayType): ArrayType;

    /**
        Recursively flatten array up to depth times.
    **/
    public static function flattenDepth(array: ArrayType, ?depth: Int = 1): ArrayType;

    /**
        The inverse of _.toPairs; this method returns an object composed from key-value pairs.
    **/
    public static function fromPairs(pairs: Array<ArrayType>): StringMap<Variant>;

    /**
        Gets the index at which the first occurrence of value is found in array 
        using SameValueZero for equality comparisons. If fromIndex is negative, 
        it's used as the offset from the end of array.
    **/
    public static function indexOf(array: ArrayType, value: Variant, ?fromIndex: Int = 0): Int;

    /**
        Gets all but the last element of array.
    **/
    public static function initial(array: ArrayType): ArrayType;

    /**
        Creates an array of unique values that are included in all given arrays 
        using SameValueZero for equality comparisons. 
        The order and references of result values are determined by the first array.
    **/
    public static function intersection(arrays: Rest<ArrayType>): ArrayType;

    /**
        This method is like _.intersection except that it accepts iteratee which 
        is invoked for each element of each arrays to generate the criterion by 
        which they're compared. The order and references of result values are 
        determined by the first array. 
        The iteratee is invoked with one argument: (value).
    **/
    public static function intersectionBy(arrays: Array<ArrayType>, ?iteratee: Iteratee): ArrayType;

    /**
        This method is like _.intersection except that it accepts comparator 
        which is invoked to compare elements of arrays. The order and references
        of result values are determined by the first array. The comparator is 
        invoked with two arguments: (arrVal, othVal).
    **/
    public static function intersectionWith(arrays: Array<ArrayType>, ?comparator: Comparator): ArrayType;

    /**
        Converts all elements in array into a string separated by separator.
    **/
    public static function join(array: ArrayType, ?separator: String =','): String;

    /**
        Gets the last element of array.
    **/
    public static function last(array: ArrayType):Variant;

    /**
        This method is like _.indexOf except that it iterates over elements of 
        array from right to left.
    **/
    public static function lastIndexOf(array: ArrayType, value: Variant, ?fromIndex: Int): Int;

    /**
        Gets the element at index n of array. If n is negative, the nth element from the end is returned.

        Returns the nth element of array.
    **/
    public static function nth(array: ArrayType, ?n: Int = 0): Variant;

    /**
        Removes all given values from array using SameValueZero for equality comparisons.

        Note: Unlike _.without, this method mutates array. Use _.remove to remove 
        elements from an array by predicate.
    **/
    public static function pull(array: ArrayType, ?values: ArrayType): ArrayType;

    /**
        This method is like _.pull except that it accepts an array of values to remove.

        Note: Unlike _.difference, this method mutates array.
    **/
    public static function pullAll(array: ArrayType, ?values: ArrayType): ArrayType;

    /**
        This method is like _.pullAll except that it accepts iteratee which is 
        invoked for each element of array and values to generate the criterion by 
        which they're compared. The iteratee is invoked with one argument: (value).

        Note: Unlike _.differenceBy, this method mutates array.
    **/
    public static function pullAllBy(array: ArrayType, values: ArrayType, ?iteratee: Iteratee): ArrayType;

    /**
        This method is like _.pullAll except that it accepts comparator which is 
        invoked to compare elements of array to values. The comparator is invoked 
        with two arguments: (arrVal, othVal).

        Note: Unlike _.differenceWith, this method mutates array.
    **/
    public static function pullAllWith(array: ArrayType, values: ArrayType, ?comparator: Comparator): ArrayType;

    /**
        Removes elements from array corresponding to indexes and returns an array of removed elements.

        Note: Unlike _.at, this method mutates array.

        Returns the new array of removed elements.
    **/
    public static function pullAt(array: ArrayType, indexes: Array<Int>): ArrayType;

    /**
        Removes all elements from array that predicate returns truthy for and 
        returns an array of the removed elements. The predicate is invoked with three arguments: (value, index, array).

        Note: Unlike _.filter, this method mutates array. Use _.pull to pull elements from an array by value.
    **/
    public static function remove(array: ArrayType, ?predicate: Predicate): ArrayType;

    /**
        Reverses array so that the first element becomes the last, the second 
        element becomes the second to last, and so on.

        Note: This method mutates array and is based on Array#reverse.
    **/
    public static function reverse(array: ArrayType): ArrayType;
    /** 
        Creates a slice of array from start up to, but not including, end. 
     **/
    public static function slice(array: ArrayType, ?start: Int =0, ?end: Int): ArrayType;

    /**
        Uses a binary search to determine the lowest index at which value should 
        be inserted into array in order to maintain its sort order.
    **/
    public static function sortedIndex(array: ArrayType, value: Variant): Int;
    /**
        This method is like _.sortedIndex except that it accepts iteratee which 
        is invoked for value and each element of array to compute their sort ranking. 
        The iteratee is invoked with one argument: (value).
    **/
    public static function sortedIndexBy(array: ArrayType, value: Variant, ?iteratee: Iteratee): Int;

    /**
        This method is like _.indexOf except that it performs a binary search on a sorted array.

        Returns the index of the matched value, else -1.
    **/
    public static function sortedIndexOf(array: ArrayType, value: Variant): Int;

    /**
        This method is like _.sortedIndex except that it returns the highest index 
        at which value should be inserted into array in order to maintain its sort order.

        Returns the index at which value should be inserted into array.
    **/
    public static function sortedLastIndex(array: ArrayType, value: Variant): Int;

    /**
        This method is like _.sortedLastIndex except that it accepts iteratee 
        which is invoked for value and each element of array to compute their 
        sort ranking. The iteratee is invoked with one argument: (value).

        Returns the index at which value should be inserted into array.
    **/
    public static function sortedLastIndexBy(array: ArrayType, value: Variant, ?iteratee: Iteratee): Int;

    /**
        This method is like _.lastIndexOf except that it performs a binary search on a sorted array.

        Returns the index of the matched value, else -1.
    **/
    public static function sortedLastIndexOf(array: ArrayType, value: Variant): Int;

    /**
        This method is like _.uniq except that it's designed and optimized for 
        sorted arrays.
    **/
    public static function sortedUniq(array: ArrayType): ArrayType;

    /**
        This method is like _.uniqBy except that it's designed and optimized for 
        sorted arrays.
    **/
    public static function sortedUniqBy(array: ArrayType, ?iteratee: Iteratee): ArrayType;

    /**
        Gets all but the first element of array.
    **/
    public static function tail(array: ArrayType): ArrayType;

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
