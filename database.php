<?php
include ("functions.php");

function db_connect()
{
    $dsn = 'mysql:dbname=v-shell;host=localhost';
    $user = 'root';
    $password = '';

    try {
        $rPDO = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        exit('Подключение не удалось: ' . $e->getMessage());
    }

    $rStatementMainTheme = $rPDO->prepare(
        "create table if not exists main_theme
                                    (
                                            id int auto_increment primary key,
                                            title varchar(250) null
                                    );
                           ");

    if (!$rStatementMainTheme)
        errorOutputPDO($rPDO, $rStatementMainTheme,"\nrPDO->prepare:\n");

    $bExecution= $rStatementMainTheme->execute();
    if (!$bExecution)
        errorOutputPDO($rPDO, $rStatementMainTheme, "execute:\n");


    $rStatementArticles = $rPDO->prepare(
        "create table if not exists articles
                                    (
                                        id           int auto_increment
                                            primary key,
                                        res_id       int          not null,
                                        title        varchar(250) null,
                                        descriptions varchar(765) null,
                                        edit_date    datetime     null,
                                        FOREIGN KEY (res_id) REFERENCES main_theme (id)
                                    );
                     ");
    if (!$rStatementArticles)
        errorOutputPDO($rPDO, $rStatementArticles, "rPDO->prepare:\n");
    $bExecution = $rStatementArticles->execute();
    if (!$bExecution)
        errorOutputPDO($rPDO, $rStatementArticles, "execute:\n");

    return $rPDO;
}

?>