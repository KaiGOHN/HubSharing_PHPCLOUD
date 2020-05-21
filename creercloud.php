<?php
$nom_admin = '$nom_admin = rawurldecode(\''.rawurlencode($_POST['nom_admin']).'\');';
$mdp_admin = '$mdp_admin = rawurldecode(\''.rawurlencode($_POST['mdp_admin']).'\');';
$nom_cloud = '$nom_cloud = rawurldecode(\''.rawurlencode($_POST['nom_cloud']).'\');';
$chemin_cloud = '$chemin_cloud = rawurldecode(\''.rawurlencode($_POST['chemin_cloud']).'\');';
$config = "<?php\n".$nom_admin."\n".$mdp_admin."\n".$nom_cloud."\n".$chemin_cloud."\n?>";
file_put_contents('cloud_config.php', $config, LOCK_EX);
?>