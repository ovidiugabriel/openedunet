# openedunet
Automatically exported from `code.google.com/p/openedunet`

### About ###

Integrated e-learning platform and content management system, with support for teaching and learning, for tests and evaluations, for managing the educational content, for monitoring the educational system and creating the curricula.

Current license of this project is [Modified BSD License](https://code.google.com/p/openedunet/wiki/License). Content is Licensed under: [Creative Commons Attribution-ShareAlike 3.0 Unported](https://creativecommons.org/licenses/by-sa/3.0/legalcode)

The the core of **openedunet LMS** (Open Education Network Learning Management System) was originally based on **Barebone MVC** and it was called **oencore** (openedunet Core).

This page is also hosting the current version of [Barebone MVC]() Framework.

Official project website is: [http://www.openedunet.org/]([http://www.openedunet.org/)

### Trunk Checkout ###

If you plan to make changes, use this command to check out the code as yourself using HTTPS:

```
svn checkout https://github.com/ovidiugabriel/openedunet/trunk
```

When prompted, enter your github user and password.

### Framework Releases ###

| Release | Date      | Requires | File                                                 | MD5 checksum                     |
|---------|-----------|----------|------------------------------------------------------|----------------------------------|
| 0.2.0   | July 2007 | PHP 5.x  | [bbmvc-0.2.0.zip](http://www.icecontrol.eu/downloads/bbmvc-0.2.0.zip) | 11310c1c5d8e4ce5404fcaa3fde6fb8b |

### Changelist ###

22.03.2015
  - We started using [Travis CI](https://travis-ci.org)
  - We moved to get most of dependencies using [composer](https://getcomposer.org/)

20.03.2015 
  - We moved to [github](https://github.com/) - because Google announced that Project Hosting on Google Code will close on January 25th, 2016
  - [Google Code Wiki Syntax](https://code.google.com/p/support/wiki/WikiSyntax) becomes deprecated; from now on the entire documentation will be written using [Markdown](https://help.github.com/articles/markdown-basics/) ; [Creole](http://en.wikipedia.org/wiki/Creole_%28markup%29) is also tolerated for the Wiki pages since it is supported by github.

13.02.2015
  - We decided to start using [tup](http://gittup.org/tup/) for our builds

17.01.2015
  - We integrated **React 1.0** to be used in reactive programming on the client side

12.11.2014
  - We decided to make Barebone MVC framework API available to [Haxe](http://haxe.org/) scripts. So it will be possible to write modules (controllers and models) directly in Haxe with PHP target.

05.09.2014
  - We started to add web runtime support for CGI scripts written in Ch; [Ch: A C/C++ Interpreter for Script Computing](http://www.drdobbs.com/cpp/ch-a-cc-interpreter-for-script-computing/184402054?pgno=1)


[PHP 7 Scalar Type Hinting Finally Approved](http://www.phpclasses.org/blog/post/269-PHP-7-Scalar-Type-Hinting-Finally-Approved.html)
