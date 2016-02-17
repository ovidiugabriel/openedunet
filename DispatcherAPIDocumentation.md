## MVC Dispatcher - Introduction ##

The dispatcher is the core of the framework.

The dispatcher is mainly responsible to
  * read and parse the request
  * serve the response to the client
  * delegate anything in between

Barebone MVC class naming convention is following the [PHP Framework Interoperability Group](http://www.php-fig.org/) Standard: **[PSR-0 Autoloading Standard](http://www.php-fig.org/psr/psr-0/)**

## Use Exception Handling ##

**IMPORTANT**: The dispatcher API is designed based on the [UseExceptionsInsteadOfErrorValues](http://c2.com/cgi/wiki?UseExceptionsInsteadOfErrorValues) pattern. Although some users insist having a return value to be checked by the caller instead.

Imagine that we provide an `import_nothrow()` function to load a class. The caller forget to check the return value and the class is not loaded, when `create_instance_nothrow()` will be used it will return `null` instead of throwing an exception. And if the user forget to check this, the next method call will be on a `null` object. As a result the user will end up invoking methods on an invalid object.

In this case our recommendation is to trust exception handling. If anything goes wrong, in the worst case an uncaught exception will bail out your program. This is the contract between the caller and the API. If the contract is broken, an exception is thrown - this is good Object Oriented design.

When calling a `nothrow` function you refuse the guarantee that what's returned is valid, and everything falls on your responsibility. Because this API is the core of our framework, we cannot provide `nothrow` functions here. We are trying to provide a Secure Coding framework. Hiding errors into the return value is not a secure coding practice. Fatal errors always require escalation.

## Import a Class ##

### `import()` ###

```
nulltype import(string name) throws ClassNotFoundException, InvalidArgumentException
```

Imports a given class using its fully qualified name (but using dot syntax instead of backslash). This mechanism is emulating namespaces on PHP < 5.3.0 - because namespace feature was not provided by the language prior to PHP 5.3.0. In newer version of PHP it is still recommended to use this in order to keep your code  portable.

| **name** |  fully qualified `name` of the class (but using dot syntax instead of backslash) |
|:---------|:---------------------------------------------------------------------------------|
| **returns** | `null` - Nothing to return. If something is wrong and exception is thrown. |

This function has been introduced in order to improve bytecode cache performances, additional to autoloading capability.

**Rasmus Lerdorf**:
> To clarify, of course conditionally included files get compiled and   cached. The issue is not the included files but the resulting conditionally defined classes and functions needing to be redefined on every request. Whether that is significant or not comes down to the specifics of the situation, but there is no doubt that it is slower. It comes down to a NOP vs. a FETCH\_CLASS, for example and the NOP is obviously way faster.

**Example:**
```

// Using import, instead of doing something like:
require_once 'Foo/class.Bar.php';
$controller = new Foo_Bar();

// you will do something like:
import('Foo.Bar');
$controller = create_instance('Foo.Bar');
```

## Create a new object ##

### `create_instance()` ###

```
object create_instance(string name) throws ClassNotFoundException
object create_instance(string name, dictionary properties) throws ClassNotFoundException
```

Creates a new instance of the given class using its fully qualified name (but using dot syntax instead of backslash). Note that you have to import the class using `import()` before calling `create_instance()`.

| **name** | class fully qualified `name` (but using dot syntax instead of backslash) |
|:---------|:-------------------------------------------------------------------------|
| **properties** | `[optional]` values that will be assigned to object members at creation; <br>note: properties that are not declared in class definition will become public properties  <br>
<tr><td> <b>returns</b> </td><td> On success, returns a reference to a new instance. If something is wrong and exception is thrown.  </td></tr></tbody></table>

<b>Example:</b>
<pre><code>// For example instead of the following statement<br>
// as you would use it for PHP &gt;= 5.3.0<br>
$obj = new \foo\bar\ClassName();<br>
<br>
// or prior to PHP 5.3.0<br>
$obj = new foo_bar_ClassName();<br>
<br>
// you would normally have the following:<br>
$obj = create_instance('foo.bar.ClassName');<br>
</code></pre>

<h2>Get reference to the single instance ##

### `get_instance()` ###

```
object get_instance(string name) throws ClassNotFoundException, InstantiationException
```

Retrieves a reference to the _single instance of the type_.

| **name** | fully qualified class `name` (but using dot syntax instead of backslash) |
|:---------|:-------------------------------------------------------------------------|
| **returns** | On success, returns a reference to the single instance. If something is wrong and exception is thrown. |

**IMPORTANT:** Given type is required to implement a mechanism to create and return the instance, either:
  1. implement _a function with the same name as the class_ that implements singleton behavior and _define a public constructor_; but in this case the user must ensure that constructor is not called when singleton function (same name as the class) is used;
  1. implement `instance()` or `getInstance()` method and _define a private constructor_;

### `singleton()` ###

```
object singleton(string name)
```

It is the singleton formal factory method provided by the framework.

| **name** | fully qualified class `name` (but using dot syntax instead of backslash)  |
|:---------|:--------------------------------------------------------------------------|
| **returns** | On success, returns a reference to the single instance. If something is wrong and exception is thrown |

This is especially useful to create singletons of classes provided by third party libraries.

Use this function when you want to ensure usage of a single instance but don't want to create a function for each type, add a `getInstance()` or `instance()` method to each class or refactor libraries to change constructors access level.

## Import a class and create a single/multiple instances ##

### `require_object()` ###

```
object require_object(string name)
object require_object(string name, callable callback)
```

Creates the required object after it automatically loads the class.

| **name** | fully qualified class `name` (but using dot syntax instead of backslash)  |
|:---------|:--------------------------------------------------------------------------|
| **callback** | <div>The <code>callback</code> which is invoked on the <code>object</code> after its creation and which shall return the <code>object</code> that is further used.</div><div> This is especially useful when do you want to clone the object or extend object with new properties, etc.</div> |
| **returns** | ... |

If a callback is provided, then the object is passed to the callback and the return value of the callback is fetched back.

The main diference between `require_object()` versus `import()` and `create_instance()` is that `require_object()` is used to loading the class on demand since `import()` is used to load the class at the beginning of script execution.

### `require_class()` ###

```
object require_class(string name)
object require_class(string name, callable callback)
```

| **name** | fully qualified class `name` (but using dot syntax instead of backslash)  |
|:---------|:--------------------------------------------------------------------------|
| **callback** | ... |
| **returns** | ... |

### `set_flashdata()` ###

Flash data is session data that is stored only until the next request.

### `get_flashdata()` ###

## Portable Logging ##

Portable logging can be used to write to system log, to write in files, or using interfaces with Firebug, etc.

### `log_message()` ###

This can be part of the **Platform Abstraction Layer**.

```
nulltype log_message(integer level, string message)
```

| **level** | `syslog()` constant |
|:----------|:--------------------|
| **message** |  |
| **returns** | nothing |

The `level` is compatible with the [syslog()](http://php.net/manual/en/function.syslog.php) and `trigger_error()` functions. Although  `trigger_error()` constants use is **`DEPRECATED`**.

| **`syslog()` constant** | **Numeric** | **`trigger_error()` constant** | **Numeric** | **Description** |
|:------------------------|:------------|:-------------------------------|:------------|:----------------|
| `LOG_ERR`     | `3` | `E_USER_ERROR`    | `256`  | error conditions |
| `LOG_WARNING` | `4` | `E_USER_WARNING`  | `512`  | warning conditions |
| `LOG_NOTICE`  | `5` | `E_USER_NOTICE`   | `1024` | normal but significant condition |
| `LOG_INFO`    | `6` |                   |        | informational  |
| `LOG_EMERG`   | `0` |                   |        | system is unusable |
| `LOG_ALERT`   | `1` |                   |        | action must be taken immediately |
| `LOG_CRIT`    | `2` |                   |        | critical conditions |
| `LOG_DEBUG`   | `7` |                   |        | debug-level messages |
|               |     | `E_USER_DEPRECATED` | `16384` | deprecated feature requested |

### `log_var_dump()` ###

```
log_var_dump(mixed var, string varname)
```

Dumps a variable contents to the log files.

* if the variable is object or array, then the format of **print_r** is used
* otherwise the format of **var_dump** is used

### `trace_query()` ###

```
nulltype trace_query(void)
```

TO BE REMOVED. Not a good idea to call this manually.

### `json_success()` ###

```
nullable string json_success(boolean success [, boolean flush = true])
```

See _Aspect Oriented Programming_ solution for this.

| **`success`** | boolean value to be returned to the client |
|:--------------|:-------------------------------------------|
| **`flush`** | `[optional]` tells if the JSON string must be returned or flushed on the `stdout` |
| **returns** | when `flush` is `false` a JSON string is returned; if `flush` is `true` returns always `null` |