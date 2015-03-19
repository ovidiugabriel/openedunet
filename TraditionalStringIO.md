# Traditional String IO #

## Scaning, Splitting, Tokenize, Parse, Unpack ##

In C/C++ you would have:

```
int z = 0;
int l = 0;
int a = 0;
char* s = "01.01.1970";

int n_fields = sscanf(s, "%2d.%2d.%4d", &z, &l, &a);
assert(3 == n_fields);
```

In PHP, the C-style:

```
$s = '01.01.1970';
sscanf($s, "%2d.%2d.%4d", $z, $l, $a);
```

In PHP, a modern way to achieve the same result (let's say a pythonic one):

```
list ($z, $l, $a) = explode('.', $s);
```

**This is the recommended form for this project.**

Here it is in Python:

```
z, l, a = s.split('.')
```

For type safety in PHP we have some extra lines:

```
list ($z, $l, $a) = explode('.', $s);

// but for type-safety
$z = intval($z);
$l = intval($l);
$a = intval($a);
```

## Serialization ##

When a parameter is passed to a function it can be in:
  * unserialized form
  * serialized form

For the serialized form we have:
  * dictionary (called associative array in PHP)
  * object (in `JavaScript` and object is a dictionary)

A form of serialization is `QUERY_STRING`