
/* Testcases are based on the official Lodash documentation
 * https://lodash.com/docs/4.17.11
 */

package lodash;

import haxe.Json;
import js.jquery.JQuery;
import js.jquery.Event;
import js.html.EventSource;
import lodash.Lo; // to access typedefs
import String;

import QUnit;

@:expose('Main')
class Main {
    // To use _ (underscore) as shorthand notation
    // when binding parameters
    static public var _(get, never) : Dynamic;

    // To use _ (underscore) as shorthand notation
    // when binding parameters
    static public function get__() : Dynamic {
        return Lo.lo();
    }

    static private function var_dump(value: Dynamic) {
        trace(Json.stringify(value));
    }

    static private function assertEqual(actual: Dynamic, expected: Dynamic, text: String): Void {
        QUnit.test(text, function(assert) {
            assert.deepEqual(actual, expected, text);
        });

        /*
        var assert = untyped __js__('console.assert');

        var success = Lo.isEqual(actual, expected);
        assert(success, text + ' (actual: ' + Json.stringify(actual) + ' expected: ' + Json.stringify(expected) + ')');
        if (success) {
            var log = untyped __js__('console.log');
            log(text + ' [ OK ] -> ' + Json.stringify(actual));
        }
        */
    }

    public static function main() {
        trace('See: https://lodash.com/docs/4.17.4');

        assertEqual( Lo.chunk(['a', 'b', 'c', 'd'], 2),
            [['a', 'b'], ['c', 'd']],
            'chunk #1'
        );

        assertEqual( Lo.chunk(['a', 'b', 'c', 'd'], 3),
            [['a', 'b', 'c'], ['d']],
            'chunk #2'
        );

        assertEqual( Lo.compact(Lo.arr([0, 1, false, 2, '', 3])),
            [1, 2, 3],
            'compact'
        );

        assertEqual( Lo.concat(Lo.arr([[1], 2, [3], [[4]] ])),
            [1, 2, 3, [4]],
            'concat'
        );

        assertEqual( Lo.flattenDeep(Lo.arr([1, [2, [3, [4]], 5]])),
            [1, 2, 3, 4, 5],
            'flattenDeep'
        );

        assertEqual( Lo.flatten(Lo.arr([1, [2, [3, [4]], 5]])),
            [1, 2, [3, [4]], 5],
            'flatten'
        );

        assertEqual( Lo.flattenDepth(Lo.arr([1, [2, [3, [4]], 5]]), 1),
            [1, 2, [3, [4]], 5],
            'flattenDepth #1'
        );


        assertEqual( Lo.flattenDepth(Lo.arr([1, [2, [3, [4]], 5]]), 2),
            [1, 2, 3, [4], 5],
            'flattenDepth #2'
        );

        assertEqual( Lo.difference( [[2, 1], [2, 3]] ),
            [1],
            'difference'
        );

        assertEqual( Lo.differenceBy([[2.1, 1.2], [2.3, 3.4]], Math.floor),
            [1.2],
            'differenceBy'
        );

        assertEqual( Lo.differenceBy([[{ 'x': 2 }, { 'x': 1 }], [{ 'x': 1 }]], 'x'),
            [{ 'x': 2 }],
            'differenceBy'
        );

        assertEqual( Lo.differenceWith([[{ 'x': 1, 'y': 2 }, { 'x': 2, 'y': 1 }],  
            [{ 'x': 1, 'y': 2 }]], Lo.isEqual),
            
            [{ 'x': 2, 'y': 1 }],
            'differenceWith'
        );

        assertEqual( Lo.drop([1, 2, 3]),
            [2, 3],
            'drop #1'
        );

        assertEqual( Lo.drop([1, 2, 3], 2),
            [3],
            'drop #2'
        );

        assertEqual( Lo.drop([1, 2, 3], 5),
            [],
            'drop #3'
        );

        assertEqual( Lo.drop([1, 2, 3], 0),
            [1, 2, 3],
            'drop #4'
        );

        assertEqual( Lo.dropRight([1, 2, 3]),
            [1, 2],
            'dropRight #1'
        );

        assertEqual( Lo.dropRight([1, 2, 3], 2),
            [1],
            'dropRight #2'
        );

        assertEqual( Lo.dropRight([1, 2, 3], 5),
            [],
            'dropRight #3'
        );

        assertEqual( Lo.dropRight([1, 2, 3], 0),
            [1, 2, 3],
            'dropRight #4'
        );

        var users = [
          { 'user': 'barney',  'active': true },
          { 'user': 'fred',    'active': false },
          { 'user': 'pebbles', 'active': false }
        ];

        assertEqual( Lo.dropRightWhile(users, function(o) { return !o.active; }),
            [{"user":"barney","active":true}],
            'dropRightWhile #1'
        );

        assertEqual( Lo.dropRightWhile(users, { 'user': 'pebbles', 'active': false }),
            [{"user":"barney","active":true},
             {"user":"fred","active":false}],
            'dropRightWhile #2'
        );

        assertEqual( Lo.dropRightWhile(users, Lo.arr(['active', false])),
            [{"user":"barney","active":true}],
            'dropRightWhile #3'
        );

        assertEqual( Lo.dropRightWhile(users, 'active'),
            users,
            'dropRightWhile #4'
        );

        //
        // dropWhile
        //
        users = [
          { 'user': 'barney',  'active': false },
          { 'user': 'fred',    'active': false },
          { 'user': 'pebbles', 'active': true }
        ];

        assertEqual( Lo.dropWhile(users, function(o) { return !o.active; }),
            // => objects for ['pebbles']
            [{ 'user': 'pebbles', 'active': true }],
            'dropWhile #1'
        );

        assertEqual( Lo.dropWhile(users, { 'user': 'barney', 'active': false }),
            // => objects for ['fred', 'pebbles']
            [{"user":"fred","active":false},{"user":"pebbles","active":true}],
            'dropWhile #2'
        );

        assertEqual( Lo.dropWhile(users, Lo.arr(['active', false])),
            // => objects for ['pebbles']
            [{"user":"pebbles","active":true}],
            'dropWhile #3'
        );

        assertEqual( Lo.dropWhile(users, 'active'),
            // => objects for ['barney', 'fred', 'pebbles']
            users,
            'dropWhile #4'
        );

        var array = [1, 2, 3];

        assertEqual( Lo.fill(array, 'a'),
            ['a', 'a', 'a'],
            'fill #1'
        );

        assertEqual( Lo.fill(Lo.newEmptyArray(3), 2),
            [2, 2, 2],
            'fill #2'
        );

        assertEqual( Lo.fill( [4, 6, 8, 10], '*', 1, 3 ),
            [4, '*', '*', 10],
            'fill #3'
        );

        //
        // findIndex
        //

        users = [
            { 'user': 'barney',  'active': false },
            { 'user': 'fred',    'active': false },
            { 'user': 'pebbles', 'active': true }
        ];

        assertEqual( Lo.findIndex(users, function(o) { return o.user == 'barney'; }),
            0,
            'findIndex #1'
        );

        assertEqual( Lo.findIndex(users, { 'user': 'fred', 'active': false }),
            1,
            'findIndex #2'
        );

        assertEqual( Lo.findIndex(users, Lo.arr(['active', false])),
            0,
            'findIndex #3'
        );

        assertEqual( Lo.findIndex(users, 'active'),
            2,
            'findIndex #4'
        );

        //
        // findLastIndex
        //
        users = [
            { 'user': 'barney',  'active': true },
            { 'user': 'fred',    'active': false },
            { 'user': 'pebbles', 'active': false }
        ];

        assertEqual( Lo.findLastIndex(users, function(o) { return o.user == 'pebbles'; }),
            2,
            'findLastIndex #1'
        );

        assertEqual( Lo.findLastIndex(users, { 'user': 'barney', 'active': true }),
            0,
            'findLastIndex #2'
        );

        assertEqual( Lo.findLastIndex(users, Lo.arr(['active', false])),
            2,
            'findLastIndex #3'
        );

        assertEqual( Lo.findLastIndex(users, 'active'),
            0,
            'findLastIndex #4'
        );

        assertEqual( Lo.fromPairs( [ Lo.arr(['a', 1]), Lo.arr(['b', 2])] ),
            { 'a': 1, 'b': 2 },
            'fromPairs'
        );

        assertEqual( Lo.indexOf([1, 2, 1, 2], 2),
            1,
            'indexOf #1'
        );

        assertEqual( Lo.indexOf([1, 2, 1, 2], 2, 2),
            3,
            'indexOf #2'
        );

        assertEqual( Lo.initial([1, 2, 3]),
            [1, 2],
            'initial'
        );

        assertEqual( Lo.intersection([ [2, 1], [2, 3] ]),
            [2],
            'intersection'
        );

        assertEqual( Lo.intersectionBy([ [2.1, 1.2], [2.3, 3.4] ], Math.floor),
            [2.1],
            'intersectionBy #1'
        );

        assertEqual( Lo.intersectionBy([ [{ 'x': 1 }], [{ 'x': 2 }, { 'x': 1 }] ], 'x'),
            [{ 'x': 1 }],
            'intersectionBy #2'
        );

        var objects: Array<Dynamic> = [{ 'x': 1, 'y': 2 }, { 'x': 2, 'y': 1 }];
        var others = [{ 'x': 1, 'y': 1 }, { 'x': 1, 'y': 2 }];

        assertEqual( Lo.intersectionWith([objects, others], Lo.isEqual),
            [{ 'x': 1, 'y': 2 }],
            'intersectionWith #1'
        );

        assertEqual( Lo.join(['a', 'b', 'c'], '~'),
            'a~b~c',
            'join'
        );

        assertEqual( Lo.last([1, 2, 3]),
            3,
            'last'
        );

        assertEqual( Lo.lastIndexOf([1, 2, 1, 2], 2),
            3,
            'lastIndexOf #1'
        );

        assertEqual( Lo.lastIndexOf([1, 2, 1, 2], 2, 2),
            1,
            'lastIndexOf #2'
        );

        var array = ['a', 'b', 'c', 'd'];
        assertEqual( Lo.nth(array, 1),
            'b',
            'nth #1'
        );

        assertEqual( Lo.nth(array, -2),
            'c',
            'nth #2'
        );

        assertEqual( Lo.head([1, 2, 3]),
            1,
            'head #1'
        );

        assertEqual( Lo.head([]),
            Lo.undefined,
            'head #2'
        );

        var array: Array<Dynamic> = ['a', 'b', 'c', 'a', 'b', 'c'];
        assertEqual( Lo.pull(array, ['a', 'c']),
            ['b', 'b'],
            'pull'
        );

        array = ['a', 'b', 'c', 'a', 'b', 'c'];
        assertEqual( Lo.pullAll(array, ['a', 'c']),
            ['b', 'b'],
            'pullAll'
        );

        array = [{ 'x': 1 }, { 'x': 2 }, { 'x': 3 }, { 'x': 1 }];
        assertEqual( Lo.pullAllBy(array, [{ 'x': 1 }, { 'x': 3 }], 'x'),
            [{ 'x': 2 }],
            'pullAllBy'
        );

        array = [{ 'x': 1, 'y': 2 }, { 'x': 3, 'y': 4 }, { 'x': 5, 'y': 6 }];
        assertEqual(
            Lo.pullAllWith(array, [{ 'x': 3, 'y': 4 }], Lo.isEqual),
            [{ 'x': 1, 'y': 2 }, { 'x': 5, 'y': 6 }],
            'pullAllWith #1'
        );
        assertEqual(array, [{ 'x': 1, 'y': 2 }, { 'x': 5, 'y': 6 }], 
            'pullAllWith: #2');

        array = ['a', 'b', 'c', 'd'];
        assertEqual( Lo.pullAt(array, [1, 3]), ['b', 'd'], 'pullAt #1');
        assertEqual(array, ['a', 'c'], 'pullAt #2 side-effect');

        array = [1, 2, 3, 4];
        assertEqual( Lo.remove(array, function(n) {
            return n % 2 == 0;
        }), [2, 4], 'remove #1');
        assertEqual(array, [1, 3], 'remove #2 side-effect');

        array = [1, 2, 3];
        assertEqual( Lo.reverse(array), [3, 2, 1], 'reverse #1');
        assertEqual(array, [3, 2, 1], 'reverse #2 side-effect');

        var fruits = ['Banana', 'Orange', 'Lemon', 'Apple', 'Mango'];
        assertEqual( Lo.slice(fruits, 1, 3),
            ['Orange','Lemon'],
            'slice'
        );

        assertEqual( Lo.sortedIndex([30, 50], 40),
            1,
            'sortedIndex'
        );

        objects = [{ 'x': 4 }, { 'x': 5 }]; 
        assertEqual( Lo.sortedIndexBy(objects, { 'x': 4 }, function(o) { return o.x; }),
            0,
            'sortedIndexBy #1'
        );

        assertEqual( Lo.sortedIndexBy(objects, { 'x': 4 }, 'x'),
            0,
            'sortedIndexBy #2'
        );

        assertEqual( Lo.sortedIndexOf([4, 5, 5, 5, 6], 5),
            1,
            'sortedIndexOf'
        );

        assertEqual( Lo.sortedLastIndex([4, 5, 5, 5, 6], 5),
            4,
            'sortedLastIndex'
        );

        objects = [{ 'x': 4 }, { 'x': 5 }];
        assertEqual( Lo.sortedLastIndexBy(objects, { 'x': 4 }, function(o) { return o.x; }),
            1,
            'sortedLastIndexBy #1'
        );

        assertEqual( Lo.sortedLastIndexBy(objects, { 'x': 4 }, 'x'),
            1,
            'sortedLastIndexBy #2'
        );

        assertEqual( Lo.sortedLastIndexOf([4, 5, 5, 5, 6], 5),
            3,
            'sortedLastIndexOf'
        );

        assertEqual(
            Lo.sortedUniq([1, 1, 2]),
            [1, 2],
            'sortedUniq'
        );

        assertEqual(
            Lo.sortedUniqBy([1.1, 1.2, 2.3, 2.4], Math.floor),
            [1.1, 2.3],
            'sortedUniqBy'
        );

        assertEqual(
            Lo.tail([1, 2, 3]),
            [2, 3],
            'tail'
        );

        assertEqual( Lo.take([1, 2, 3]), [1], 'take #1');
        assertEqual( Lo.take([1, 2, 3], 2), [1, 2], 'take #2');
        assertEqual( Lo.take([1, 2, 3], 5), [1, 2, 3], 'take #3');
        assertEqual( Lo.take([1, 2, 3], 0), [], 'take #4');

        assertEqual( Lo.takeRight([1, 2, 3]), [3], 'takeRight #1');
        assertEqual( Lo.takeRight([1, 2, 3], 2), [2, 3], 'takeRight #2');
        assertEqual( Lo.takeRight([1, 2, 3], 5), [1, 2, 3], 'takeRight #3');
        assertEqual( Lo.takeRight([1, 2, 3], 0), [], 'takeRight #4');

        users = [
          { 'user': 'barney',  'active': true },
          { 'user': 'fred',    'active': false },
          { 'user': 'pebbles', 'active': false }
        ];

        assertEqual(
            Lo.takeRightWhile(users, function(o) { return !o.active; }),
            [{ 'user': 'fred',    'active': false },
             { 'user': 'pebbles', 'active': false }],

            'takeRightWhile #1'
        );

        assertEqual(
            Lo.takeRightWhile(users, { 'user': 'pebbles', 'active': false }),
            [{ 'user': 'pebbles', 'active': false }],
            'takeRightWhile #2'
        );

        assertEqual(
            Lo.takeRightWhile(users, Lo.arr(['active', false])),
            [{ 'user': 'fred',    'active': false },
             { 'user': 'pebbles', 'active': false }],
            'takeRightWhile #3'
        );

        assertEqual(
            Lo.takeRightWhile(users, 'active'),
            [],
            'takeRightWhile #4'
        );

        users = [
          { 'user': 'barney',  'active': false },
          { 'user': 'fred',    'active': false },
          { 'user': 'pebbles', 'active': true }
        ];

        assertEqual(
            Lo.takeWhile(users, function(o) { return !o.active; }),
            [{ 'user': 'barney',  'active': false },
             { 'user': 'fred',    'active': false }],
            'takeWhile #1'
        );

        assertEqual(
            Lo.takeWhile(users, { 'user': 'barney', 'active': false }),
            [{ 'user': 'barney',  'active': false }],
            'takeWhile #2'
        );

        assertEqual(
            Lo.takeWhile(users, Lo.arr(['active', false])),
            [{ 'user': 'barney',  'active': false },
             { 'user': 'fred',    'active': false }],
            'takeWhile #3'
        );

        assertEqual( Lo.takeWhile(users, 'active'), [], 'takeWhile #4');

        assertEqual( Lo.union([ [2], [1, 2] ]), [2, 1], 'union');

        assertEqual( Lo.unionBy([ [2.1], [1.2, 2.3] ], Math.floor),
            [2.1, 1.2],
            'unionBy #1'
        );

        assertEqual(
            Lo.unionBy([ [{ 'x': 1 }], [{ 'x': 2 }, { 'x': 1 }] ], 'x'),
            [{ 'x': 1 }, { 'x': 2 }],
            'unionBy #2'
        );

        objects = [{ 'x': 1, 'y': 2 }, { 'x': 2, 'y': 1 }];
        others = [{ 'x': 1, 'y': 1 }, { 'x': 1, 'y': 2 }];

        assertEqual(
            Lo.unionWith([objects, others], Lo.isEqual),
            [{ 'x': 1, 'y': 2 }, { 'x': 2, 'y': 1 }, { 'x': 1, 'y': 1 }],
            'unionWith'
        );

        assertEqual(Lo.uniq([2, 1, 2]), [2, 1], 'uniq');
        assertEqual(Lo.uniqBy([2.1, 1.2, 2.3], Math.floor), [2.1, 1.2], 'uniqBy #1');
        assertEqual(
            Lo.uniqBy([{ 'x': 1 }, { 'x': 2 }, { 'x': 1 }], 'x'),
            [{ 'x': 1 }, { 'x': 2 }],
            'uniqBy #2'
        );

        var objects = [{ 'x': 1, 'y': 2 }, { 'x': 2, 'y': 1 }, { 'x': 1, 'y': 2 }];

        assertEqual(Lo.uniqWith(objects, Lo.isEqual),
            [{ 'x': 1, 'y': 2 }, { 'x': 2, 'y': 1 }],
            'uniqWith');

        var zipped = Lo.zip([['a', 'b'], [1, 2], [true, false]]);
        assertEqual(zipped, [['a', 1, true], ['b', 2, false]], 'zip');

        assertEqual(Lo.unzip(zipped), [['a', 'b'], [1, 2], [true, false]], 'unzip');

        var zipped = Lo.zip([[1, 2], [10, 20], [100, 200]]);
        assertEqual(Lo.unzipWith(zipped, LoMath.add), 
            [3, 30, 300], 'unzipWith');

        var v: Array<Dynamic> = [[2, 1, 2, 3], 1, 2];
        assertEqual(Lo.without(v), [3], 'without');

        assertEqual(Lo.xor([[2, 1], [2, 3]]), [1, 3], 'xor');

        assertEqual(Lo.xorBy([[2.1, 1.2], [2.3, 3.4]], Math.floor),
            [1.2, 3.4],
            'xorBy');

        // The `_.property` iteratee shorthand.
        assertEqual( Lo.xorBy([[{ 'x': 1 }], [{ 'x': 2 }, { 'x': 1 }]], 'x'),
            [{ 'x': 2 }], 'xorBy');

        var objects = [{ 'x': 1, 'y': 2 }, { 'x': 2, 'y': 1 }];
        var others = [{ 'x': 1, 'y': 1 }, { 'x': 1, 'y': 2 }];

        assertEqual(Lo.xorWith([objects, others], Lo.isEqual),
            [{ 'x': 2, 'y': 1 }, { 'x': 1, 'y': 1 }],
            'xorWith');

        assertEqual(Lo.zipObject(['a', 'b'], [1, 2]),
            { 'a': 1, 'b': 2 }, 'zipObject');

        var de: Array<Dynamic> = [{ 'c': 1 }, { 'd': 2 }];
        assertEqual(
                Lo.zipObjectDeep(['a.b[0].c', 'a.b[1].d'], [1, 2]),
                { 'a': { 'b': de } },
                'zipObjectDeep'
            );

        assertEqual(
                Lo.zipWith([[1, 2], [10, 20], [100, 200]], function(a, b, c) {
                    return a + b + c;
                }), 
                [111, 222], 
                'zipWith'
            );

        assertEqual(Lo.countBy([6.1, 4.2, 6.3], Math.floor),
            { '4': 1, '6': 2 }, 'countBy #1');

        // The `_.property` iteratee shorthand.
        assertEqual(
            Lo.countBy(['one', 'two', 'three'], 'length'),
            { '3': 2, '5': 1 },
            'countBy #2'
        );

        var values = [];
        Lo.forEach([1, 2], function(value) {
            values.push(value);
        });
        assertEqual(values, [1, 2], 'forEach #1');

        values = [];
        Lo.forEach({ 'a': 1, 'b': 2 }, function(value, key) {
            values.push([key, value]);
        });
        assertEqual(values, [['a',1],['b',2]], 'forEach #2');

        values = [];
        Lo.forEachRight([1, 2], function(value) {
            values.push(value);
        });

        assertEqual([2, 1], values, 'forEachRight');

        var a: Array<Dynamic> = [true, 1, null, 'yes'];
        assertEqual(Lo.every(a, Lo.Boolean ), false, 'every');


        var users = [
            { 'user': 'barney', 'age': 36, 'active': false },
            { 'user': 'fred',   'age': 40, 'active': false }
        ];

        // The `_.matches` iteratee shorthand.
        assertEqual(Lo.every(users, { 'user': 'barney', 'active': false }),
            false, 'every #1'
        );

        // The `_.matchesProperty` iteratee shorthand.
        var a: Array<Dynamic> = ['active', false];
        assertEqual(Lo.every(users, a),
            true, 'every #2'
        );
 
        // The `_.property` iteratee shorthand.
        assertEqual(Lo.every(users, 'active'),
            false, 'every #3');

        var users = [
          { 'user': 'barney', 'age': 36, 'active': true },
          { 'user': 'fred',   'age': 40, 'active': false }
        ];

        assertEqual(Lo.filter(users, function(o) { return !o.active; }),
            [{ 'user': 'fred',   'age': 40, 'active': false }], 'filter #1');

        // The `_.matches` iteratee shorthand.
        assertEqual(Lo.filter(users, { 'age': 36, 'active': true }),
            [{ 'user': 'barney', 'age': 36, 'active': true }], 'filter #2');

        // The `_.matchesProperty` iteratee shorthand.
        var a: Array<Dynamic> = ['active', false];
        assertEqual(Lo.filter(users, a),
            [{ 'user': 'fred',   'age': 40, 'active': false }], 'filter #3');

        // The `_.property` iteratee shorthand.
        assertEqual(Lo.filter(users, 'active'),
            [{ 'user': 'barney', 'age': 36, 'active': true }], 'filter #4');

        var users = [
          { 'user': 'barney',  'age': 36, 'active': true },
          { 'user': 'fred',    'age': 40, 'active': false },
          { 'user': 'pebbles', 'age': 1,  'active': true }
        ];

        assertEqual(Lo.find(users, function(o) { return o.age < 40; }),
           { 'user': 'barney',  'age': 36, 'active': true }, 'find #1');

        // The `_.matches` iteratee shorthand.
        assertEqual(Lo.find(users, { 'age': 1, 'active': true }),
            { 'user': 'pebbles', 'age': 1,  'active': true }, 'find #2');

        // The `_.matchesProperty` iteratee shorthand.
        var a: Array<Dynamic> = ['active', false];
        assertEqual(Lo.find(users, a),
            { 'user': 'fred',    'age': 40, 'active': false }, 'find #3');

        // The `_.property` iteratee shorthand.
        assertEqual(Lo.find(users, 'active'),
            { 'user': 'barney',  'age': 36, 'active': true }, 'find #4');

        assertEqual(Lo.findLast([1, 2, 3, 4], function(n) {
            return n % 2 == 1;
        }), 3, 'findLast');

        assertEqual(Lo.flatMap([1, 2], function (n) { return [n, n]; }),
            [1, 1, 2, 2], 'flatMap');

        assertEqual(Lo.flatMapDeep([1, 2], function (n) { return [[[n, n]]]; }),
            [1, 1, 2, 2], 'flatMapDeep');

        var array: Array<Dynamic> = [1, [2, [3, [4]], 5]];

        assertEqual(Lo.flattenDepth(array, 1),
            [1, 2, [3, [4]], 5], 'flattenDepth #1');

        assertEqual(Lo.flattenDepth(array, 2),
            [1, 2, 3, [4], 5], 'flattenDepth #2');

        assertEqual(Lo.groupBy([6.1, 4.2, 6.3], Math.floor),
            { '4': [4.2], '6': [6.1, 6.3] }, 'groupBy #1');

        // The `_.property` iteratee shorthand.
        assertEqual(Lo.groupBy(['one', 'two', 'three'], 'length'),
            { '3': ['one', 'two'], '5': ['three'] }, 'groupBy #2');

        assertEqual(Lo.includes([1, 2, 3], 1), true, 'includes #1');
        assertEqual(Lo.includes([1, 2, 3], 1, 2), false, 'includes #2');
        assertEqual(Lo.includes({ 'a': 1, 'b': 2 }, 1), true, 'includes #3');
        assertEqual(Lo.includes('abcd', 'bc'), true, 'includes #4');

        assertEqual(Lo.invokeMap([[5, 1, 7], [3, 2, 1]], 'sort'),
            [[1, 5, 7], [1, 2, 3]], 'invokeMap #1');

        assertEqual(Lo.invokeMap([123, 456], Lo.prototype(String, 'split'), ''),
            [['1', '2', '3'], ['4', '5', '6']], 'invokeMap #2');

        var array = [
          { 'dir': 'left', 'code': 97 },
          { 'dir': 'right', 'code': 100 }
        ];

        assertEqual(Lo.keyBy(array, function(o) {
            return String.fromCharCode(o.code);
        }), { 'a': { 'dir': 'left', 'code': 97 }, 'd': { 'dir': 'right', 'code': 100 } },
        'keyBy #1');

        assertEqual(Lo.keyBy(array, 'dir'),
            { 'left': { 'dir': 'left', 'code': 97 }, 'right': { 'dir': 'right', 'code': 100 } },
            'keyBy #2');


        function square(n) {
            return n * n;
        }

        assertEqual(Lo.map([4, 8], square), [16, 64], 'map #1');
        assertEqual(Lo.map({ 'a': 4, 'b': 8 }, square), [16, 64], 'map #2');

        var users = [
            { 'user': 'barney' },
            { 'user': 'fred' }
        ];

        // The `_.property` iteratee shorthand.
        assertEqual(Lo.map(users, 'user'),
            ['barney', 'fred'], 'map #3');


        var users = [
            { 'user': 'fred',   'age': 48 },
            { 'user': 'barney', 'age': 34 },
            { 'user': 'fred',   'age': 40 },
            { 'user': 'barney', 'age': 36 }
        ];

        // Sort by `user` in ascending order and by `age` in descending order.
        assertEqual(Lo.orderBy(users, ['user', 'age'], ['asc', 'desc']),[
                {"user":"barney","age":36},
                {"user":"barney","age":34},
                {"user":"fred","age":48},
                {"user":"fred","age":40}
            ], 'orderBy');

        var users = [
            { 'user': 'barney',  'age': 36, 'active': false },
            { 'user': 'fred',    'age': 40, 'active': true },
            { 'user': 'pebbles', 'age': 1,  'active': false }
        ];

        var partition1 = [{"user":"fred","age":40,"active":true}];
        var partition2 = [{"user":"barney","age":36,"active":false},
             {"user":"pebbles","age":1,"active":false}];
        assertEqual(Lo.partition(users, function(o) { return o.active; }),
             [partition1, partition2], 'partition #1');


        // The `_.matches` iteratee shorthand.
        partition1 = [{"user":"pebbles","age":1,"active":false}];
        partition2 = [{"user":"barney","age":36,"active":false},
             {"user":"fred","age":40,"active":true}];
        assertEqual(Lo.partition(users, { 'age': 1, 'active': false }), 
             [partition1, partition2], 'partition #2');

        // The `_.matchesProperty` iteratee shorthand.
        var a: Array<Dynamic> = ['active', false];
        partition1 = [
            { 'user': 'barney',  'age': 36, 'active': false },
            { 'user': 'pebbles', 'age': 1,  'active': false }
        ];
        partition2 = [{ 'user': 'fred',    'age': 40, 'active': true }];
        assertEqual(Lo.partition(users, a), [partition1, partition2], 'partition #3');

        // The `_.property` iteratee shorthand.
        partition1 = [{ 'user': 'fred',    'age': 40, 'active': true }];
        partition2 = [{ 'user': 'barney',  'age': 36, 'active': false },
            { 'user': 'pebbles', 'age': 1,  'active': false }
        ];
        assertEqual(Lo.partition(users, 'active'),
            [partition1, partition2], 'partition #4');

        assertEqual(Lo.reduce([1, 2], function(sum, n) {
            return sum + n;
        }, 0), 3, 'reduce #1');


        assertEqual(Lo.reduce({ 'a': 1, 'b': 2, 'c': 1 }, function(result, value, key) {
            if (null == result[value]) {
                result[value] = [];
            }
            result[value].push(key);
            return result;
        }, {}), { '1': ['a', 'c'], '2': ['b'] }, 'reduce #2');


        var array = [[0, 1], [2, 3], [4, 5]];

        assertEqual(Lo.reduceRight(array, function(flattened, other) {
            return flattened.concat(other);
        }, []), [4, 5, 2, 3, 0, 1], 'reduceRight #1');

        var users = [
            { 'user': 'barney', 'age': 36, 'active': false },
            { 'user': 'fred',   'age': 40, 'active': true }
        ];

        assertEqual(Lo.reject(users, function(o) { return !o.active; }),
            [{ 'user': 'fred',   'age': 40, 'active': true }], 'reject #1');


        // The `_.matches` iteratee shorthand.
        assertEqual(Lo.reject(users, { 'age': 40, 'active': true }),
            [{ 'user': 'barney', 'age': 36, 'active': false }], 'reject #2');

        // The `_.matchesProperty` iteratee shorthand.
        var a: Array<Dynamic> = ['active', false];
        assertEqual(Lo.reject(users, a),
            [{ 'user': 'fred',   'age': 40, 'active': true }], 'reject #3');

        // The `_.property` iteratee shorthand.
        assertEqual(Lo.reject(users, 'active'),
            [{ 'user': 'barney', 'age': 36, 'active': false }], 'reject #4');

        var s = Lo.sample([1, 2, 3, 4]);
        assertEqual((s >= 1 && s <= 4) ? s : 0, s, 'sample');

        var s = Lo.sampleSize([1, 2, 3], 2);
        assertEqual((2 == s.length) ? s : 0, s, 'sampleSize #1');

        var s = Lo.sampleSize([1, 2, 3], 4);
        assertEqual((3 == s.length) ? s : 0, s, 'sampleSize #2');

        var s = Lo.shuffle([1, 2, 3, 4]);
        assertEqual((4 == s.length) ? s : 0, s, 'shuffle');

        assertEqual(Lo.size([1, 2, 3]), 3, 'size #1');
        assertEqual(Lo.size({ 'a': 1, 'b': 2 }), 2, 'size #2');
        assertEqual(Lo.size('pebbles'), 7, 'size #3');

        var a: Array<Dynamic> = [null, 0, 'yes', false];
        assertEqual(Lo.some(a, Lo.Boolean), true, 'some #1');

        var users = [
            { 'user': 'barney', 'active': true },
            { 'user': 'fred',   'active': false }
        ];

        // The `_.matches` iteratee shorthand.
        assertEqual(Lo.some(users, { 'user': 'barney', 'active': false }), false, 'some #2');

        // The `_.matchesProperty` iteratee shorthand.
        var a: Array<Dynamic> = ['active', false];
        assertEqual(Lo.some(users, a), true, 'some #3');

        // The `_.property` iteratee shorthand.
        assertEqual(Lo.some(users, 'active'), true, 'some #4');

        var users = [
            { 'user': 'fred',   'age': 48 },
            { 'user': 'barney', 'age': 36 },
            { 'user': 'fred',   'age': 40 },
            { 'user': 'barney', 'age': 34 }
        ];

        assertEqual(Lo.sortBy(users, [function(o) { return o.user; }]), 
            [{ 'user': 'barney', 'age': 36 },
             { 'user': 'barney', 'age': 34 },
             { 'user': 'fred',   'age': 48 },
             { 'user': 'fred',   'age': 40 },
            ], 'sortBy #1');

        assertEqual(Lo.sortBy(users, ['user', 'age']),
            [{ 'user': 'barney', 'age': 34 },
             { 'user': 'barney', 'age': 36 },
             { 'user': 'fred',   'age': 40 },
             { 'user': 'fred',   'age': 48 },
            ], 'sortBy #2');

        var saves = ['profile', 'settings'];

        var counter = 0;
        var done = Lo.after(saves.length, function() {
            assertEqual(saves.length, counter, 'after');
        });

        Lo.forEach(saves, function() {
            counter++;
            done();
        });
        assertEqual(Lo.map(['6', '8', '10'], Lo.ary(Std.parseInt, 1)), [6, 8, 10], 'ary');


        var counter = 0;
        var done2 = Lo.before(5, function() {
            counter++;
            assertEqual((counter > 0 && counter < 5) ? counter : 0, counter, 'before #'+counter);
        });
        Lo.forEach([1, 2, 3, 4, 5], function() {
            done2();
        });

        function greet(self, greeting, punctuation) {
            return greeting + ' ' + self.user + punctuation;
        }
        var object = { user: 'fred' };

        var bound = Lo.bind(greet, object, ['hi']);
        assertEqual(bound('!'), 'hi fred!', 'bind #1');
 
        // Bound with placeholders.
        var bound = Lo.bind(greet, object, [Lo.lo(), '!']);
        assertEqual(bound('hi'), 'hi fred!', 'bind #2');

        // Testing bindKey

        var object = {
            user: 'fred',
            greet: function(self, greeting, punctuation) {
                return greeting + ' ' + self.user + punctuation;
            }
        };
         
        var bound = Lo.bindKey(object, 'greet', ['hi']);
        assertEqual(bound('!'), 'hi fred!', 'bindKey #1');

        object.greet = function(self, greeting, punctuation) {
            return greeting + 'ya ' + self.user + punctuation;
        };
        assertEqual(bound('!'), 'hiya fred!', 'bindKey #2');

        // Bound with placeholders.
        var bound = Lo.bindKey(object, 'greet', [Lo.lo(), '!']);
        assertEqual(bound('hi'), 'hiya fred!', 'bindKey #3');

        var abc = function(a, b, c) {
            return [a, b, c];
        };

        var curried = Lo.curry(abc);

        assertEqual(curried(1)(2)(3), [1, 2, 3], 'curry #1');
        assertEqual(curried(1, 2)(3), [1, 2, 3], 'curry #2');
        assertEqual(curried(1, 2, 3), [1, 2, 3], 'curry #3');

        // Curried with placeholders.
        assertEqual(curried(1)(Lo.lo(), 3)(2), [1, 2, 3], 'curry #4');

        var abc = function(a, b, c) { return [a, b, c]; };
        var curried = Lo.curryRight(abc);
 
        assertEqual(curried(3)(2)(1), [1, 2, 3], 'curryRight #1');
        assertEqual(curried(2, 3)(1), [1, 2, 3], 'curryRight #2');
        assertEqual(curried(1, 2, 3), [1, 2, 3], 'curryRight #3');

        // Curried with placeholders.
        assertEqual(curried(3)(1, Lo.lo())(2), [1, 2, 3], 'curryRight #4');

        function calculateLayout(event: Event): Void {

        }

        function sendMail(event: Event): Void {

        }

        function batchLog() {

        }

        // Avoid costly calculations while the window size is in flux.
        new JQuery(js.Browser.window).on('resize', Lo.debounce(calculateLayout, 150));

        // Invoke `sendMail` when clicked, debouncing subsequent calls.
        new JQuery( js.Browser.document.body ).on('click', Lo.debounce(sendMail, 300, {
            'leading': true,
            'trailing': false
        }));
 
        // Ensure `batchLog` is invoked once after 1 second of debounced calls.
        var debounced = Lo.debounce(batchLog, 250, { maxWait: 1000 });
 
        // Cancel the trailing debounced invocation.
        new JQuery(js.Browser.window).on('popstate', debounced.cancel);

        Lo.defer(function(text: String) {
            assertEqual(0, 0, text);
        }, ['deferred']);

        Lo.delay(function(text) {
            assertEqual(0, 0, text);
        }, 1, ['later']);


        var flipped = Lo.flip(function() : ArrayType {
            return Lo.toArray(Lo.arguments);
        });
        assertEqual(flipped('a', 'b', 'c', 'd'), ['d', 'c', 'b', 'a'], 'flip');

        var object : Dynamic = { 'a': 1, 'b': 2 };
        var other : Dynamic = { 'c': 3, 'd': 4 };
         
        var values : Dynamic = Lo.memoize(Lo.values);
        assertEqual(values(object), [1, 2], 'memoize #1');
        assertEqual(values(other), [3, 4], 'memoize #2');

        object.a = 2;
        assertEqual(values(object), [1, 2], 'memoize #3');
         
        // Modify the result cache.
        values.cache.set(object, ['a', 'b']);
        assertEqual(values(object), ['a', 'b'], 'values.cache.set');

        // Replace `_.memoize.Cache`.
        Lo.memoize.Cache = untyped __js__('WeakMap');
        assertEqual(Lo.memoize.Cache, untyped __js__('WeakMap'), 'WeakMap');

        function isEven(n) {
            return n % 2 == 0;
        }

        assertEqual(Lo.filter([1, 2, 3, 4, 5, 6], Lo.negate(isEven)), [1, 3, 5], 'negate');

        var counter = 0;
        function createApplication() {
            counter ++;
        }

        var initialize = Lo.once(createApplication);
        initialize();
        initialize();
        assertEqual(counter, 1, 'once');


        function doubled(n) {
            return n * 2;
        }

        function square(n) {
            return n * n;
        }

        var func = Lo.overArgs(function(x, y) {
            return [x, y];
        }, [square, doubled]);

        assertEqual(func(9, 3), [81, 6], 'overArgs #1');
        assertEqual(func(10, 5), [100, 10], 'overArgs #2');

        // partial

        var greet = function (greeting, name) {
            return greeting + ' ' + name;
        };

        var sayHelloTo = Lo.partial(greet, ['hello']);
        assertEqual(sayHelloTo('fred'), 'hello fred', 'partial #1');
 
        // Partially applied with placeholders.
        var greetFred = Lo.partial(greet, [_, 'fred']);
        assertEqual(greetFred('hi'), 'hi fred', 'partial #2');


        // partialRight

        greetFred = Lo.partialRight(greet, ['fred']);
        assertEqual(greetFred('hi'), 'hi fred', 'partialRight #1');

        // Partially applied with placeholders.
        var sayHelloTo = Lo.partialRight(greet, ['hello', _]);
        assertEqual(sayHelloTo('fred'), 'hello fred', 'partialRight #2');

        var rearged = Lo.rearg(function(a, b, c) {
            return [a, b, c];
        }, [2, 0, 1]);

        assertEqual(rearged('b', 'c', 'a'), ['a', 'b', 'c'], 'rearg');
    }
}
