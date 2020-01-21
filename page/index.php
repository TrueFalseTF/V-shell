<?php
    $sTemplateInclude = NULL;
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./page/css/style.css">
</head>
<body>
    <div class="theme_menu">
        <h1>Главные темы</h1>
        <?php
            include("template/articles.php");
        ?>
    </div>
    <div class="articles_box">
        <h2>Статьи</h2>
        <?php
            include("template/main_theme.php");
        ?>
    </div>
</body>
</html>

