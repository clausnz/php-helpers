#!/usr/bin/env bash

SCRIPTPATH="$( cd "$(dirname "$0")" ; pwd -P )"
PROJECT_DIR="$SCRIPTPATH"/../..
TEMPLATE_DIR="$PROJECT_DIR"/vendor/cvuorinen/phpdoc-markdown-public/data/templates/markdown-public
README="README.md"
PHP_FILE="create-function-doc.php"
FUNC_FILE="Table_of_Content_Functions.md"

# generate api doc
"$PROJECT_DIR"/vendor/bin/phpdoc \
    -d "$PROJECT_DIR"/src \
    -t "$PROJECT_DIR"/doc/tmp \
    --template="$TEMPLATE_DIR"

# move README.md to the doc directory
mv "$PROJECT_DIR"/doc/tmp/"$README" "$PROJECT_DIR"/doc/

# delete public README.md
rm "$PROJECT_DIR"/"$README"

# create function doc
php "$PROJECT_DIR"/doc/bin/"$PHP_FILE"

# create README.md.bak
cat "$PROJECT_DIR"/doc/"$FUNC_FILE" \
    "$PROJECT_DIR"/doc/"$README" \
    > "$PROJECT_DIR"/doc/"$README".tmp

# delete old README.md and function-file
rm "$PROJECT_DIR"/doc/"$README" \
   "$PROJECT_DIR"/doc/"$FUNC_FILE"

# rename tmp file
mv "$PROJECT_DIR"/doc/"$README".tmp "$PROJECT_DIR"/doc/"$README"

# generate public GitHub README.md
cat "$PROJECT_DIR"/doc/About.md \
    "$PROJECT_DIR"/doc/Install.md \
    "$PROJECT_DIR"/doc/"$README" \
    > "$PROJECT_DIR"/"$README"

# clean up
rm -rf "$PROJECT_DIR"/doc/tmp