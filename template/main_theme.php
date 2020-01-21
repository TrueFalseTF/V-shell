<?php
//include ("functions.php");
echo " main_theme ";
$sSortedColumn = "id";
$sHTML = "<hr>";
$rStatement = position_generator($rPDO, "main_theme", $sSortedColumn, false);
While($aRowSelectBD = $rStatement->fetch(PDO::FETCH_ASSOC)) {
    var_dump($aRowSelectBD);
    echo $sHTML;
}
