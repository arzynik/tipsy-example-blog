<?php
// this script will run after a successfull heroku deployment

// create the database
$url = parse_url(getenv('DATABASE_URL'));
passthru('mysql -u'.$url['user'].' -p'.$url['pass'].' -h'.$url['host'].' '.substr($url['path'], 1).' < install/db.sql.sql');
