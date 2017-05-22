<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
opcache_reset();


include "../../conf/conf.def.php";
include "../../conf/conf.php";

$dbname=AZTH_DB_AUTH;

$connect = mysql_connect(AZTH_DB_HOST, AZTH_DB_USER, AZTH_DB_PASS) or die("Unable to Connect to '" . AZTH_DB_HOST . "'");

mysql_select_db($dbname) or die("Could not open the db '$dbname'");
$test_query = "SHOW TABLES FROM $dbname";
$result = mysql_query($test_query);
$tblCnt = 0;
while ($tbl = mysql_fetch_array($result)) {
    $tblCnt++;
    #echo $tbl[0]."<br />\n";
}
if (!$tblCnt) {
    echo "There are no tables<br />\n";
} else {
    echo "There are $tblCnt tables<br />\n";
}