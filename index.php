<?php
include ("database.php");
$rPDO = db_connect();
var_dump($rPDO);
include ("page/index.php");