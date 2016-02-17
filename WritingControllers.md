## Actions ##

```
public function index() {
    return Results::ok($this->fetch());
}
```

Where
```
    return Results::ok($this->fetch());
```

is equivalent of the following:

```
    return $this->display();
```

  * `Controller::display()` returns an object which implements `Result` interface.
  * Both `fetch()` and `display()` take as default parameter `controller/action` where `.tpl` suffix is appended to become `controller/action.tpl` so, the template is searched under `templates/controller/action.tpl`.

If you `return null` or you forget to return a value, the value of `Results::noContent()` is used by the dispatcher.