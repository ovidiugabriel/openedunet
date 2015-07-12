###### Usages

```bash
# Build a project with no-clean mode
python buildpro.py projectname

# Build a project with clean enabled
clean=1 python buildpro.py projectname

python buildpro.py -proto language classfilepath
# Example:
python buildpro.py -proto haxe barebone/Cookie.class.php
```

###### Project File

The file `<project_name>.project.yml` is an [YAML](http://www.yaml.org/spec/1.2/spec.html) file, and contains the following sections:

* `defines` : dictionary (key:string, value:string)
* `includes` : list of strings (in `qmake` it is called `INCLUDEPATH`)
* `sources` : list of strings
* `library_paths` : list of strings
* `libraries`: list of strings (in `qmake` both `library_paths` and `libraries` were included in `LIBS`)
* `artifact` : dictionary (key:string, value:string) - `artefact` is also supported since it is more common everywhere outside North America.

```yaml
defines:
  False: 0
  True: 1
  NULL_PTR: 0

includes: # in qmake it is called INCLUDEPATH
  - /usr/includes

sources:
  - main.c

library_paths:
  - /usr/lib

libraries:
  - glibc

artifact:
  name: main

command:
  gcc -c {input} -o {artifact.name}

```
Online Resources:
* [YAML 1.2 Specification](http://www.yaml.org/spec/1.2/spec.html)
* [Online YAML Parser](http://yaml-online-parser.appspot.com/)
* [Python YAML Parser - pyYAML](http://pyyaml.org/wiki/PyYAMLDocumentation)

###### YAML Library Dependencies

**buildpro** is based on PyYAML library, so you need to install **PyYAML** before starting with **buildpro**

1. download PyYAML 3.11 from [PyYAML Page](http://pyyaml.org/wiki/PyYAML)
2. Run `python setup.py install`

```bash
wget http://pyyaml.org/download/pyyaml/PyYAML-3.11.tar.gz
tar -zxvf PyYAML-3.11.tar.gz
cd PyYAML-3.11/

sudo python setup.py install
```

Note: For GCC dependencies can be generated with: ` gcc [options] -MM <name>.c -MF <name>.d  `
