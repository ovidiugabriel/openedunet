### `load_database()` ###

Loads the database connection using the configuration with given name.

```
Database load_database(string config_name)
```

| **`config_name`** | the name of the configuration |
|:------------------|:------------------------------|

This function call is equivalent with the following code snippet:

```
$db = Database::instance();
```

### `db_row()` ###

Extract a record row from the given `query` output result executed on a `database` connection.

```
nullable dictionary db_row(string query)
nullable dictionary db_row(string query, Databse database)
```

| **`query`** | The '`query`' to be executed on the server |
|:------------|:-------------------------------------------|
| **`database`** | `[optional]` Database connection. If not specified, the default connection is used. |
| **returns** | <div>Returns a <code>dictionary</code> where keys are field names and values are field values in the selected record.</div> <div>If no result is found for the <code>query</code> then <code>null</code> is returned.</div> |


### `db_row_object()` ###

Creates an object of given `type` from the output result of the given `query` executed on a `database` connection.

```
nullable object db_row_object(string type, string query)
nullable object db_row_object(string type, string query, Database database)
```

| **`type`** | the name of the `type` used to create the returned object |
|:-----------|:----------------------------------------------------------|
| **`query`** | the `query` to be send to the database |
| **`database`** | `[optional]`  |
| **returns** | ... |

### `db_row_num()` ###

```
nullable list db_row_num(list fields, string query)
nullable list db_row_num(list fields, string query, Databse database)
```

| **`fields`** | ... |
|:-------------|:----|
| **`query`** | ... |
| **`database`** | ... |
| **returns** | ... |


### `db_result()` ###

```
list db_result(string query)
list db_result(string query, Database database)
```

| **`query`** | The `query` to be executed on the server |
|:------------|:-----------------------------------------|
| **`database`** | `[optional]` Database connection. If not specified, the default connection is used. |
| **returns** | <div>Each <code>dictionary</code> in this <code>list</code> is a record.</div> <div>If no result is found for the <code>query</code> then an <i>empty</i> <code>list</code> is returned.</div>|

### `db_result_objects()` ###

```
list db_result_objects(string type, string query)
list db_result_objects(string type, string query, Database database)
```

| **`type`** | ... |
|:-----------|:----|
| **`query`** | ... |
| **`database`** | ... |
| **returns** | ... |

### `db_result_func()` ###

```
nulltype db_result_func(string query, callable func)
nulltype db_result_func(string query, callable func, Database database)
```

| **`query`** | ... |
|:------------|:----|
| **`func`** | ... |
| **`database`** | ... |
| **returns** | ... |


### `db_value()` ###

Extracts the value of the `field` after running the `query` command on a `database` connection.

```
string db_value(string field, string query)
string db_value(string field, string query, Database database)
```

| **`field`** | The name of the field to be extracted from query execution output result |
|:------------|:-------------------------------------------------------------------------|
| **`query`** | The `query` command to be executed on the database server |
| **`db`** | `[optional]` `Database` connection. If not specified, the default connection is used.  |
| **returns** | `string` ... |

### `db_value_object()` ###

```
nullable object db_value_object(string type, string field, string query [, Database database])
```

| **`type`** | ... |
|:-----------|:----|
| **`field`** | ... |
| **`query`** | ... |
| **returns** | ... |

### `db_column()` ###

```
list<string> db_column(string query, string field [, Database database])
```

| **`query`** | ... |
|:------------|:----|
| **`field`** | ... |
| **`database`** | ... |
| **returns** | ... |

### `db_result_assoc()` ###

```
dictionary<string, dictionary> db_result_assoc(string query, string field [, Database database])
```

| **`query`** | ... |
|:------------|:----|
| **`field`** | ... |
| **`database`** | ... |
| **returns** | ... |

### `db_result_assoc_func()` ###

```
nulltype db_result_assoc_func(string query, string field, callable func [, Database database])
```

| **`query`** | ... |
|:------------|:----|
| **`field`** | ... |
| **`func`** | ... |
| **`database`** | ... |
| **returns** | ... |


### `db_column_assoc()` ###

```
list db_column_assoc(string query, string keyfield, string field [, Database database])
```

### `GetSQLValueString()` ###

Executes proper escaping for the given input `value` and `type`.

```
string GetSQLValueString( variant value, string type, ... )
string db_escape_string( variant value, string type, ... )
```

| **`value`** | ... |
|:------------|:----|
| **`type`** | <ul><li><code>'text'</code></li><li><code>'long'</code> or <code>'int'</code></li><li><code>'double'</code></li><li><code>'date'</code></li><li><code>'defined'</code></li></ul>|
| **returns** | `string` ... |

It automatically calls `$db->real_escape_string( )`.

`GetSQLValueString()` is deprecated. `db_escape_string()` shall be called instead.