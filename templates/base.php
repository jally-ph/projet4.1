<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title><?= $title ?></title>
</head>
<body>

    <div id="content">
        <?php require_once ('navs/header.php'); ?>
        <?= $content ?>
    </div>

    <div>
        <?php require_once ('footer.php'); ?>
    </div>
</body>
</html>
