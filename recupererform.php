<?php
$connection = mysqli_connect('localhost', 'root', '', 'bd');
if(!$connection){
    die ('echec de la connection');
}
else {
    echo ('connexion est établie');

}  
 
if ( isset($_POST['name'])&& isset($_POST['prenom'])&& isset($_POST['num'])&&
isset($_POST['email'])&& isset($_POST['adr'])&& isset($_POST['username'])&& isset($_POST['mdp1'])&&
isset($_POST['naissance'])&& isset($_POST['sexe'])){

$nom = $_POST['name'];
$prenom = $_POST['prenom'];
$num = $_POST['num'];
$email = $_POST['email'];
$adr = $_POST['adr'];
$username = $_POST['username'];
$mdp1 = $_POST['mdp1'];
$naissance = $_POST['naissance'];
if ($_POST['sexe'] == 'm'){
    $sexe = 'masculin';
}else{ 
$sexe = 'féminin';}

$requete = "INSERT INTO patient (nom, prenom, num, email, adresse, username, password, date_naissance, sexe)
 values ('$nom', '$prenom', '$num', '$email', '$adr', '$username', '$mdp1', '$naissance', '$sexe')";
$resultat = mysqli_query($connection, $requete);
}

if($resultat){
    header("location: patients.php?succes");
    exit();
}
else{ header("location: recupererform.php?error");
    exit();}

    mysqli_close($connection);

?>
