<?php
session_start();
include 'cloud_config.php';
    if ($_SESSION['connecte']) {
        header("Location: fichiers.php" );
    } else {
        if ($_POST['utilisateur'] === $nom_admin and $_POST['motdepasse'] === $mdp_admin) {
            $_SESSION['connecte'] = true;
            header("Location: fichiers.php" );

        } else {
            $_SESSION['connecte'] = false;
            header("Location: index.php" );
        };
    };