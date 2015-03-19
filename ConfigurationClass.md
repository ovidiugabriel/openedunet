# The `Config` Class #

The `Config` class is a **Key-Value-Type store**.

That is a key-value store, but inside each value caries its own associated type.

Without using this feature, each time you request a field value from a database you will get a string - and you have to manually convert the value to the assumed type. _Maybe the assumed type it is the correct one, but you could also be wrong_.

## Basic Feature ##

In order to **avoid assuming the correct type**, this function converts the stored string value to the suitable type for the variable - that type is stored internally in the database.

## Extended Feature ##

Another important feature is that object data is automatically serialized into a specific form in the database, and they are automatically unserialized when you are accessing the key.

| Schema | Sometimes called **namespace** |
|:-------|:-------------------------------|
| Summary | (actual comment) ... |
| Description | ... |
| Type | ... |
| Default | ... |

```

Config(string schema)

```

### Reading Values ###

```
public variant Config::get(string name[, boolean noThrow = false]) [static, throws]
public variant Config::get(string name, true) [static, nothrow]
public variant Config::get(string name, true, variant defaultValue) [static, nothrow]
```

| **name** | the name of the key you need to read |
|:---------|:-------------------------------------|
| **noThrow** | `[optional]` default is `false`; if set on `true`, the `defaultValue` is returned and exception is not thrown when the key is not found |
| **defaultValue** | `[optional]` if `defaultValue` is not set, then `null` is returned when the key is not found, if `noThrow` is `true`  |
| **returns** | <div>the value of the key</div> <div> a <code>variant</code> that can have one of the following supported types:  <code>boolean</code>, <code>float</code>, <code>integer</code>, <code>string</code>, <code>object</code>, <code>array</code> (for both <code>list</code> and <code>dictionary</code>).</div> |

For `noThrow` parameter is recommended to use the following class contants for better readability:

```
Config::NOT_FOUND_THROW        =  false

Config::NOT_FOUND_DO_NOT_THROW =  true
```

**IMPORTANT**: This function converts key name from `org.openedunet.keyname` or `org::openedunet::keyname` or `org\openedunet\keyname` to `org_openedunet_keyname` for some compatibility reasons. This is done also for the `set()` method.

To use full namespace you must specify `schema` (See Extended Feature).

### Writing Values / Creating New Keys ###

New keys are automatically created when you are trying to set the value for a key that doesn't exists already. You don't have to worry about this issue. No existence check or create calls are necessary.

[Serializable interface](http://ro1.php.net/manual/en/class.serializable.php)

Old version:
```
    static public function set($name, $type, $value = null)
```


```
public nulltype Config::set(string name, variant value, string type) [static]
public nulltype Config::set(string name, variant value) [static]
```

Converts the _value_ to the specified _type_ and stores it into the database (using the representation format specified by _type_).

| **name** | the name of the key you want to write (or create) |
|:---------|:--------------------------------------------------|
| **value** | value to be stored into the database |
| **type** | <div>in case that <i>value</i> has primitive types: a long standard type name</div><ul><li><code>'boolean'</code></li><li> <code>'float'</code></li><li><code>'integer'</code></li><li><code>'string'</code></li></ul><div> in case that <i>value</i> is an object or an array: the serialization method must be specified</div><div><ul><li><code>'json'</code> (default)</li><li><code>'base64'</code></li><li><code>'hexdump'</code> (not implemented)</li><li><code>'serialize'</code> (not recommended, use <code>'json'</code> instead)</li><li><code>'yaml'</code> (proposal)</li><li> <code>'xml'</code> (proposal)</li></ul></div><div> <code>[default]</code> If <code>type</code> is omitted, the current variable type is used for primitive types - requested with <code>gettype()</code> </div><div>For objects, the <code>json</code> serialization method is the default. </div> |
| **returns** | `null` - Nothing to return. If something is wrong and exception is thrown. |

For the value of `type` you can pas one of the **`Config::TYPE_<type>`** constants.

```
class Config {
    // ...
    const TYPE_BOOLEAN     = 'boolean';
    const TYPE_FLOAT       = 'float';
    const TYPE_INTEGER     = 'integer';
    const TYPE_STRING      = 'string';
    const TYPE_OBJECT_JSON = 'json';
    // ...
}
```

The following methods are preferred especially when interfacing with a strong-typed language.

```
public void Config::setBoolean(string name, boolean value) [static]
public void Config::setInteger(string name, integer value) [static]
public void Config::setString(string name, string value) [static]
public void Config::setFloat(string name, float value) [static]
public void Config::setObject(string name, object value) [static]
```

Not applicable for this project (move to another wiki):

| `Double` |
|:---------|
| `Single` |
| `String` |
| `Boolean` |
| `DoubleWaveform` |
| `Int16Waveform` |
| `Int8` |
| `UInt8` |
| `Int16` |
| `UInt16` |
| `Int32` |
| `UInt32` |
| `Int64` |
| `UInt64` |
| `Array<Boolean>` |
| `Array<Int8>` |
| `Array<Uint8>` |
| `Array<Int16>` |
| `Array<UInt16>` |
| `Array<Int32>` |
| `Array<UInt32>` |
| `Array<Int64>` |
| `Array<UInt64>` |
| `Array<Single>` |
| `Array<Double>` |
| `Array<DoubleWaveform>` |
| `Array<Int16Waveform>` |
| `Variant` |

Set mupliple keys at once ... TODO: single insert.


## Caching ##

The `Config::get()` method result is cached internally.