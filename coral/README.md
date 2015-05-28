# Coral

A beautiful yet efficient language.

###### Delayed Assignment Operator

```
x := 0
```

This is basically automatic [thunking](http://en.wikipedia.org/wiki/Thunk). You can achieve the same thing by doing:

```
x = () -> 0
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
