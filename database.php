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

    /*
    $link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB)
    or die("Error: " . mysqli_error($link));
    if (!mysqli_set_charset($link, "utf8")) {
        print("Error: " . mysqli_error($link));
    }
    $mysql_db = MYSQL_DB;

    $result_USE = mysqli_query($link,
        "USE " . $mysql_db);
    if (!$result_USE)
        die(mysqli_error($link));*/

    $rStatementMainTheme = $rPDO->prepare(
        "create table if not exists main_theme
                                    (
                                            id int auto_increment primary key,
                                            title varchar(250) null
                                    );
                           ");
    if (!$rStatementMainTheme)
        errorOutputPDO($rPDO,"rPDO->prepare:/n");

    $rStatementMainTheme->execute();
    if (!$rStatementMainTheme)
        errorOutputPDO($rPDO,"execute:/n");


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
        errorOutputPDO($rPDO,"rPDO->prepare:/n");
    $rStatementArticles->execute();
    if (!$rStatementArticles)
        errorOutputPDO($rPDO,"execute:/n");


    return $rPDO;
}

?>