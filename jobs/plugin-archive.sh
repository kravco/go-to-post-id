#!/bin/sh

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

version="$2"
if [ -z "$version" ]
then
    version=$( git describe --tags --exact-match 2>/dev/null )
    if [ $? -ne 0 ]
    then
        version=$(
            <$slug.php grep '^[[:space:]]*\*\?[[:space:]]*Version:' \
            | head -n1 | cut -d: -f2- | sed 's/^[[:space:]]\+\|[[:space:]]\+$//g'
        )
    fi
fi
if [ -z "$version" ]
then
    echo Error: version was not provided explicitly and could not have been figured out implicitly.
    exit 2
fi

if [ -f .distinclude ]
then
    echo Generating ignore file for plugin archive: .distignore
    echo '*' >.distignore
    <.distinclude sed 's/^/!/' >>.distignore
fi

jobs/extract-translations.sh $slug

output=$slug.$version.zip
echo Generating plugin archive into zip file: $output
vendor/bin/wp dist-archive . ./$output
