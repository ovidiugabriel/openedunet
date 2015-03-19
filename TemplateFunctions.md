[patTemplate](http://trac.php-tools.net/patTemplate)

[phpHtmlLib](http://phphtmllib.newsblob.com/)

## Placeholders for string interpolation ##

```
// using various sigil styles
// encountered in Bash, Perl, PHP, Smarty, etc.

{$varname}  // used by Smarty and PHP
${varname}
$(varname)
$varname    // used by PHP

// using variable name in curly braces
// encountered and Pyhton and some template engines
{varname}

// using percent prefix
// encountered in proprietary platforms like IBM and Microsoft
%varname
%varname%

#varname#
"#{varname}" // ruby style
:varname
?
{0}, {1}

// More complex
%( expression )
%[ expression ] 
%{ expression } 
%< expression >

%%expression%

%!delimiter\!! # escape '!' literal

\(varname)

<# expression #>
<% expression %>

```


### `assign()` ###

```
assign(string name, variant var)
assign(dictionary var)
```