<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title>Title</title>

    <link rel="stylesheet" href="<?= \App\Core\App::assets() ?>bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?= \App\Core\App::assets() ?>css/style.css" type="text/css">

    <script src="<?= \App\Core\App::assets() ?>js/jquery-3.3.1.js"></script>
    <script src="<?= \App\Core\App::assets() ?>js/jquery.cookie.js"></script>
    <script src="<?= \App\Core\App::assets() ?>js/files.js"></script>
    <script src="<?= \App\Core\App::assets() ?>js/folders.js"></script>
    <script src="<?= \App\Core\App::assets() ?>js/main.js"></script>
</head>
<body>

<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
</nav>

<div class="container app-container">
    <div class="row">
        <div class="col-3 folders-block element">
            Folders:
            <div class="sidebar"></div>
        </div>

        <div class="col-9 files-block element">Files</div>

    </div>
</div>

<?php require $content.'.php'; ?>
<footer class="footer">
    <strong></strong>
</footer>
</body>
</html>
