<?php
$connection = mysqli_connect('localhost', 'root', '', 'bd');
if(!$connection){
    die ('echec de la connection');
}
 
 
$username = $_POST["username"];
$password = $_POST["password"];


if($username !== "" && $password !== "")
{
    $requete = "SELECT * FROM  patient WHERE 
    username = '$username' and  password = '$password' ";
    $resultat =mysqli_query($connection, $requete);
    $data = mysqli_fetch_assoc($resultat);
    $resultatnb = mysqli_num_rows($resultat);
    if( $resultatnb>0)
    { 
   
        
        setcookie('nom',$_POST["username"],time()+3600*24);
        setcookie('prenom',$data["prenom"],time()+3600*24);?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="espacepatient.css">
    
    <title>Espace patient</title>
</head>
<body>
  
    <img src="welcome.gif" alt="welcome.gif">
    <div class="log"><a href="logoutpat.php">se déconnecter</a></div>
    
    <br>
    <div id="info">
    <form action="modifier.php" method="POST">
    <table>
        <img src="info.jpg"  id="imginfo">
        <tr>
            <td>Votre Nom:</td>
            <td><?php echo "<input type='text' name='nom' value='" .$data["nom"]."'/>"; ?></td>
        </tr>
        <tr>
            <td>Votre Prénom:</td>
            <td><?php echo "<input type='text' name='prenom' value='" .$data["prenom"]."'/>"; ?></td>
        </tr>
        <tr>
            <td>Votre Num de téléphone</td>
            <td><?php echo "<input type='text' name='num' value='" .$data["num"]."'/>";?></td>
        </tr>
        <tr>
            <td>Votre email:</td>
            <td><?php   echo "<input type='text' name='email' value='" .$data["email"]."'/>";  ?></td>
        </tr>
        <tr>
            <td>Votre adresse domicile:</td>
            <td><?php echo "<input type='text' name='adresse' value='" .$data["adresse"]."'/>"; ?></td>
        </tr>
        <tr>
            <td> Date de naisssance:</td>
            <td><?php echo "<input type='text' name='date_naissance' value='" .$data["date_naissance"]."'/>";?></td>
        </tr>
        <tr>
            <td>Sexe:</td>
            <td><?php echo "<input type='text' name='sexe' value='" .$data["sexe"]."'/>"; ?></td>
        </tr>
        <tr>
            <td>Nom d\'utilisateur:</td>
            <td><?php echo "<input type='text' name='username' value='" .$data["username"]."'/>"; ?></td>
        </tr>
        <tr>
            <td>Mot de passe:</td>
            <td><?php echo "<input type='text' name='password' value='" .$data["password"]."'/>"; ?></td>
        </tr>
    </table> <br>
     <input type="submit" value="modifier" name="modifier" id="mofifier">
     </form>
     
    </div>
    <div class="rendez">
        <form action="loginmed.php" method="POST">

       
        <h4>Prendre un rendez-vous :</h4>
        <div class="date"><input type="date" name="rendez"  ></div>
        
        <input type="submit" value="OK">
        </form>
       
        

    </div>
    
    <div class="consultation">
         <h4>Nouvelle Consultations</h4>
         <p>merci de remplir "La fiche de renseignements medicaux"</p>
         <div> Cette fiche de renseignements est strictement personnelle et confidentielle. C'est un document
     médico-légal. Elle doit contribuer à améliorer la qualité de votre suivi médical., remplissez-le avec soin
      en cochant la case correspondant à votre réponse et situation.</div>
      
       <h2>1- AVEZ-VOUS ETE OU ETES-VOUS ATTEINT D'UNE DES MALADIES SUIVANTES(1) :</h2> 
      - Allergie : oui <input type="checkbox" id="horns" name="horns"> non <input type="checkbox" id="horns" name="horns">
      - Asthme :  oui <input type="checkbox" id="horns" name="horns"> non <input type="checkbox" id="horns" name="horns">
      - Diabète : oui <input type="checkbox" id="horns" name="horns"> non <input type="checkbox" id="horns" name="horns">
      - Maladie du cœur : oui <input type="checkbox" id="horns" name="horns"> non <input type="checkbox" id="horns" name="horns">
      - Epilepsie : oui <input type="checkbox" id="horns" name="horns"> non <input type="checkbox" id="horns" name="horns">
      - Troubles psychiatriques : oui <input type="checkbox" id="horns" name="horns"> non <input type="checkbox" id="horns" name="horns">
      - Traumatismes, fractures : oui<input type="checkbox" id="horns" name="horns"> non <input type="checkbox" id="horns" name="horns">
      - Rhumatisme articulaire aiguë : oui<input type="checkbox" id="horns" name="horns"> non <input type="checkbox" id="horns" name="horns">
      - Reins ou voies urinaires : oui<input type="checkbox" id="horns" name="horns"> non <input type="checkbox" id="horns" name="horns">
      Autre maladie : préciser : <input type="text" id="autre" name="autre">
      <br> <h2>2- VOTRE ETAT DE SANTE ACTUEL :</h2>
      - Connaissez-vous votre tension artérielle ?: oui<input type="checkbox" id="horns" name="horns"> non <input type="checkbox" id="horns" name="horns">
      - Suivez vous actuellement un traitement particulier ? : oui<input type="checkbox" id="horns" name="horns"> non <input type="checkbox" id="horns" name="horns">
      , lequel : <input type="text" id="traitement" name="traitement">

      - Avez-vous été hospitalisé(e)? :oui<input type="checkbox" id="horns" name="horns"> non <input type="checkbox" id="horns" name="horns">
      Précisez la date, la durée, le lieu et la cause de l'hospitalisation : <input type="text" id="hospitalisé" name="hospitalisé">
      - Avez-vous été Opéré(e) ? : oui<input type="checkbox" id="horns" name="horns"> non <input type="checkbox" id="horns" name="horns">
      Précisez la date, la durée, le lieu et la cause de l'opération : <input type="text" id="opération" name="opération"> <br>
      <h2>3- PRESENTEZ-VOUS A L'HEURE ACTUELLE L'UN DES SIGNES SUIVANTS (1)?</h2>
      - Fatigue fréquente: oui<input type="checkbox" id="horns" name="horns"> non <input type="checkbox" id="horns" name="horns">
      - Soif anormale: oui<input type="checkbox" id="horns" name="horns"> non <input type="checkbox" id="horns" name="horns">
      - Appétit :oui<input type="checkbox" id="horns" name="horns"> non <input type="checkbox" id="horns" name="horns">
      - Amaigrissement récent et notable (> 5kg) : oui<input type="checkbox" id="horns" name="horns"> non <input type="checkbox" id="horns" name="horns">
      - Des troubles du sommeil : oui<input type="checkbox" id="horns" name="horns"> non <input type="checkbox" id="horns" name="horns">
      - Difficultés à vous concentrer :oui<input type="checkbox" id="horns" name="horns"> non <input type="checkbox" id="horns" name="horns">
        - Douleurs : oui<input type="checkbox" id="horns" name="horns"> non <input type="checkbox" id="horns" name="horns">
    <br> <h2>4- ANTECEDANTS FAMILIAUX (1): </h2>
    - L'un de vos proches parents est-il malade ?: (maladie physique ou mentale)  oui<input type="checkbox" id="horns" name="horns"> non <input type="checkbox" id="horns" name="horns">
    
    <input type="submit" value="Envoyer">
     </div>
    </body>
</html>

<?php
    }
    else{
        
           echo '<script type="text/javascript"> alert("mot de passe ou username incorrect!") </script>';
        }
        
    
    
    
     
 mysqli_close($connection);
} ?>
    
  