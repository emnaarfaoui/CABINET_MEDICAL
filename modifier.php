<?php 
$connection = mysqli_connect('localhost', 'root', '', 'bd');
if(!$connection){
    die ('echec de la connection');
}
if (isset($_POST["modifier"]))
    
    {   $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $num = $_POST['num'];
        $adresse = $_POST['adresse'];
        $email = $_POST['email'];
        $date = $_POST['date_naissance'];
        $sexe = $_POST['sexe'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        

        $sql = "UPDATE patient SET nom = '$nom', prenom = '$prenom', num = '$num', adresse = '$adresse', email = '$email',
        username = '$username', password = '$password' ";
     $res = mysqli_query($connection, $sql);
    
    }
    if($res){
        header("location: loginpat.php?succes");
        echo '<script type="text/javascript"> alert("modification terminer!") </script>';
        exit();
    }
    else{
        echo '<script type="text/javascript"> alert("erreur") </script>';
    }
    mysqli_close($connection);
?>