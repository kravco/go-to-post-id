#!/bin/sh

set -e

slug=$( jobs/.files.sh | head -n1 | cut -d' ' -f1 | cut -d. -f1 )

vendor/bin/wp i18n make-pot . languages/$slug.pot \
  --include=$( jobs/.files.sh | sed -e 's/ /,/g' ) \
  --headers='{"POT-Creation-Date":"2025-08-12T23:43:55+02:00"}' \
  --file-comment='Copyright (C) 2016 Matej Kravjar\nThis file is distributed under the GPLv2+.'

vendor/bin/wp i18n update-po languages/*.pot
