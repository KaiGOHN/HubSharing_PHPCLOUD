<?php
include 'cloud_config.php';
if(isset($_GET['lt'])){
        $lt = $_GET['lt'];
        $emplacement =  realpath($chemin_cloud ."/".$lt);
    if ($emplacement === false || strncmp($emplacement, $chemin_cloud, strlen($chemin_cloud)) !== 0) {
        echo 'Emplacement non authorisé ou introuvable';
    }
    else {
        //echo 'The file exists and is in the expected location';
        $nom = rawurldecode(basename($emplacement));
if (file_exists($emplacement)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.$nom.'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($emplacement));
    readfile($emplacement);
    exit;
}

    }
};

?>


