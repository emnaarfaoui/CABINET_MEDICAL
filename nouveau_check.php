<?php
session_start();
include("fonction_mysql.inc.php");
$conn=connexion();

if (isset($_POST["username"]) && isset($_POST["mdp1"]) && isset
($_POST["name"]) && isset($_POST["mdp2"])){
    $username = $_POST["username"];
    $mdp1 = $_POST["mdp1"];
    $mdp2 = $_POST["mdp2"];
    $name = $_POST["name"];


    $user_data = "username=".$username. "name=".$name;

    if(empty($username)){
        header("location: nouveau.php?error=user name is required&$user_data");
        exit();
        }
    if(empty($mdp1)){
            header("location: nouveau.php?error=password is required&$user_data");
            exit();
            }
      if(empty($mdp2)){
                header("location: nouveau.php?error=re-password is required&$user_data");
                exit();
                }  
                else if (empty($name)){
                    header("location: nouveau.php?error=name is required&$user_data");
                    exit();
                }  
         else if($mdp1 !== $mdp2)
         {
             header("location: nouveau.php?error=the confirmation password does not match is required&$user_data");
             exit();
             }
             
         else{
             $mdp1 = md5($mdp1);
             $sql ="SELECT * FROM users WHERE username='$username' ";
             $_result = mysqli_query($conn, $sql);

             if (mysqli_num_rows($_result)> 0){
                 header("location: nouveau.php?error=the username is taken try another&$user_date");
                 exit();
            
             }
             else {
                 $sql2 = "INSERT INTO users(username, password, name) VALUES('$name',
                 '$mdp1','$name')";
                 $_result2 = mysqli_query($conn, $sql2);
                 if ($_result2){
                     header("location: nouveau.php?success=your account has been created seccessfuly");
                     echo "<script>alert(\"your account has been created succesfully\")</script>";
                     exit();
                    

       
                     
             }
             else {
                 header("location: nouveau.php?error=error&$user_data");
                 exit();
             }
    
         }    
        }
} else{
    header("location: nouveau.php");
}
?>