#!/usr/bin/python

#
# The main idea of this tool is that it can generate tupfiles, makefiles, etc.
# Or it can pass strings directly to your favourite compiler, gcc, dmc, etc.
#
 
#
# After binary artifact is generated, unit-test is performed, and test report
# with test coverage is displayed
#

#
# This tool is using YAML format.
# http://pyyaml.org/wiki/PyYAMLDocumentation
#

import sys
import os
import subprocess
import yaml
import re

#
# Executes command via shell and return the complete output as a string
#
def shell_exec(cmd):
    return subprocess.Popen(cmd, stdout=subprocess.PIPE, shell=True).stdout.read().decode('utf-8').rstrip()

#
# Generates the Lua Script code for the Tupfile
# The key in dictionary is the list of inputs (separated with spaces)
# while the value is a (command, output) vector
#
def get_tupfile(deps):
    COMMAND = 0;
    OUTPUT  = 1;
 
    tup_out = ''
    for key in deps:
        tup_out += (': ' + key + ' |> ' + deps[key][COMMAND] + ' |> ' + deps[key][OUTPUT] + "\n")
    return tup_out

if 1 == len(sys.argv):
    print('Error: Invalid command line. Specify the project name.')
    exit(1)

env = os.environ
# TODO: `final_cmd` must be formatted as specified in the .project.yml file.
# The `final_cmd` may be used to run the compiler directly but also to generate Tupfile
final_cmd = 'gcc '
project_file = sys.argv[1] + '.project.yml'
stream = file(project_file, 'r')
data = yaml.load(stream)

# FIXME: As it is implemented now, it works only with GCC.

# http://scribu.net/blog/python-equivalents-to-phps-foreach.html

# Includes paths
if data['includes'] != None:
    # https://wiki.python.org/moin/HandlingExceptions
    try:
        include_paths = []
        for (key, value) in enumerate(data['includes']):
            value = value.format(**env).replace('$', '')
            data['includes'][key] = value
            include_paths.append('-I' + value)

        final_cmd += (' '.join(include_paths) + ' ')
    except KeyError, ex:
        print('Key Error: Undefined environment variable ${' + str(ex).strip("'") + '}')
        exit(1)
        
defines = {}
defines['False'] = '0'
defines['True']  = '1'

cdefs = []
for key in defines:
    cdefs.append('-D' + key + '=' + defines[key])
final_cmd(' ' +  ' '.join(cdefs) + ' ')

for value in data['sources']:
    final_cmd += value + ' '

if 'library_paths' in data:
    libpaths = []
    for value in data['library_paths']:
        libpaths.append('-L' + value)
    final_cmd += (' ' + ' '.join(libpaths) + ' ')

#
# the libs have to go after sources list 
# don't ask me why, I don't know, but the order seems to be required
#
libraries = []
for value in data['libraries']:
    libraries.append('-l' + value)
final_cmd += (' ' + ' '.join(libraries) + ' ')


# append artifact name
output = data['artifact']['name']
final_cmd += ' -g -o ' + output

print(final_cmd)
print(shell_exec(final_cmd))

if os.path.isfile('./' + output):
  print('### Running ' + output + ' ... ###');
  print(shell_exec('./' + output))

# Scanning dependencies ...

f = open('main.d') # FIXME: remove this hardcoded value
text = f.read()

m = re.search('(.*):(.*)', text)
output = m.group(1)
inputs = m.group(2).strip().split(' ')

# map will be given as input
deps = {}
# TODO: the command must be read from the .project.yml file
deps[' '.join(inputs)] = ['gcc -c {input} -o {output}'.format(input=inputs[0], output=output), output]

# print(get_tupfile(deps))







