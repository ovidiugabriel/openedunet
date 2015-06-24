Ch is a C/C++ dialect. It is an interpretive implementation of C with salient (prominent, attention attracting) features from C++, other languages and software packages for scripting, rapid application development, deployment, and integration with legacy systems.



#### Includes

```c++
#include "webapp_chf.cc"
```


#### Types

```c++
typedef char   chchar;
// typedef char*  string_t; - It's a built in type
typedef char** chstrarray;
```

###### FP

```c++
typedef void* (*FP) (...);
```

####  Macros 

###### FP_CALLBACK( )

```c++
#define FP_CALLBACK(p)  ((FP) (p))
```

###### COUNT( )

```c++
#define COUNT(x)        ((ssize_t)(sizeof(x)/sizeof((x)[0])))
```

One important thing about this macro is that the type of the resulting expression is cast to **ssize_t** ,
which according to POSIX standard is **Used for a count of bytes or an error indication.**

We don't use it for that reason, but because there is enough representation capacity and we are not interested 
in operating bitwise, we shall keep it **signed** since most probably some comparisons will be done with **signed** 
variables.

[INT14-C. Avoid performing bitwise and arithmetic operations on the same data](https://www.securecoding.cert.org/confluence/display/c/INT14-C.+Avoid+performing+bitwise+and+arithmetic+operations+on+the+same+data)

If you have more than **2,147,483,647** elements to be counted use **UCOUNT( )**.

###### UCOUNT( )

Does the same thing as **COUNT( )** but returns an **unsigned** value.

```c++
#define UCOUNT(x)        (sizeof(x)/sizeof((x)[0]))
```


####  Deferred-Shape array 

######  CREATE_DEFERRED_SHAPE_ARRAY ( )

Creates a deferred shape array.
This concept is borrowed from FORTRAN and it is especially useful when the C code is used for numerical computing purposes.

```c++
#define CREATE_DEFERRED_SHAPE_ARRAY(type, name, num)
```

| | | |
|---------	|------------- 	|-------------	|
| type | token | representing the type of the values being stored in each array cell | 
| name | token | representing the name of the array variable | 
| num | integer | representing the number of elements in the array | 

```c++
/**
 * A deferred-shape array is an array pointer or an allocatable array. 
 */
#if defined(_CH_)
    /* Deferred-shape array is created with the syntax of the language */
    #define CREATE_DEFERRED_SHAPE_ARRAY(type, name, num)    type name[0:(num)-1]
 
#elif !defined(_SCH_)
    /* 
     * Deferred-shape array is created with dynamic allocation of the operating system.
     * When using this, always use RAII pattern. 
     * (http://en.wikipedia.org/wiki/Resource_Acquisition_Is_Initialization)
     */
    #define CREATE_DEFERRED_SHAPE_ARRAY(type, name, num) \
        type* name = (type*) malloc((num) * sizeof(type))
#endif
```

####  Functions #

###### request_scalar()

Returns the value associated with the key **name**.

```c++
bool request_scalar(string_t& result, string_t name)
```
| | |
|---------	|-------------	|
| `name` | the name of the key |
| **returns** | Returns the value associated with the key **name**.  Returns an empty string if the key is not found. |

It is the same as `$_REQUEST[name]` in PHP. This is recommended instead of calling `Request.getForm(name)` - because `Request::getForm()` has a known limitation and a bug.


###### parse_str()

Parses `str` as if it were the query string passed via a URL and sets key names into `names` and values associated with the keys into `values`.

```c++
void parse_str(string_t str, string_t names[], string_t values[])
```

| `str` | ... |
|:------|:----|
| `names` | ... |
| `values` | ... |

You have to use `parse_string_count()` to know how much space to allocate for `names` and `values`.

```c++
int parse_string_count(string_t str)
```

| `str` | ... |
|:------|:----|
| returns | ... |

###### str_array_search()

```
int str_array_search(string_t needle, string_t haystack[], int num)
```

###### request_array()

```c++
int request_array(string_t key, string_t*& values)
```

| **`key`** | ... |
|:----------|:----|
| **`values`** | ... |
| **returns** | ... |

This is the same as calling `Request.getForms(strcat(key, "[]"), vals)`.

And it is also the same as `$_REQUEST[name]` in PHP - but where it is automatically detected that `$_REQUEST[name]` is an array while in Ch CGI you have to assume (although you would say it is written it is part of an interface contract) that `name` is an array to decide to use `request_array()`.

###### doubleval()

```c++
gdouble doubleval(string_t str)
```

| **`str`** | ... |
|:----------|:----|
| **returns** | ... |

It is the same as `doubleval()` or `floatval()` in PHP - where both `float` and `double` are on 64-bits. Here in Ch, like in C/C++, only `double` is on 64-bits.

###### get_double_values()

```c++
void get_double_values(gdouble* result, string_t* values, int num)
```

| **`result`** | ... |
|:-------------|:----|
| **`values`** | ... |
| **`num`** | ... |
| **returns** | ... |

Of course this is the same as running `doubleval()` on `values` with `array_map()` and storing the output in `result`.

###### array_map()

```c++
void array_map(void* result, FP callback, void* values, int count)
```

###### double_value_array()

```c++
void double_value_array(gdouble* result, string_t* values, int index)
```

###### var_dump_double()

```c++
void var_dump_double(double* var, int num)
```

## Strings ##

Types `char` and `wchar_t` are used to define variables of characters and wide characters in Ch.

The value of a variable of type `char` is a single character or escape sequence which is enclosed in singlequotes,
as in `'x'`. A character constant has type `int` in C. Like C++, a character constant has type `char` in
Ch.

| C | `int` |
|:--|:------|
| C++, Ch | `char` |

In Ch: For string functions **`strcpy()`**, **`strncpy()`**, **`strcat()`**, and **`strncat()`**, the memory will be automatically handled
if the first argument is of the type **`string t`**.

As it is mentioned above, one of the advantages of type string t is that Ch can handle the memory for variables of type string t automatically. For every operations on these variables, Ch will figure out the size
of the memory required, and then allocate enough memory for the variables. At the end of the lifetimes of these variables, Ch will free their memory automatically.

###### strcasecmp()

Compare two strings, ignoring case.

```c++
int strcasecmp(char *s1, char *s2);
```

###### strconcat()

```c++
char* strconcat (const char *string1, ...);
```

###### strjoin()

```c++
char* strjoin(const char *separator, ...);
```

###### strncasecmp()

Compare part of two strings, ignoring case.

```c++
int strncasecmp(char *s1, char *s2, int n);
```

###### str2ascii()

```c++
unsigned int str2ascii(char *s);
```

###### str2mat()

```c++
int str2mat(char mat[:][:], string_t s1, ...);
```

###### strgetc()

```c++
char strgetc(string_t &s, int i);
```

###### strputc()

```c++
int strputc(string_t &s, int i, char c);
```

###### strrep()

```c++
string_t strrep(string_t s1, string_t s2, string_t s3);
```

###### stradd()

###### foreach

In Ch the `foreach` loop is limited to the specific string tokenization that otherwise is usually done with `strtok()`.

```c++
char* strtok(char* str, const char* delim);
```

This way the following **Ch** code:

```c++
foreach (token; s; NULL; delimiter) {
    // ...
}
```

Is equivalent with the following PHP code:

```php
foreach (explode($delimiter, $S) as $token) {
    // ...
}
```
