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

def shell_exec(cmd):
    return subprocess.Popen(cmd, stdout=subprocess.PIPE, shell=True).stdout.read().decode('utf-8').rstrip()

if 1 == len(sys.argv):
    print('Error: Invalid command line. Specify the project name.')
    exit(1)

env = os.environ
final_cmd = 'gcc '
project_file = sys.argv[1] + '.project.yml'
stream = file(project_file, 'r')
data = yaml.load(stream)


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
        
final_cmd += ' -DFalse="((gboolean) (0 != 0))" '
final_cmd += ' -DTrue="((gboolean) (0 == 0))" '
final_cmd += ' -DNULL_PTR="((void*) 0)" '

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
