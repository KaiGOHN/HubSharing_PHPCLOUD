<?php
include 'cloud_config.php';
session_start();
if ($_SESSION['connecte']) {
    header("Location: fichiers.php" );
};
?>
<!DOCTYPE HTML>
<!--
	Solid State by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title><?php echo $nom_cloud; ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>
<body>

<!-- Page Wrapper -->
<div id="page-wrapper">

    <!-- Header -->
    <header id="header" class="alt">
        <h1><a href="index.php">Solid State</a></h1>
        <nav>
            <a href="#menu">Menu</a>
        </nav>
    </header>

    <!-- Menu -->
    <nav id="menu">
        <div class="inner">
            <h2>Menu</h2>
            <ul class="links">
                <li><a href="cv.php">Curriculums Vitæ</a></li>
            </ul>
            <a href="#" class="close">Close</a>
        </div>
    </nav>
    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <h2 class="major">Connexion</h2>
            <form method="post" action="connexion.php">
                <div class="field">
                    <label for="utilisateur">Nom d'utilisateur</label>
                    <input required type="text" name="utilisateur" id="utilisateur" />
                </div>
                <div class="field">
                    <label for="motdepasse">Mot de passe</label>
                    <input required type="password" name="motdepasse" id="motdepasse" />
                </div>
                <ul class="actions">
                    <li><input type="submit" value="Connexion" /></li>
                </ul>
            </form>
        </div>
    </section>
    <section id="footer">
        <div class="inner">
            <ul class="copyright">
                <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>
        </div>
    </section>

</div>

<!-- Scripts -->
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>

</body>
</html>