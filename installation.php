<h1>Installation du cloud:</h1>
<form action="creercloud.php" method="post">

    Nom d'utilisateur de l'administrateur<br>
    <input type="text" name="nom_admin" required><br>
    Mot de passe de l'administrateur<br>
    <input type="password" name="mdp_admin" required><br>

    Nom du cloud:<br>
    <input type="text" name="nom_cloud" required><br>
    Chemin absolu du dossier de stockage des fichiers:<br>
    <input type="text" name="chemin_cloud" required><br><br>
    <input type="submit" value="Installer">

</form>