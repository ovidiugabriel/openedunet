### What about hungarian notation? ###
(continued from CodingConventions)

Hungarian notation is a naming anti-pattern in modern day programming environments and form of Tautology. It simply violates very basic principles like: DRY principle and KISS principle.

**Hence it is an anti-pattern you should avoid it.**

It is generally a sign of breaking encapsulation, it obfuscates identifiers and makes code prone to confusion due to accidental erroneous use. In other words it makes wrong code impossible to read by a sane human.

**Prefixing that way is not needed really, or recommended and it is not allowed in this project, except rare situations.**

Here it is _Linus Torvalds_ (the father of Linux) opinion on this: _"Encoding the type of a function into the name (so-called Hungarian notation) is brain damaged -- the compiler knows the types anyway and can check those, and it only confuses the programmer. No wonder Micro $$oft makes buggy programs"_

This technique was important in BCPL programming language because BCPL has no data types other than the machine word. Or it can be useful for assembly language.

Here it is _Bjarne Stroustrup_ (the father of C++) opinion on this issue:
_"This technique that can be useful in untyped languages, but is completely unsuitable for a language that supports generic programming and object-oriented programming—both of which emphasize selection of operations based on the type an arguments. In this case, 'building the type of an object into names' simply complicates and minimizes abstraction."_

Don't try to be smarter than _Bjarne Stroustrup_ and _Linus Torvalds_.

Hungarian notation doesn't help even for scripting languages. - For modern reflective scripting languages the object type is a property of the object not a part of the name.

Don't be fooled  by the fact that type declaration is not mandatory. That doesn't mean that variables do not have a type - it is just encapsulated by its internal variant. This is **a feature of object orientation**.

```
$X = "0"; // here X is a string
$Y = 0;   // here Y is an integer
$Z = 0.0; // here Z is a float

$A = [1, 2, 3, 4]; // here A is an array
```

However if the type is judged as interface we have subtyping polymorphism.

It has been proved that hungarian notation can only lead to confusion because unique tags must be defined for type definitions and instance variables; but this must be done for each project, module, company, team etc. Better you use that time to learn practical stuff like multiple programming languages, paradigms, algorithms and software architecture than wasting time to train you on some arbitrary fantasies.

  1. **b** prefix can stand for both `boolean` and `byte`
  1. **s** prefix can stands for both `string` and `struct`
  1. **f** prefix can stands for both `boolean` and `float`
  1. you don't know when to use **pc** or **ps** or **a** or **ac** for `char*` or `char[]`

Hungarian notation in its current form puts way too much emphasis on the underlying type and ignores semantics. Important information like: the name of the structure, the name of the enumeration are hidden behind meaningless prefixes like `e` or `s`.

Simonyi Károly mistakenly used the word `type` in his paper, and generations of programmers misunderstood what he meant. Maybe he was talking about _kind_ and _purpose_.

Usually I remember only the first letters of a variable name, so it is  better use a suffix than a prefix.

| **Suffix** | **Variable type** |
|:-----------|:------------------|
| _varname_`_String` | <div>For all string types: <code>char*</code>, <code>char[]</code>, <code>std::string</code>, <code>QString</code>, etc</div><div>Disregard the fact that a string is <code>char*</code> because <code>std::string</code> is not a pointer. You cannot say <code>std::string pVarname;</code> or <code>QString psVarname;</code></div><div>By the way, a string is a string, a pointer to string or a pointer to character?</div> <div>If a `char *` is a pointer string, how do you call `char**` ??</div>|
| _varname_`_Integer` | all types of `integer` |
| _varname_`_Rational` | all types of `float` |
| _varname_`_Complex` | `complex` |
| _varname_`_Number` | all types of `integer` and `float` |
| _varname_`_List` | ... |
| _varname_`_Vector` | ... |
| _varname_`_Matrix` | ... |
| _varname_`_Array` | ... |
| _varname_`_Polynomial` | ... |
| _varname_`_typename` |  for all `enum typename`, `struct typename`, `class typename`, `union typename` never use `_enum`, `_struct`, `_class` or `_union` as suffixes |
