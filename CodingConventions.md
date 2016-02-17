

The key words "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL NOT", "SHOULD", "SHOULD NOT", "RECOMMENDED", "MAY", and "OPTIONAL" in this document are to be interpreted as described in RFC 2119.

## Editor Settings ##

### Sublime Settings ###

Preferences > Settings-User ...
Packages\User\Preferences.sublime-settings

**Sublime settings are highlighted between { and }**

```javascript
{
    // Encoding used when saving new files, and files opened with an undefined
    // encoding (e.g., plain ascii files). If a file is opened with a specific
    // encoding (either detected or given explicitly), this setting will be
    // ignored, and the file will be saved with the encoding it was opened
    // with.
    // PSR-1. 2. Code files MUST use only UTF-8
    "default_encoding": "UTF-8",

    // The number of spaces a tab is considered equal to
    // PSR-2. 1. Code MUST use 4 spaces for indenting, not tabs.
    "tab_size": 4, 

    // Set to true to insert spaces when tab is pressed
    // PSR-2. 1. Code MUST use 4 spaces for indenting, not tabs.
    "translate_tabs_to_spaces": true,

    // Columns in which to display vertical rulers
    "rulers": [80, 120],

    // Determines what character(s) are used to terminate each line in new files.
    // Valid values are 'system' (whatever the OS uses), 'windows' (CRLF) and
    // 'unix' (LF only).
    // PSR-2. 8. All code files MUST use the Unix LF (linefeed) line ending
    "default_line_ending": "unix",

    // Set to true to ensure the last line of the file ends in a newline
    // character when saving
    "ensure_newline_at_eof_on_save": true,

    // Set to false to disable detection of tabs vs. spaces on load
    "detect_indentation": false,

    // Set to "none" to turn off drawing white space, "selection" to draw only the
    // white space within the selection, and "all" to draw all white space
    "draw_white_space": "all",

    // Set to true to removing trailing white space on save
    "trim_trailing_white_space_on_save": true
}
```

Other goodies:
* http://editorconfig.org

