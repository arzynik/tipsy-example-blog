<?php
// this script will run after a successfull heroku deployment

// create the database
$url = parse_url(getenv('CLEARDB_DATABASE_URL'));

$out = shell_exec('mysql -u'.$url['user'].' -p'.$url['pass'].' -h'.$url['host'].' '.substr($url['path'], 1).' < install/db.sql 2>&1');

error_log($out);
