
<?php
$connection = mysqli_connect('localhost', 'root', '', 'bd');
if(!$connection){
    die ('echec de la connection');
}
 
$username = $_POST["username"];
$password = $_POST["password"];

if($username !== "" && $password !== "")
{
    $requete = "SELECT * FROM   users WHERE 
    username = '$username' &&  password = '$password' ";
    $resultat = mysqli_query($connection, $requete);
    $resultatnb = mysqli_num_rows($resultat);
    if( $resultatnb>0)
    {
         ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="espacemedecin.css">
    
    <title>Espace médecin</title>
</head>
<body>
    <img src="welcomemed.gif" alt="welcome.gif" class="welc">
    <div class="log"> <br><a href="logoutmed.php">Se déconnecter</a><br></div> <br>
    <div class="med"><img src="medecin.jpg"></div><br>
   
    <form  action="rechercher.php" method="POST">
    <h4>Rechercher un patient par son prénom:</h4>
    <input type ="text" name="prenom">
    <input type="submit" value="rechercher">
    </form>
     <h4>Totale des patients:</h4>
         <input type="button" value="<?php  
        $requete2 = "SELECT * FROM users ";
        $resultat2 = mysqli_query($connection, $requete2);
        echo mysqli_num_rows($resultat2); ?>">
         <br><br><br>
        <table border='1'>
            <h4>Historique de vos consultation :</h4>
             <tr>
                <th><strong>Date de consultation</strong></th>
                <th><strong>Nom et Prénom de patient</strong></th>
             </tr>

             <tr>
                <td><strong>02/03/2021</strong></td>
                <td><strong>emna arfaoui</strong></td>
            </tr>            
        </table>

        <div class="consultation">
            <form action="">
                <h4>Nouvelle consultation</h4> <br>
                <label for="nom">Nom et prénom du patient</label> <br>
                <input type="text" name="nom" class="nom"><br>
                <label for="diag">Diagnostique</label> <br>
                <textarea name="dig" id="dig" cols="30" rows="10"></textarea><br>
                <label for="pers">Perscription : choisir type</label> <br>
                <select name="maliste" >
                    <option> Analyse </option>
                    <option> Medicament </option>
                    <option> acte Radio</option>
                    <option> envoi vers spécialiste </option>
                </select> <br>
                <label for="radio">si un radio</label> <br>
                <select name="maliste" >
                    <option> IRM </option>
                    <option> Scanner </option>
                    <option> Radio</option>
                    <option> Mammographie</option>
                    <option> Echographie</option>
                    
                </select> <br><br>
                <input type="submit" value="terminer">

            </form>

        </div>
     
    </body>
</html>
         
    <?php
    }
    else{
        if(!(password_verify($password, $resultatnb["password"])))
        {
            echo '<script type="text/javascript"> alert("mot de passe incorrect!") </script>';
        }
        else{
            echo '<script type="text/javascript"> alert("username incorrect!") </script>';
        }
    }
 mysqli_close($connection);
}
?>