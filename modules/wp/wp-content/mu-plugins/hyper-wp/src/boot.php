<?php

define("HWP_MU_PATH_SRC", HWP_MU_PATH_ROOT."src/");

require_once HWP_MU_PATH_SRC . "defines.php";

require_once HWP_MU_PATH_CONF . "conf.def.php";

if (file_exists(HWP_MU_PATH_CONF . "conf.php")) {
    require_once HWP_MU_PATH_CONF . "conf.php";
}
