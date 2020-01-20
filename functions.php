<?php

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

