<?php
//include ("functions.php");
echo " articles ";
$sSortedColumn = "id";
$sHTML = "<hr>";
$rStatement = position_generator($rPDO, "articles", $sSortedColumn, false);
While($aRowSelectBD = $rStatement->fetch(PDO::FETCH_ASSOC)) {
    var_dump($aRowSelectBD);
    echo $sHTML;
}
