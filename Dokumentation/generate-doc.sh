#!/usr/bin/env bash

SCRIPTPATH="$( cd "$(dirname "$0")" ; pwd -P )"
PROJECT_DIR="$SCRIPTPATH/../"

# generating html output
phpdoc -d "$PROJECT_DIR/src" -t "$SCRIPTPATH/html" --template="responsive-twig"

# generate README.md
cat "$SCRIPTPATH"/Introduction.md \
    "$SCRIPTPATH"/Table_of_Contents.md \
    "$SCRIPTPATH"/Mobile_device_helper_functions.md \
    > "$PROJECT_DIR"/README.md