
Author: Mihai Brehar (Released: 20.07.2007)

##### What is Barebone MVC? 

Barebone MVC is a very simple framework which enables **clear, rapid and secure** development of PHP applications.
It is **modular, object oriented** and uses a **template system**.

Long story short: all parameters will be automatically checked for security. The required modules, functions and templates will be automatically called and loaded.

#####  How Barebone MVC works?

Basically, I want every single webpage to be called via index.php, so that I (and you) can have a better control of everything.
For this, I suggest the following URL "format":
```
http://domain.com/index.php?module=CdCollection&action=cdEdit&cd_id=3&other_param=1
```
Mark the module and action parameters, Barebone MVC will be looking for these.

First, let's talk about the module.
One module consists of 4 components:

  1. `/modules/CdCollection/CdCollection.class.php` - main PHP code for the module
  1. `/modules/CdCollection/CdCollectionSecurity.class.php` - PHP code responsible for module security
  1. `/modules/CdCollection/CdCollectionSeo.class.php` - PHP code responsible for SEO (search engine friendly URLs, for now)
  1. `/templates/CdCollection/` - if it's not clear yet, templates of the module are located here

The security and SEO part are not mandatory.

Every `ClassName.class.php` file should hold the `ClassName` class.

The dispatcher checks for the existence of the above mentioned folders, files and classes.

The `CdCollection` class should have a public method called `cdEdit`.

Security checks are done, see below:

If no error occurs, then the `CdCollection->cdEdit()` method is called and the `/templates/CdCollection/cdEdit.tpl` template is displayed.

#####   Security checks

Barebone MVC provides you a way to automatically check all `_GET`, `_POST` and `_COOKIE` parameters. You can enable/disable security checks using the `_SECURITY_ENFORCE` constants defined in the configuration file.

In order to check the above **`cd_id`** parameter, you must have a public function called **`check_GET_cd_id`** in the `CdCollectionSecurity` class. Same for **`other_param`**, you need a function called **`check_GET_other_param`**.

To check a `_POST` parameter, you will need a **`check_POST_paramName`** function.

#####   Template special functions

In order to be more flexible and allow easy integration of the SEO part, Barebone MVC has a smarty block function called **`a`** which should be used everywhere you have links.

Eg: Instead of inserting a link like
```html
<a href="index.php?module=CdCollection&amp;action=cdEdit&amp;cd_id=5">...</a>
```
the **`url`** function should be used like this:
```smarty
{a module="CdCollection" action="cdEdit" cd_id="5"}...{/a}
```

If you have a form, then you should use the similar **`url`** smarty function, like this:
```smarty
<form action="{url module="CdCollection" action="cdUpdate"}" method="post">
```

Some other things about the **`a`**/**`url`** smarty functions:

  * Either the `module` parameter or the `href` parameter must be given.
  * If the `action` parameter is missing, then the `defaultAction` value will be considered.
  * If a parameter's name starts with `seo_`, then the parameter will only be used internally and it will not be passed to the resulting URL
  * The `rel` and the `target` parameter given to the a block function, will be treated as their html counterparts.

#####  SEO component 

Barebone MVC can help you build search engine friendly URLs very easy.
The first step is to use the above mentiond **`a`**/**`url`** smarty functions.

Let's take this as an example:
```smarty
{a module="CdCollection" action="cdEdit" cd_id="5"}Abc def{/a}
```
The resulting link will look like
```html
<a href="http://www.domain.com/index.php?module=CdCollection&amp;action=cdEdit&amp;cdId=5">Abc def</a>
```
but we want something like this:
```html
<a href="http://www.domain.com/abc-def.html">Abc def</a>
```

Now the second step comes. You need to create the `/modules/CdCollection/class.CdCollectionSeo.php` file containing the **`CdCollectionSeo`** class. The **`CdCollectionSeo`** needs to have a public function called **`seo_cdEdit`**. This **`seo_cdEdit`** has an array as a parameter. For the given example, the array looks like this:
```php
array (
    "module" => "CdCollection", 
    "action" => "cdEdit", 
    "cdId"   => "5"
);
```
Basically, you have all the parameters passed to the **`a`**/**`url`** smarty function. Now it's a matter of choice on how you handle the parameters and how you return the string used in the SEF URLs.

Very important: you will have SEF URLs only if you set **`_USE_SEO_LINK`** to **`1`** in your **config/profile** file.

I will add more suggestions here, for optimizing this process. Also, I will add info about the server side settings(apache, mod-rewrite) needed for the URLs to work.
