<?php
session_start();
if (isset($_SESSION['connecte'])) {
    if (!$_SESSION['connecte']) {
        header("Location: index.php" );
    } else {
        include 'cloud_config.php';
        if(isset($_POST['nomdossier'])){
            if (isset($_POST['dossier'])) {
                $dossier = rawurldecode($_POST['dossier']);
                $emplacement =  realpath($chemin_cloud ."/".$dossier);
                $location = "fichiers.php?dossier=".$_POST['dossier'];

            }
            else {
                $emplacement =  realpath($chemin_cloud);
                $location = "fichiers.php";
            };
            if ($emplacement === false || strncmp($emplacement, $chemin_cloud, strlen($chemin_cloud)) !== 0) {
                echo "<script type=\"text/javascript\">window.alert(\"Emplacement du dossier non authorisé ou introuvable\");window.location.href=\"$location\";</script>";
            }
            else {
                $nomdossier = $_POST['nomdossier'];
                if (mkdir($emplacement."/".rawurlencode($nomdossier))) {header("Location:". $location );}
                else {echo "<script type=\"text/javascript\">window.alert(\"Impossible de créer le dossier\");window.location.href=\"$location\";</script>";};

            };
        };
    };
} else {
    header("Location: index.php" );
};

?>