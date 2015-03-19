### `IDatabase::query()` ###

Executes a query and returns a handle to the resource.

```
public integer IDatabase::query(string query) throws Exception
```

| **`query`** | ... |
|:------------|:----|
| **returns** | ... |

**Important:** In case of error an `Exception` is thrown. Do not check the return result to detect an error. `resource_id = 0` is a valid `resource_id`.

```

try {
    $db->query("SELECT * FROM emp");
} catch (Exception $ex) {
    // ... in case of error.
}

```

### `IDatabase::nextRow()` ###

```
public variant IDatabase::nextRow(integer res_num)
```

### `IDatabase::numRows()` ###

```
public integer IDatabase::numRows(integer res_num)
```

### `IDatabase::insert()` ###

```
public integer IDatabase::insert(string table, dictionary values)
```

### `IDatabase::update()` ###

```
public integer IDatabase::update(string table, dictionary values, string where)
```