<?php

function position_generator($rPDO, string $sTable, string $sSortedColumn, bool $bOriginality = false, ...$aColumns) {
    //***//
    //$rPDO - PDO объект
    //$sTable - таблица из которой выводятся значения
    //$sSortedColumn - колонка по которой сортируется выборка
    //$bOriginality и $aColumns - выборка только оригинальных и по каким колонкам
    //***//

    $sorted_isset = $sSortedColumn ? " ORDER BY `".$sSortedColumn."`" : "";

    if($bOriginality === true) {
        $columns = NULL;

        foreach ($aColumns as $column){
            if (!isset($columns)) {
                $columns = "`".$column."`";
            };
            $columns = $columns.", `".$column."`";
        };

        $query = "SELECT DISTINCT ".$columns." FROM ".$sTable.$sorted_isset;
    } else if($bOriginality == false){
        $query = "SELECT * FROM ".$sTable.$sorted_isset;
    }

    $rStatement = $rPDO->prepare($query);

    if (!$rStatement)
        errorOutputPDO($rPDO, $rStatement,"!position fall prepare!");

    $bExecution = $rStatement->execute();
    if (!$bExecution)
        errorOutputPDO($rPDO, $rStatement, "!position fall execute!");


    var_dump ($bExecution);

    $n = mysqli_num_rows($result);
    if($n == 0){
        clearing_table($link, $sTable);
    }
    $position =  array();

    for ($i = 0; $i < $n; $i++)
    {
        $row = mysqli_fetch_assoc($result);
        $position[] = $row;
    }

    return $position;
}

function clearing_table($link, $sTable) {
    $query = "TRUNCATE TABLE ".$sTable;

    $result_clearing = mysqli_query($link, $query);
    if (!$result_clearing)
        die(mysqli_error($link));
}

function errorOutputPDO($rPDO, $rStatement, string $sMessage ) {
    print_r( $sMessage);
    print_r("<br>");

    $aErrorLog = $rStatement->errorInfo();
    print_r( $aErrorLog);
    print_r("<br>");

    $aErrorLog = $rPDO->errorInfo();
    print_r( $aErrorLog);
    print_r("<br>");

    return;
}

