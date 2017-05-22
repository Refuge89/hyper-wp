<?php

namespace Hwp;

$conf=HWP_PATH_ROOT . DS . 'conf' . DS . 'conf.php';
file_exists($conf) && require_once $conf;
unset($conf);

require_once HWP_PATH_ROOT . DS . 'conf' . DS . 'conf.def.php';

// composer autoload
require_once HWP_PATH_PHP_MODULES . DS . "autoload.php";

require_once HWP_PATH_SRC . DS . "wp-init.php";
