<?php
session_start();
if (isset($_SESSION["id"]) && isset($_SESSION["username"])){

?>


<!DOCTYPE html>
 <html>
 <head>
     <meta charset="UTF-8">
     <title>Recuperation des données</title>
     <link rel="stylesheet" href="recuperer.css">
 </head>
 <body>
     
 <img src="welcome.gif" alt="welcome.gif">
 <br>
 




name :<?php echo $_POST["username"]; ?> <br>
prenom : <?php echo $_POST["password"]; ?> 
<?php echo $_SESSION["name"]; ?>
<a href="logout.php">logout</a>

</body>
</html>
<?php
} else{
    header("location: medecin.php");
    exit();
}
?>