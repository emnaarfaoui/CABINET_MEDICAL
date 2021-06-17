<?php 
$connection = mysqli_connect('localhost', 'root', '', 'bd');
if(!$connection){
    die ('echec de la connection');
}       $prenom = $_POST['prenom'];
        $sql = "SELECT * from patient WHERE prenom ='$prenom'";
        $res = mysqli_query($connection, $sql);
        

        if($res){
           $nbpatients = mysqli_num_rows($res);
            if($nbpatients > 0){
                ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="rechercher.css">
    <title>rechercher patient</title>
</head>
<body>
    <h4>Résultat de votre rechercher :</h4>
    
<div class="tab">

               <table border='1'>
            <tr>
             <td><strong>Prénom</strong></td>
             <td><strong>nom</strong></td>
              <td><strong>email</strong></td>
               <td><strong>num</strong></td>
                <td><strong>adresse</strong></td>
                <?php
                while ($patients = mysqli_fetch_array($res)){ ?>
                    <tr>
                    <td><?php echo $patients['prenom']; ?></td>
                    <td><?php echo $patients['nom']; ?> </td>
                  <td> <?php echo $patients['email']; ?></td>
                    <td><?php echo $patients['num']; ?></td>
                   <td>  <?php echo $patients['adresse']; ?></td>
                </tr>
                <?php
                }?>
            </table>
            </div>
            </body>
</html>
            <?php
            }else{
                echo "le patient n'existe pas";
            }
        }else{ echo "erreur d'exécution";}

        ?>