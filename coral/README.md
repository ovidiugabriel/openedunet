# Coral

A beautiful yet efficient language.

| Keyword | Description                    |
|---------|--------------------------------|
| `id`    | acts as `Identity` function  |
| `val`   | declares an immutable variable |

##### Features

* strong flavor of [expression orientation](http://en.wikipedia.org/wiki/Expression-oriented_programming_language) ; support for [homoiconic](http://en.wikipedia.org/wiki/Homoiconicity) metaprogramming
* support for [functional](http://en.wikipedia.org/wiki/Functional_programming) and [reactive](http://en.wikipedia.org/wiki/Reactive_programming) (type of [event driven](http://en.wikipedia.org/wiki/Event-driven_programming) programming)
* functions are first-class values; [higher-order functions](http://en.wikipedia.org/wiki/Higher-order_function) type support
* lazy evaluation (delayed assignment by means of automatic thunking)
* automatic memoization
* literals inlining; macro inlining; AST- macro (template) based metaprogramming

```
main: int -> char const*[] -> int = (argc, argv) -> 0
```

```c++
int main(int argc, char const *argv[]) { return 0; }
```


###### Delayed Assignment Operator

```
x := 0
```

This is basically automatic [thunking](http://en.wikipedia.org/wiki/Thunk). You can achieve the same thing by doing:

```
x := -> 0
```
If you are coming from JavaScript (or Python) you maybe know that a function is a type of value which is assigned to a variable, and that's why a function can be redefined at any given time.

This is not possible in Coral, here functions are first class citizens and all variables are functions (except immediate assigned values, which are however immutable), and because of automatic thunking in case of variable lazy assignment we can ensure that `x` becomes immutable.

If you wish, this can be translated to JavaScript:

```javascript
var x;

x = function() {
  return 0;
};
```

This is opposite of what we are used with in procedural / object-oriented programming.
Usually you try to store the result of a function into a variable in order to avoid repeated calls to the same function with the same parameters. 

In functional paradigm we have [memoization](http://en.wikipedia.org/wiki/Memoization) for that.

###### Automatic Memoization

That is, for example a given function `mul2`:

```
mul2 := (a, b) -> a * b
```
will be automatically memoized (using the `defaultCache`) as:

```javascript
var mul2 = function(a, b) { 
  return memoize(function(p) { return p[0]*p[1]; }, defaultCache)(Array.slice(arguments));  
};
```

Note that only pure functions can be memoized, because they have [Referential transparency](http://en.wikipedia.org/wiki/Referential_transparency_%28computer_science%29) 

###### Immediate Values Assignment

This is possible only with literals or other immutable values as **right value** and the immutable value once assigned cannot be changed anymore. If the value is a literal, all occurences of the variable will be inlined.

Note that there is no assignment operator used between `x` and `5`. Equal sign operator is not used in Coral, to avoid confusion.

This just lets the value of `x` to be immutable `5` forever.

```
val x 5
```

###### The Identity function

The identity function is used as a keyword: **id**

And it is defined as:

```
id := (x) -> x
```

###### Rule Based Transformations

A rule is a key-value pair, and a list of rules is what you usually know as being a dictionary in a general sense, so a list of key-value pairs. In particular this is what is known as an object, for some languages like JavaScript.

The syntax is exactly as in CSS. Note that `-` (dash) is supported in the key name. 

```css
{
  color: orange;
  text-align: center;
}
```

Compilation results in the following JSON structure:

```javascript
{
  color: 'orange',
  textAlign: 'center'
}
```

The `/.` operator may be used to replace all occurences of "color" with the value "orange".

###### Anonymous function

```haxe
[] => true /* Tinkerbell Language Extensions: Short Lambda */
```

###### Key-value loops

```haxe
for (key => value in target) body;
```

###### Traits 

###### Abstract Classes

###### Lazy

```haxe
@:lazy var x = [1, 2, 3, 4];
```
