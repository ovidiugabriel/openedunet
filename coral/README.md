# Coral

A beautiful yet efficient language.

| Keyword | Description                    |
|---------|--------------------------------|
| `id`    | acts as `Identity` function  |
| `val`   | declares an immutable variable |

###### Delayed Assignment Operator

```
x := 0
```

This is basically automatic [thunking](http://en.wikipedia.org/wiki/Thunk). You can achieve the same thing by doing:

```
x() := 0
```

If you wish, this can be translated to JavaScript:

```
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
mul2(a, b) := a * b
```
will be automatically memoized (using the `defaultCache`) as:

```
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
id(x) := x
```

###### Rule Based Transformations

A rule is a key-value pair, and a list of rules is what you usually know as being a dictionary in a general sense, so a list of key-value pairs. In particular this is what is known as an object, for some languages like JavaScript.

The syntax is exactly as in CSS. Note that `-` (dash) is supported in the key name. 

```
{
  color: orange;
  text-align: center;
}
```

Compilation results in the following JavaScript:

```
{
  color: 'orange',
  textAlign: 'center'
}
```
