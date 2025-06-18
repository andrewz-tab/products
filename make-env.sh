#!/bin/sh
CURR_DIR=$(dirname $0)
PROJECT_DIR=$CURR_DIR
ENVIRONMENT=$1

cat $PROJECT_DIR/.env.${ENVIRONMENT} > $PROJECT_DIR/.env
cat $PROJECT_DIR/.env.general >> $PROJECT_DIR/.env