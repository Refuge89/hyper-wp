<?php

namespace Drsl;


$dev_cookie=isset($_COOKIE['enable_dev']) && $_COOKIE['enable_dev']==1;
defined("DRSL_DEV_MODE") OR define("DRSL_DEV_MODE", $dev_cookie);
