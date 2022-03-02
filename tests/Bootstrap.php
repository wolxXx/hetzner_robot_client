<?php
namespace HetznerRobotClientTest;

error_reporting(E_ALL | E_STRICT);

if (false === defined('IS_IN_TEST_ENV')) {
    define('IS_IN_TEST_ENV', true);
}

ini_alter('xdebug.var_display_max_data', '1000000');
ini_alter('xdebug.var_display_max_children', '1000000');
ini_alter('xdebug.var_display_max_depth', '1000000');

/**
 * Test bootstrap, for setting up autoloading
 */
class Bootstrap
{
    public static function init()
    {
        static::initAutoloader();
    }


    public static function chroot()
    {
        $rootPath = dirname(__DIR__);
        chdir($rootPath);
    }



    protected static function initAutoloader()
    {
      require_once __DIR__.\DIRECTORY_SEPARATOR.'..'.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'autoload.php';
    }
}

Bootstrap::init();
Bootstrap::chroot();