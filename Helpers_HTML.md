Html Helper here...

The purpose of HTML helpers here is to augment Code Igniter platform HTML helpers and to provide a cheap replacement when do you want to disable any template engine support in BareboneMVC framework.

HTML helpers output directly as default when they are called in a template context.

### `html_options_assoc()` ###

`html_options_assoc()` is a function that creates `<select><option>` group in HTML format, as a string.

```
string html_options_assoc(string name, dictionary options)
string html_options_assoc(string name, dictionary options, variant selected)
string html_options_assoc(string name, dictionary options, variant selected, dictionary params)
```

| **`name`** | The value of the `name` attribute of the `select` tag |
|:-----------|:------------------------------------------------------|
| **`options`** | An associative `array` (`dictionary`) of values and output |
| **`selected`** | The value of the selected option element(s) |
| **`params`** | Other HTML attributes for `select` tag, like: `id`, `class`, etc |
| **`returns`** | `string` |

### `html_options()` ###

```
string html_options(string name, list values, list output)
string html_options(string name, list values, list output, variant selected)
string html_options(string name, list values, list output, variant selected, dictionary params)
```
| **`name`** | The value of the `name` attribute of the `select` tag |
|:-----------|:------------------------------------------------------|
| **`values`** | A `list` of values (the keys of `options` dictionary) |
| **`output`** | A `list` of output labels (the values of `options` dictionary) |
| **`selected`** | The value of the selected option element(s)  |
| **`params`** | Other HTML attributes for select tag, like: id, class, etc  |
| **`returns`** | `string` |

```
// The following two calls are equivalent:

echo html_options_assoc($name, $options);
echo html_options($name, array_keys($options), array_values($options));
```

### `html_radios()` ###

### `html_checkboxes()` ###

### `html_table()` ###

### `html_select_date()` ###

### `html_select_time()` ###

Lower level functions

### `html_checked()` ###

```
string html_checked(boolean cond)
```

### `html_selected()` ###

```
string html_selected(boolean cond)
```


### `html_selected_post()` ###

```
string html_selected_post(string key, string value)
```

### `html_checked_post()` ###

```
string html_checked_post(string key, string value)
```