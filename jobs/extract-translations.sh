#!/bin/sh

set -e

slug="$1"
if [ -z "$slug" ]
then
    slug=$( basename $( pwd ) )
fi
if [ -z "$slug" ]
then
    echo Error: slug was not provided explicitly and could not have been figured out implicitly.
    exit 1
fi

output=languages/$slug.pot
echo Compiling plugin translations into pot file: $output
mkdir -p languages
vendor/bin/wp i18n make-pot . ./$output \
  --include=$( jobs/.files.sh | sed -e 's/ /,/g' )
