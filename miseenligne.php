<?php
session_start();
if (isset($_SESSION['connecte'])) {
    if (!$_SESSION['connecte']) {
        header("Location: index.php" );
    } else {
        include 'cloud_config.php';
        if(isset($_FILES['fichier'])){
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
                echo 'Emplacement non authorisé ou introuvable';
            }
            else {
                $nom = rawurlencode(basename($_FILES['fichier']['name']));
                $fichier_temp = $_FILES['fichier']['tmp_name'];
                if(!is_uploaded_file($fichier_temp))
                {
                    echo "<script type=\"text/javascript\">window.alert(\"Le fichier est introuvable\");window.location.href=\"$location\";</script>";

                } else {
                if(!move_uploaded_file($fichier_temp, "$emplacement/$nom"))
                {
                    echo "<script type=\"text/javascript\">window.alert(\"Impossible de copier le fichier\");window.location.href=\"$location\";</script>";
                } else {
                    header("Location:". $location );
                };
                };


            };
        };
    };
} else {
    header("Location: index.php" );
};


?>



