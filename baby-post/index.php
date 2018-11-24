<?php

define('MAGENTO_DIR', __DIR__ . '/../'); // one step backward. for MAGENTO1 directory.
define('APP_PATH', __DIR__);

/**
 * For local database (not magento, but can be magento if tables are there.)
 **/
define('dbhost', 'localhost');
define('dbdatabase', 'baby_post');
define('dbuser', 'root');
define('dbpass', '');
define('dbprefix', ''); // leave this empty.
define('router', ['/' => ['controller'=>'index', 'action' =>'index'], '404' => ['controller'=>'index', 'action' =>'notfound']]);
define('debug', true);

// Nothing to modify below this line.
/**
 *	@author:	Farhan Islam <farhan@orvisoft.com>
 *	@script:	Magento1 interconnection.
 *
 **/

require_once('includes/autoload.php');