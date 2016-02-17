## The `list` and `dictionary` types ##

The `array` type in PHP is very versatile.

An `array` in PHP is actually an ordered map. A `map` is a type that associates values to keys. This type is optimized for several different uses; it can be treated as an `array`, **`list`** (`vector`), `hashtable` (an implementation of a `map`), **`dictionary`**, `collection`, `stack`, `queue`, and probably more. As array values can be other arrays, `tree`s and multidimensional arrays are also possible.

Source: http://www.php.net/manual/en/language.types.array.php

| **`list`**       | numerically indexed `array` |
|:-----------------|:----------------------------|
| **`dictionary`** | associative indexed `array` |

As of PHP 5.4 it is possible to array dereference the result of a function or method call directly. Before it was only possible using a temporary variable.

### Iterable types and nullable types ###

Iterable types are types that can be used in a `for`/`foreach` construct. Iterable types are not `nullable` by default. So, in the context of BareboneMVC documentation, if an iterable type is `nullable` it must be explicitly specified `nullable`.

| **Type** | **Default `nullable`** | **Comments** |
|:---------|:-----------------------|:-------------|
| `list` | No | No comment |
| `dictionary` | No | No comment |
| `string` | Yes | Use `str_split()` to convert string to an iterable type |
| `object` | No | Only the `dictionary` of `public` properties is iterable |

The return type of functions shall not be replaced with `variant` when it can be marked as `nullable`. If the type is `nullable` by default, the remark is not even necessary, but it is mandatory for types that are not `nullable` by default - for instance `iterable` types.

## Types/classes ##

| **Type** | **Extends** |
|:---------|:------------|
| `Stack` | `SplStack` |
| `Queue` | `SplQueue` |
|  | `SplFixedArray` |
|  | `ArrayObject` |

## The `variant` type ##

Tthe `mixed` pseudo-type introduced by the official PHP manual has been replaced in Barebone MVC documentation with `variant` pseudo-type which is used for documentation purposes only. The definition of the `variant` is the following:

```
class variant {
    private typeid type;

    public string gettype() const;          // Get the type of a variable
    public bool settype(string type);       // Set the type of a variable

    public bool boolval() const;            // Get the boolean value of a variable (PHP 5 >= 5.5.0)
    public int intval() const;              // Get the integer value of a variable
    public string strval() const;           // Get string value of a variable
    public float floatval() const;          // Get float value of a variable

    public bool is_bool() const;            // Finds out whether a variable is a boolean 
    public bool is_float() const;           // Finds whether the type of a variable is float
    public bool is_int() const;             // Find whether the type of a variable is integer
    public bool is_string() const;          // Find whether the type of a variable is string
    public bool is_object() const;          // Finds whether a variable is an object
    public bool is_array() const;           // Finds whether a variable is an array

    public string get_class() const;        // Returns the name of the class of an object
}
```

### `gettype()` ###

Get the type of a variable. Actually returns the `variant` type name.

```
public string variant::gettype() const;
```

| **returns** | Returns the string representation of the type property of the variant object |
|:------------|:-----------------------------------------------------------------------------|

```
string gettype(const variant var); // Procedural style
```

| **var** | .. |
|:--------|:---|
| **returns** | ... |

### `settype()` ###

Set the type of a variable

```
public bool variant::settype(string type);
```

| **type** | ... |
|:---------|:----|
| **return** | ... |

```
bool settype(variant var, string type); // Procedural style
```

### `boolval()` ###

Get the boolean value of a variable (PHP 5 >= 5.5.0)

```
public bool variant::boolval() const;
bool boolval(const variant var); // Procedural style
```

### `intval()` ###

Get the integer value of a variable

```
public int variant::intval() const; 
int intval(const variant var); // Procedural style
```

### `strval()` ###

Get string value of a variable

```
public string variant::strval() const;
string strval(const variant var); // Procedural style
```

### `floatval()` ###

Get float value of a variable

```
public float variant::floatval() const;
float floatval(const variant var); // Procedural style
```


### `is_null()` ###
Finds whether a variable is `null`. A variant is `null` when its variant type is `nulltype`.

```
public bool variant::is_null() const;
bool is_null(variant var); // Procedural style
```

### `is_bool()` ###
Finds out whether a variable is a boolean

```
public bool variant::is_bool() const;
bool is_bool(const variant var); // Procedural style
```

### `is_float()` ###
Finds whether the type of a variable is float

```
public bool variant::is_float() const;
bool is_float(const variant var); // Procedural style
```

### `is_int()` ###
Find whether the type of a variable is integer

```
public bool variant::is_int() const;
bool is_int(const variant var); // Procedural style
```

### `is_numeric()` ###
Finds whether a variable is a number or a numeric string

```
public bool variant::is_numeric() const;
bool is_numeric(const variant var);
```

### `is_string()` ###
Find whether the type of a variable is string
```
public bool variant::is_string() const;
bool is_string(const variant var);
```
### `is_object()` ###
Finds whether a variable is an object

```
public bool variant::is_object() const;
bool is_object(const variant var);
```
### `is_array()` ###
Finds whether a variable is an array
```
public bool variant::is_array() const;
bool is_array(const variant var);
```

### `get_class()` ###
Returns the name of the class of an object
```
public string get_class() const;  
string get_class(const variant var);
```