<?php

include "defines.php";

if (file_exists(HWP_MU_PATH_CONF."conf.php")) {
    require_once HWP_MU_PATH_CONF."conf.php";
}

require_once HWP_MU_PATH_CONF."conf.def.php";


include HWP_PATH_SRC."dep-pannel/controller.php";
