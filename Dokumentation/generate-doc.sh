#!/usr/bin/env bash

SCRIPTPATH="$( cd "$(dirname "$0")" ; pwd -P )"
PROJECT_DIR="$SCRIPTPATH/../"

# generating html output
phpdoc -d "$PROJECT_DIR/src" -t "$SCRIPTPATH/html" --template="responsive-twig"

# generate README.md
cat "$SCRIPTPATH"/*.md > "$PROJECT_DIR"/README.md