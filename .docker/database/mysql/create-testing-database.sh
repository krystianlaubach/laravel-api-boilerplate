#!/usr/bin/env bash

mysql --user=root --password="$MYSQL_ROOT_PASSWORD" <<-EOSQL
    CREATE DATABASE IF NOT EXISTS testing_data;
    GRANT ALL PRIVILEGES ON \`testing_data%\`.* TO '$MYSQL_USER'@'%';
EOSQL
