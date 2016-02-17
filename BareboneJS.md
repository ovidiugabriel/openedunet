

A client library (ECMA Script) for the BareboneMVC framework.

### `val()` ###

```
variant val(string id, variant value) // Setter
variant val(string id) // Getter
```

Advantages:
  * Automatically detects if `.val()` or `.text()` method shall be called depending on the node type;

| **`id`** | The `id` of the node you are searching for |
|:---------|:-------------------------------------------|
| **`value`** | The value to be set into the node |
| **returns** | ... |

### `to_fixed()` ###

```
string to_fixed(float value, integer decimals, string default_value)
string to_fixed(integer value, integer decimals, string default_value)
```

Advantages:
  * Automatically detects if `value` is not a number (`integer` or `float`) and returns the `default_value` in that case.

| **`value`** | ... |
|:------------|:----|
| **`decimals`** | ... |
| **`default_value`** | ... |
| **returns** | ... |

```
document.getElementById(id)
```

## The Reactive Module ##

**Recommendation:** A simple way to establish reactive formulas before translating them into reactive `JavaScript` code is to use an [Apache OpenOffice Calc](https://www.openoffice.org/product/calc.html) spreadsheet first.

### `reactive.get()` ###

```
variant reactive::get(string varname)
```

### `reactive.set()` ###

```
variant reactive::set(string varname, variant value)
```

### `reactive.get_vars()` ###

```
dictionary reactive::get_vars()
dictionary reactive::get_vars(list vars)
```

| **`vars`** | `[optional]` The `list` of variable names requested |
|:-----------|:----------------------------------------------------|
| **returns** | a `dictionary` with pairs (variable\_name, variable\_value)  |

**Example:**
```
reactive.get_vars(['x', 'y', 'price']); // -> Object { x=20, y=200, price=20}
```

### `reactive.bind()` ###

```
nulltype reactive::bind(string id, string expr, string fun)
```

**Example:**

```
reactive.set('x', 0);               // initial value of x variable is set to 0
reactive.set('y', 'x*10');          // set relation y = x * 10
reactive.bind('price', 'x', 'val'); // binds x variable to HTML element with attribute id="price"

// after a while, on an event the x variable gets updated
reactive.set('x', 20);              // all variables that are bound with x are now updated
                                    // price will show 20 and y will be 200

reactive.get_vars();                    // -> Object {"x":20,"y":200,"price":20}
document.getElementById('price').value; // -> "20"
```

### `reactive.listen()` ###

```
nulltype reactive::listen(string id, string event_type, string call)
```

**Example:**

```javascript
reactive.set('price', 0);               // initial value of variable price
reactive.bind('price', 'price', 'val'); // first HTML element with id="price" is bound to changes of variable "price"

reactive.set('price', 10); 
// The update of internal variable triggers the automatic update of the HTML element

// but a change into the HTML won't change the internal variable 
document.getElementById('price').value = 100;

// Until we register on a specific event on the HTML element 
reactive.listen('price', 'change', 'val()');

// Now changes are propagated in a bidirectional way
```