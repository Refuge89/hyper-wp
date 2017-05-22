<?php

namespace Hwp;

define("HWP_IS_CLI", php_sapi_name() === 'cli');
define("HWP_NS", __NAMESPACE__ . '\\');

defined("DS") or define('DS', DIRECTORY_SEPARATOR);

define("HWP_PATH_ROOT_CUR", dirname(__FILE__));
// if hwcore is symlinked , it's the original path
define("HWP_PATH_ROOT", realpath(HWP_PATH_ROOT_CUR));
define("HWP_PATH_GLOBAL", realpath(HWP_PATH_ROOT . DS . ".." . DS));
define("HWP_PATH_SRC", HWP_PATH_ROOT . DS . "src".DS);
define("HWP_PATH_CONF", HWP_PATH_ROOT . DS . "conf".DS);
define("HWP_PATH_BIN", HWP_PATH_ROOT . DS . "bin".DS);
define("HWP_PATH_MODULES", HWP_PATH_ROOT . DS . "modules".DS);
define("HWP_PATH_PHP_MODULES", HWP_PATH_MODULES . DS . "php_modules".DS);