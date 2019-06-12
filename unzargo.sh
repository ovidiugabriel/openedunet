#!/bin/bash

# unzip .zargo archive
# this may be useful to commit an ArgoUML project into git

set -x

assert_exists() {
    # TODO: add implementation
    echo $1
}

unzip $1.zargo "${@:1}"

assert_exists $1.argo
assert_exists ${1}_ClassDiagram.pgml
assert_exists ${1}_profile.profile
assert_exists $1.todo
assert_exists ${1}_UseCaseDiagram.pgml
assert_exists $1.xmi
