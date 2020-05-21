<?php
session_start();
if (isset($_SESSION['connecte'])) {
    if (!$_SESSION['connecte']) {
        header("Location: index.php" );
    };
    } else {
    header("Location: index.php" );
    };

include 'cloud_config.php';
chdir($chemin_cloud);
if (isset($_GET['dossier'])) {
    $dossier = $_GET['dossier'];
    $emplacement =  $chemin_cloud ."/".$dossier;
    $emplacement = realpath($emplacement);
    if ($emplacement === false || strncmp($emplacement, $chemin_cloud, strlen($chemin_cloud)) !== 0) {
        echo "<script type=\"text/javascript\">window.alert(\"Emplacement non authorisé ou introuvable\");window.location.href=\"fichiers.php\";</script>";
    } else {chdir($emplacement);};
}
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
                <li><a href="fichiers.php">Fichiers</a></li>
                <li><a href="deconnexion.php">Déconnexion</a></li>
                <li><a href="cv.php">Curriculums Vitæ</a></li>
            </ul>
            <a href="#" class="close">Close</a>
        </div>
    </nav>

    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <div class="logo"><h3><span class="icon fa-list-ul"></span><?php echo " ".$nom_cloud; ?> </h3></div>

            <form action="miseenligne.php" method="post" enctype="multipart/form-data">
                <h3>Mettre en ligne un fichier :</h3>
                <input type="file" name="fichier" id="fichier">
                <?php if (isset($_GET['dossier'])) {
                    echo "<input type=\"hidden\" name=\"dossier\" value=\"". rawurlencode($dossier). "\">";
                };
                ?>
                <input type="submit" value="Mettre en ligne" name="submit">
            </form>

            <form action="nouveaudossier.php" method="post" enctype="multipart/form-data">
                <input type="text" name="nomdossier" id="nomdossier">
                <?php if (isset($_GET['dossier'])) {
                    echo "<input type=\"hidden\" name=\"dossier\" value=\"". rawurlencode($dossier). "\">";
                };
                ?>
                <input style="margin-top: 5px;" class="button special" type="submit" value="Nouveau dossier" name="submit">
            </form>
            <?php
            if (isset($_GET['dossier'])) {
            echo "<a style=\"margin-left: 5px;\" class=\"button small\" href=\"fichiers.php\"> Accueil </a>";
            $dossiers = explode("/", $dossier);
            $nbr_dossier = count($dossiers);
            $d = "$dossiers[0]";
            for ($i = 0; $i <= $nbr_dossier - 1; $i++) {
                if ($i === $nbr_dossier - 1) {
                    $class = "\"button small special\"";
                } else {$class = "\"button small\"";
                };
                echo "<a style=\"margin-left: 5px;\" class=$class href='fichiers.php?dossier=".rawurlencode($d)."'>".rawurldecode($dossiers[$i])."</a>";
                $d = $d.("/".$dossiers[$i + 1]);
            };
            };

            ?>
            <h2>LISTE DES FICHIERS</h2>

            <?php
            foreach(glob("*") as $item) {
            if(!is_dir($item)){
                if (isset($dossier)){
                    $lt = rawurlencode($dossier . "/" . $item);
                    echo "<a class=\"icon fa-file\" href=\"telechargement.php?lt=";
                    echo $lt;
                    echo "\"> ";
                    echo "<span>".rawurldecode($item)."</span>";
                    echo "</a> | <a onclick=\"return confirm('Voulez-vous vraiment supprimer $item ?')\" class=\"icon fa-trash\" href=\"supprimer.php?";
                    $ls = "dossier=".rawurlencode($dossier)."&s=".rawurlencode($item);
                    echo $ls;
                    echo "\"> ";
                    echo "</a> </br>";


                } else {
                    echo "<a class=\"icon fa-file\" href=\"telechargement.php?lt=";
                    echo rawurlencode($item);
                    echo "\"> ";
                    echo "<span>".rawurldecode($item)."</span>";
                    echo "</a> | <a onclick=\"return confirm('Voulez-vous vraiment supprimer $item ?')\" class=\"icon fa-trash\" href=\"supprimer.php?s=";
                    echo rawurlencode($item);
                    echo "\"> ";
                    echo "</a></br>";

                };
            }
            else {
                if (isset($dossier)){
                    echo "<a class=\"icon fa-folder\" href=\"?dossier=";
                    echo rawurlencode($dossier . "/" . $item);
                    echo "\"> ";
                    echo "<span style='font-weight: bold'>".rawurldecode($item)."</span>";
                    echo "</a> | <a onclick=\"return confirm('Voulez-vous vraiment supprimer $item ?')\" class=\"icon fa-trash\" href=\"supprimer.php?dossier=";
                    echo rawurlencode($dossier)."&s=".rawurlencode($item);
                    echo "\"> ";
                    echo "</a></br>";



                } else {
                    echo "<a class=\"icon fa-folder\" href=\"?dossier=";
                    echo rawurlencode($item);
                    echo "\"> ";
                    echo "<span style='font-weight: bold'>".rawurldecode($item)."</span>";
                    echo "</a> | <a onclick=\"return confirm('Voulez-vous vraiment supprimer $item ?')\" class=\"icon fa-trash\" href=\"supprimer.php?s=";
                    echo rawurlencode($item);
                    echo "\"> ";
                    echo "</a></br>";


                };
            };
            };
            ?>

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