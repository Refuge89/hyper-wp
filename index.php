<?php

namespace Hwp;

$dev_cookie = isset($_COOKIE['enable_dev']) && $_COOKIE['enable_dev'] == 1;
defined("HWP_DEV_MODE") OR define("HWP_DEV_MODE", $dev_cookie);

if (isset($_GET["with_errors"])) {
    setcookie("enable_errors", $_GET["with_errors"] == "true" ? 1 : 0, time() + (3600 * 3600), "/", $domain);
}

$enable_errors = isset($_COOKIE['enable_errors']) && $_COOKIE['enable_errors'] == 1;

if ($enable_errors) {
    define("HWP_ERRORS_ON", true);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

$subdomain=(explode(".", $_SERVER['HTTP_HOST']));
$subdomain = array_shift($subdomain);

if (isset($_GET["enable_dev"]) || $subdomain == "dev" || $subdomain == "prod") {
    $domain = $_SERVER['HTTP_HOST'];
    $dev_mode = $_GET["enable_dev"] == "true" || $subdomain == "dev";
    setcookie("enable_dev", $dev_mode ? 1 : 0, time() + (3600 * 3600), "/", $domain);
    echo "Developing mode " . ($dev_mode ? "activated" : "deactivated")
    . " <a href='" . $_SERVER['REQUEST_SCHEME'] . '://' . $domain . "'>Refresh</a> this page";
    die();
}

if (isset($_GET["op_cache"]) && $_GET["op_cache"] == "reset") {
    if ($dev_cookie) {
        die("cannot reset opcache in development mode");
    }

    echo "opcache reset";
    opcache_reset();
}

define("HWP_WEB_RUN", true);

require_once "defines.php";

// if phar archive exists then load it instead of sources
$phar = HWP_PATH_BIN . DS . "hwpweb.phar";
require_once ( file_exists($phar) ? $phar : HWP_PATH_SRC . DS . "boot.php");
