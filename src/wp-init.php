<?php

namespace Hwp;

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */

define('HWP_PATH_WP', HWP_PATH_MODULES . DS . 'wp' . DS);

if (!defined("ABSPATH")) // if wordpress hasn't been started yet
    require_once HWP_IS_CLI ? "wp-init-cli.php" : "wp-init-html.php";
