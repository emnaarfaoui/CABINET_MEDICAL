<!DOCTYPE html>
<html>
 <head>
        <title>se connecter</title>
        <meta charset="UTF-8"> 
        <link rel="stylesheet" href="patients.css">
        <script src="script.js"></script>
</head>
<body>
  
  <form  name="form2" onsubmit="return validate();"  action="loginpat.php" method="POST">
    <h4>Authentification Patient</h4>
  <div id="error_message"></div>
    

   <div>       
    <label for="username">Username:</label> <br>
    <input type="text" name="username" id="username" placeholder="Your user name">
   
   </div> 

   <div>
    <label for="mdp">Password</label> <br>
   <input type="password" name="password" id="mdp" placeholder="Your password">
   
    </div> 

   <input type="submit" name="send" value="send">

 </form>
</body>
</html>