http://www.yaml.org/spec/1.2/spec.html


```
defines:
  False: 0
  True: 1
  NULL_PTR: 0

includes:
  - stdint.h
  - stdbool.h

sources:
  - main.c

library_paths:
  - /usr/lib

libraries:
  - glibc

artifact:
  name: main

```
