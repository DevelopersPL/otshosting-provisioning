<?php
// AT MINIMUM UNCOMMENT AND CONFIGURE ONE OF THE FOLLOWING OPTIONS:

// OPTION ONE: READ MYSQL CONFIG FROM config.lua - RECOMMENDED
define('TFS_CONFIG', '/home/otsmanager/forgottenserver/config.lua');

// OPTION TWO: SPECIFY MYSQL CONNECTION DETAILS HERE
// define('TFS_CONFIG', array('mysqlHost' => '127.0.0.1', 'mysqlDatabase' => 'tfs', 'mysqlUser' => 'tfs', 'mysqlPass' => 'tfs'));
// THIS OPTION IS DISCOURAGED AS SOME CODE MIGHT DEPEND ON OTHER VALUES FROM TFS CONFIG

// IF YOU WANT TO CHANGE SOMETHING ELSE, BE SMART AND FOLLOW THE PATTERN
defined('TFS_ROOT') or define('TFS_ROOT', '/home/otsmanager/forgottenserver');
define('CORS_ALLOW_ORIGIN', '*');
define('ENABLE_DEBUG', false);
