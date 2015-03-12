<?php
include_once('lib/Config.php');
use lib\Config;

// DB Config
Config::write('db.host', 'localhost');
Config::write('db.port', '');
Config::write('db.basename', 'setour');
Config::write('db.user', 'root');
Config::write('db.password', 'root');
// Project Config
Config::write('path', 'http://slim.devel/');
