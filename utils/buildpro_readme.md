The file `project_name.project` is an YAML file, and contains the following sections:
* `defines` : dictionary (string,string)
* `includes` : list of strings
* `sources` : list of strings
* `library_paths` : list of strings
* `libraries`: list of strings
* `artifact` : dictionary (string,string) - `artefact` is also supported since it is more common everywhere outside North America.

[YAML 1.2 Specification](http://www.yaml.org/spec/1.2/spec.html)

[Online YAML Parser](http://yaml-online-parser.appspot.com/)

```
defines:
  False: 0
  True: 1
  NULL_PTR: 0

includes:
  - /usr/includes

sources:
  - main.c

library_paths:
  - /usr/lib

libraries:
  - glibc

artifact:
  name: main

```
