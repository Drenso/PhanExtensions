#!/bin/bash -e
CURRENT_PATH=$PWD
for DIR in `find . -name .phan -type d`
do
  cp test.sh ${DIR}/../test.sh
  cd ${DIR}/../; ./test.sh ${CURRENT_PATH}/../; cd ${CURRENT_PATH}
done
