#### `with()` ####

```
nulltype with(callable ctorcall, callable block)
```

  1. Executes `ctorcall` and stores the object reference returned
  1. Calls `__enter__()` method on the object returned by `ctorcall`
  1. Calls `block` passing the object returned by `ctorcall` as parameter
  1. Calls `__exit__()` method on the object returned by `ctorcall`

Example

```
with(function() { return new Example(); }, function($ex) {
    print_r($ex);
});
```