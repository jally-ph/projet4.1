<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />

    <!--INTERFACE TINYMCE -->
    <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea', 
    forced_root_block: "",
    force_br_newlines: true,
    force_p_newlines: false, });</script>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/mediaqueries.css">

    <!-- VIEWPORT -->
    <meta name="viewport" content="initial-scale=1">

    <!-- TITLE -->
    <title>Jean Forteroche. <?= $title ?></title>

    <!-- FAVICON -->
    <link rel="icon" type="image/gif" href="../public/img/logoJF.png" />

    <!-- FONTAWESOME -->
    <script src="https://kit.fontawesome.com/7e70710549.js"></script>

    

</head>