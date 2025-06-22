#!/bin/bash
CURR_DIR=$(dirname $0)
PROJECT_DIR=$CURR_DIR

if [[ -n $ENVIRONMENT && $ENVIRONMENT != 'local' ]] ; then
  echo 'test only for local environment'
  exit 1
fi

export ENVIRONMENT=local

cat $PROJECT_DIR/.env.${ENVIRONMENT} > $PROJECT_DIR/.env
cat $PROJECT_DIR/.env.testing >> $PROJECT_DIR/.env
cat $PROJECT_DIR/.env.general >> $PROJECT_DIR/.env

docker compose build app
docker compose up app

./make-env.sh ${ENVIRONMENT}
docker compose up --watch app
unset ENVIRONMENT
