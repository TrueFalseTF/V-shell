<?php

function errorOutputPDO($rPDO,  string $sMessage ) {
    echo $sMessage;
    print_r($rPDO->errorInfo());
    return;
}

