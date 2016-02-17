
```

interface ITemplateEngine {
    void assign(mixed var);
    void assign(string varname, mixed var, bool nocache);

    void append(mixed var);
    void append(string varname, mixed var, bool merge);

    string fetch(string template, string cache_id, string compile_id);
    void display(string template, string cache_id, string compile_id);

    void appendByRef(string varname, mixed var, bool merge);
    void assignByRef(string varname, mixed var);
}

```

### `assign()` ###

### `append()` ###

### `fetch()` ###

### `display()` ###