Font faces:
* [Bitstream Vera Sans Mono](http://www.fontsquirrel.com/fonts/Bitstream-Vera-Sans-Mono)
* [Liberation Mono](http://www.fontsquirrel.com/fonts/Liberation-Mono)

## PSR Standards ##

#### PSR-0 Autoloading ####

...

#### PSR-1 Basic Coding ####

  1. PHP code MUST use the long `<?php ?>` tags; it MUST NOT use the other tag variations. (Also see PSR-2.10)
  1. Code files MUST use only UTF-8 {`"default_encoding": "UTF-8"`}
  1. Files SHOULD either declare symbols (classes, functions, constants, etc.) or cause side-effects (e.g. generate output, change .ini settings,explicit use of require or include, connecting to external services, emitting errors or exceptions, modifying global or static variables, reading from or writing to a file, etc.) but SHOULD NOT do both.
  1. Class names MUST be declared in `StudlyCaps`

#### PSR-2 Coding Style ####

  1. Code MUST use 4 spaces for indenting, not tabs. {`"tab_size": 4, "translate_tabs_to_spaces": true`}
  1. There MUST NOT be a hard limit on line length; the soft limit MUST be 120 characters; {` "rulers": [80, 120]`}
  1. Visibility MUST be declared on all properties and methods;
  1. `abstract` and `final` MUST be declared before the visibility;
  1. The `var` keyword MUST NOT be used to declare a property.
  1. Property names SHOULD NOT be prefixed with a single underscore to indicate `protected` or `private` visibility - since keywords are available.
  1. Opening braces for control structures MUST go on the same line, and closing braces MUST go on the next line after the body.
  1. All code files MUST use the Unix LF (linefeed) line ending. {`"default_line_ending": "unix"`}
  1. All code files MUST end with a single blank line. {`"ensure_newline_at_eof_on_save": true`}
  1. The closing `?>` tag MUST be omitted from files containing only PHP.
  1. PHP keywords MUST be in lower case. The PHP constants `true`, `false`, and `null` MUST be in lower case.
  1. The `extends` and `implements` keywords MUST be declared on the same line as the class name.
  1. Lists of implements MAY be split across multiple lines, where each subsequent line is indented once. When doing so, the first item in the list MUST be on the next line, and there MUST be only one interface per line.
  1. In the argument list, there MUST NOT be a space before each comma, and there MUST be one space after each comma.
  1. Method arguments with default values MUST go at the end of the argument list.
  1. Argument lists MAY be split across multiple lines, where each subsequent line is indented once. When doing so, the first item in the list MUST be on the next line, and there MUST be only one argument per line.
  1. The keyword `elseif` SHOULD be used instead of else if so that all control keywords look like single words.

#### PSR-4 Improved Autoloading ####

...

## Aditional specific conventions ##

  1. Usage of `static` methods and `static` local variables is discouraged. Make sure you have an object oriented or a functional design before using `static`. And make sure you are not forcing procedural style over classes by using `static` in excess. If you still need to use `static` methods make sure that `static` keyword is written on the line above the method signature.

We don't stick to PSR-4.5 because we try to avoid static methods as more as possible.

Seven Virtues of a Good Object: 5. His Class Doesn't Have Anything Static
[Yegor Bugayenko](http://www.yegor256.com/2014/11/20/seven-virtues-of-good-object.html)

```php
    /** 
     * I am using this because it is similar with @staticmethod used in Python.
     * We don't stick to PSR-4.5, because it is more suitable for C++/Java style. 
     * We try to avoid static methods as more as possible. Scala already removed statics 
     * and JavaScript never had this idea of statics.
     * PSR-4.5. When present, the static declaration MUST come after the visibility declaration.
     */
    static public function FunctionName($value='') {
        # code...
    }
```

## Naming Conventions ##

**What about letter cases and underscores?**

We have a very _liberal approach_ in this area.

As _Linus Torvalds_ said: _"Coding style is very personal, and I won't force my views on anybody, but this is what goes for anything that I have to be able to maintain"_.

Maybe it is confusing,
but it is important to keep in mind only one rule: **don't put everything in the same basket**.

  1. Constants are always `SCREAMING_CAPS`;
  1. Local variables, object properties and function parameters are `snake_case`;
  1. Functions and methods are generally `camelCase`;
  1. Classes (type names) are always `StudlyCaps`;

Usually I stick to the same convetions as [Les Orchard](http://blog.lmorchard.com/2013/01/23/naming-conventions).

|          |         |                                                 |
|:---------|:--------|:------------------------------------------------|
| Variable | mutable | All lower case, words separated by underscores. |
| Constant | immutable | All upper case, words separated by underscores. |
| Functions/methods | immutable and callable things | Mixed camel case, first letter always lower case. |
| Structs and classes |  immutable and instantiatable things | Mixed camel case, first letter always upper case. |

These rules are not mandatory, they are just advisory and won't be enforced on contributors.

We do not agree [Hungarian Notation](CodingConventions_HungarianNotation.md) (click the link to find out why).

Exceptions:

| Prefix | Meaning                   |
|:-------|:--------------------------|
| m      | member variable           |
| g      | global variable           |
| f      | boolean flag              |
| k      | enum member               |
| s      | static variable or member |

**Sublime Text** provides supor for those if you type the prefix without underscore after.

After all, computer programming is about **data structures**, **algorithms**, **architectures** and **interfaces** and not so much about text formatting and typography.

## Design Principles ##

Forget about CodingConventions. We are more concerned with:
  * [DRY Principle](http://en.wikipedia.org/wiki/Don%27t_repeat_yourself)
  * [Separation of concerns](http://en.wikipedia.org/wiki/Separation_of_concerns)
  * [Code reuse](http://en.wikipedia.org/wiki/Code_reuse)
  * [Abstraction principles](http://en.wikipedia.org/wiki/Abstraction_principle_%28programming%29)

Some good documentation:
  * [Three Layers Architecture](http://www.tonymarston.net/php-mysql/3-tier-architecture.html)
  * [MVC Architectural Pattern in Web Applications](http://www.tonymarston.net/php-mysql/model-view-controller.html)
  * [On coupling and cohesion (with some arguments on Dependency Injection)](http://www.tonymarston.net/php-mysql/dependency-injection-is-evil.html)

And speaking about DRY Principle: **Avoid [Copy and paste programming](http://en.wikipedia.org/wiki/Copy_and_paste_programming) and [Cargo cult programming](http://en.wikipedia.org/wiki/Cargo_cult_programming) at any price, dead or alive, no matter what.**

[10 steps to becoming a better programmer](http://ilpverymuch.wordpress.com/2014/06/23/10-steps-to-becoming-a-better-programmer/)

**Other anti-patterns to avoid:**

  * [Copy and paste programming](http://en.wikipedia.org/wiki/Copy_and_paste_programming)
  * [Duplicated code](http://en.wikipedia.org/wiki/Duplicate_code): identical or very similar code exists in more than one location.
  * [Cargo cult programming](http://en.wikipedia.org/wiki/Cargo_cult_programming)
  * **Code Distrust**: checking to see if a `boolean`-typed variable is something other than `true` or `false`; Using `if (true == (true == x))` instead of `if (x)` when `x` is a boolean variable, etc.
  * **Smart UI Anti-Pattern** (See: [Using Interface Patterns](http://geekswithblogs.net/gregorymalcolm/archive/2009/07/14/user-interface-patterns.aspx) - includes details on MVC and so on)
  * [Arrow Anti-Pattern](http://c2.com/cgi/wiki?ArrowAntiPattern): It often develops when a programmer applies the 'One Return Per Function rule' blindly and in poor taste
  * [One Return Per Function ](http://www.leepoint.net/JavaBasics/methods/method-commentary/methcom-30-multiple-return.html): simple readable code in more important than following any arbitrary rule. - Also called **"Single Exit Fantasy"**
  * **Loop-switch sequence**: Encoding a set of sequential steps using a switch within a loop statement
  * [Error hiding](http://en.wikipedia.org/wiki/Error_hiding): Catching an error message before it can be shown to the user and either showing nothing or showing a meaningless message. Checking results without throwing exceptions or forwarding error codes and messages to both caller and logging system.
  * **Pinball Programming**: Using code that doesn't throw exceptions, and not checking the output result. Blindly using running over errors with faith that everything is fine since the system has `display_errors` muted.
  * **Hard code**: Embedding assumptions about the environment of a system in its implementation
  * **Inappropriate intimacy**: a class that has dependencies on implementation details of another class.
  * **Fat Controller Anti-Pattern**
  * [God Object](http://en.wikipedia.org/wiki/God_object): Concentrating too many functions in a single part of the design (class)
  * [Object Orgy](http://en.wikipedia.org/wiki/Object_orgy):  Failing to properly encapsulate objects permitting unrestricted access to their internals
  * **Premature optimization**: Coding early-on for perceived efficiency, sacrificing good design, maintainability, and sometimes even real-world efficiency - D. Knuth: "We should forget about small efficiencies, say about 97% of the time: premature optimization is the root of all evil."

Over engineering? Redundant stuff?

Let's have an example:
```
if (numMines > 0)
{
   enabled = true;
}
else
{
   enabled = false;
}
```

Why would you do that when you could just use:
```
enabled = (numMines > 0);
```

## PHP specific standards ##

  1. Access type `abstract` for interface methods must be omitted.
