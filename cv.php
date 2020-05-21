<?php
include 'cloud_config.php';
session_start();
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
        <h1><a href="index.php"><?php echo $nom_cloud; ?></a></h1>
        <nav>
            <a href="#menu">Menu</a>
        </nav>
    </header>

    <!-- Menu -->
    <nav id="menu">
        <div class="inner">
            <h2>Menu</h2>
            <ul class="links">

                <?php if ($_SESSION['connecte']) {
                    echo "<li><a href=\"fichiers.php\">Fichiers</a></li>";
                    echo "<li><a href=\"deconnexion.php\">Déconnexion</a></li>";
                } else {
                    echo "<li><a href=\"index.php\">Accueil</a></li>";
                };
                ?>
            <a href="#" class="close">Close</a>
        </div>
    </nav>

    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <div class="logo"><span class="icon fa-diamond"></span></div>
            <h2><?php echo $nom_cloud; ?></h2>
            <p>Curriculums Vitæ</a></p>
        </div>
    </section>

    <!-- Wrapper -->
    <section id="wrapper">
        <style>
            .titrecv {
                text-decoration: underline;
                font-weight: bold;
                text-transform: uppercase;
            }
        </style>
        <!-- One -->
        <section id="one" class="wrapper spotlight style1">
            <div style="text-align: left;" class="inner">
                <a href="#" class="image"><img src="images/A.png" alt="" /></a>
                <div class="content">
                    <h2 class="major">AGOSTINI THIBAUD aka The Beast</h2>
                    <p class="titrecv">Formation :</p>
                    <p>Faculté des Sciences de Montpellier, Montpellier - Etudient en première année d'une licence en informatique - 2017 - présent </p>
                    <p class="titrecv"> Expérience : </p>
                    <p> Employé dans une société de handling, Satab - Avril 2017 - Septembre 2017
                        - Agent de passage pour la Satab Handling à l'aéroport de Bastia-Poretta </p>
                    <p class="titrecv"> Etude : </p>
                    <p> Lycée Giocante de Casabianca, Bastia - Baccalauréat scientifique (mention assez bien) </p>
                    <a href="http://163.172.155.152/telechargement.php?lt=Beastmode%2FCV%2520of%2520the%2520Beast.pdf" class="special">Télécharger le CV</a>
                </div>
            </div>
        </section>
        <!-- Two -->
        <section id="two" class="wrapper alt spotlight style2">
            <div style="text-align: right;" class="inner">
                <a href="#" class="image"><img src="images/B.png" alt="" /></a>
                <div class="content">
                    <h2 class="major">BESSAGUET Benjamin </h2>
                    <p class="titrecv">Formation :</p>
                    <p>Faculté des Sciences de Montpellier, Montpellier - Etudient en première année d'une licence en informatique - 2017 - présent </p>
                    <p class="titrecv"> Expérience : </p>
                    <p> Travail saisonnier dans le restaurant " Chez Paul " à Saint Gely du Fesc durant l'été 2017 - Ainsi que dans un bureau de tabac</p>
                    <p class="titrecv"> Etude : </p>
                    <p> Lycée Jean Jaures, St Clément de Riviere - Baccalauréat scientifique </p>
                </div>
            </div>
        </section>

        <!-- Three -->
        <section id="three" class="wrapper spotlight style3">
            <div style="text-align: left;" class="inner">
                <a href="#" class="image"><img src="images/D.png" alt="" /></a>
                <div class="content">
                    <h2 class="major">DAUD&Eacute; MONDET LO&Iuml;c</h2>
                    <p class="titrecv">Formation :</p>
                    <p>Faculté des Sciences de Montpellier, Montpellier - Etudient en première année d'une licence en informatique - 2017 - présent </p>
                    <p class="titrecv"> Etude : </p>
                    <p> Lycée Notre Dame de La Merci, Montpellier - Baccalauréat scientifique (mention très bien) </p>
                </div>
            </div>
        </section>

        <!-- Four -->


    </section>

    <!-- Footer -->
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