<?php
include 'cloud_config.php';
$lien = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(isset($_GET['lt'])){
    $lt = $_GET['lt'];
    $emplacement =  realpath($chemin_cloud ."/".$lt);

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
        <h1><a href="index.html">Solid State</a></h1>
        <nav>
            <a href="#menu">Menu</a>
        </nav>
    </header>

    <!-- Menu -->
    <nav id="menu">
        <div class="inner">
            <h2>Menu</h2>
            <ul class="links">
                <li><a href="fichiers.php">Fichiers</a></li>
            </ul>
            <a href="#" class="close">Close</a>
        </div>
    </nav>

    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <div class="logo"><span class="icon fa-download"></span></div>
            <?php
            if ($emplacement === false || strncmp($emplacement, $chemin_cloud, strlen($chemin_cloud)) !== 0) {
                echo "<script type=\"text/javascript\">window.alert(\"Emplacement non authorisé ou introuvable;\");</script>";
            }
            else {
                $nom = rawurldecode(basename($emplacement));
                echo "<h2>".$nom."</h2>";
                echo "<a class=\"button\" href=\"telechargement_d.php?lt=".rawurlencode($lt)."\">Télécharger</a>";

            };
            ?>
            <button class="button special" onclick="fonctionPartage()">Partager</button><br>
            <style>
                  .partage{
                      margin-top: 5px;
                  }
            </style>
            <div class="partage" id="partagelien"></div>
            <div class="partage" id="partagetwitter"></div>
            <div class="partage" id="partageemail"></div>
            <script>
                function fonctionPartage() {
                    document.getElementById("partagelien").innerHTML = "<input disabled type=\"text\" id=\"url\" name=\"url\" value=\"<?php echo $lien; ?>\">";
                    document.getElementById("partagetwitter").innerHTML = "<a target=\"_blank\" class=\"icon fa-twitter\" href=\"https://twitter.com/intent/tweet?url=<?php echo rawurlencode($lien); ?>\"> Tweeter</a>";
                    document.getElementById("partageemail").innerHTML = "<a class=\"icon fa-envelope-o\" href=\"mailto:?body=<?php echo  rawurlencode($lien); ?>\">Envoyer par email</a>";
                }
            </script>
        </div>
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