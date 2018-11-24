<?php
if(!defined('debug'))
    die("Direct calling of any script is strictly prohabited.");
/**
 *	@author:	Farhan Islam <farhan@orvisoft.com>
 *	@script:	Magento 1 interconnection for inventory update.
 **/
$time_start = microtime(true); 
$paths = array(
    APP_PATH .'/includes/lib/',
    APP_PATH .'/includes/controllers/',
    APP_PATH .'/includes/helpers/',
    APP_PATH .'/includes/models/',
);
// Add your class dir to include path
set_include_path(get_include_path(). PATH_SEPARATOR . implode(PATH_SEPARATOR, $paths));

// You can use this trick to make autoloader look for commonly used "My.class.php" type filenames
spl_autoload_extensions('.php');

// Use default autoload implementation
spl_autoload_register();

$system = new application();
$system->init();

if(debug){ // This will calculate the page execution time.
    $time_end = microtime(true);
    $execution_time = ($time_end - $time_start); // see seconds.
    echo '<hr /><b>Total Script Execution Time:</b> '.number_format((float) $execution_time, 4) .' Seconds';
}