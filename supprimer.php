<?php
session_start();
if (isset($_SESSION['connecte'])) {
    if (!$_SESSION['connecte']) {
        header("Location: index.php" );
    } else {
        include 'cloud_config.php';
        if(isset($_GET['s'])){
            $s = $_GET['s'];
            if (isset($_GET['dossier'])) {
                $dossier = $_GET['dossier'];
                $emplacement =  $chemin_cloud ."/".$dossier."/".$s;
                $emplacement = realpath($emplacement);
                $location = "fichiers.php?dossier=".rawurlencode($_GET['dossier']);

            } else {
                $emplacement =  realpath($chemin_cloud ."/".$s);
                $location = "fichiers.php";
            };
            if ($emplacement === false || strncmp($emplacement, $chemin_cloud, strlen($chemin_cloud)) !== 0) {
                echo "<script type=\"text/javascript\">window.alert(\"Emplacement non authorisé ou introuvable\");window.location.href=\"$location\";</script>";
            }
            else {
                if (is_dir($emplacement)) {
                    if (rmdir($emplacement)) {header("Location:". $location );}
                    else {
                        echo "<script type=\"text/javascript\">window.alert(\"impossible de supprimer le dossier $s\");window.location.href=\"$location\";</script>";
                    };
                }
                else {
                    if (unlink($emplacement)) {
                        header("Location:". $location );
                    }
                    else {
                        echo "<script type=\"text/javascript\">window.alert(\"impossible de supprimer le fichier $s \");window.location.href=\"$location\";</script>";
                    };
                };

            };
        };
    };
} else {
    header("Location: index.php" );
};
?>
