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

echo Compiling plugin translations into pot file slug=$slug
mkdir -p languages
vendor/bin/wp i18n make-pot . languages/$slug.pot \
  --include=$( jobs/.files.sh | sed -e 's/ /,/g' )
