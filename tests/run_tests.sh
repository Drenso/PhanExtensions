#!/usr/bin/env bash
TOPLEVEL=$PWD
for d in `find . -name .phan -type d`
do
  cp test.sh $d/../test.sh
  cd $d/../; ./test.sh ; cd $TOPLEVEL
done
