<?php

namespace Hwp;

if (isset($_GET["drsl-cmd"]) && $_GET["drsl-cmd"] == "run-test") {
    require_once HWP_PATH_WP . 'wp-load.php';

    require_once 'tests/html.php';
} else {
    define('WP_USE_THEMES', true);

    /** Loads the WordPress Environment and Template */
    require_once HWP_PATH_WP . 'wp-blog-header.php';
}
