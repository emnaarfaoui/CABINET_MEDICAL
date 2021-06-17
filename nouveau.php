<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contact us form validation Using Javascript</title>
	<link rel="stylesheet" href="nouveau.css">
	<script src="nouveau.js"></script>
</head>
<body>

<div class="wrapper">
  <h2>Contact us</h2>
  <div id="error_message"></div>
  <form id="myform" onsubmit="return validate();" action="recupererform.php"  method="POST">
    <div class="input_field">
        <input type="text" placeholder="Name"  name="name" id="name">
    </div>
    <div class="input_field">
        <input type="text"  placeholder="prenom"  name="prenom" id="prenom">
    </div>
    <div class="input_field">
        <input type="text" placeholder="Phone" name="num" id="num">
    </div>
    <div class="input_field">
        <input type="text" placeholder="Email" name="email" id="email">
    </div>
    <div class="input_field">
        <input type="text" placeholder="adresse domicile" name="adr" id="adr">
    </div>
    <div class="input_field">
        <input type="text" name="username" id="username" placeholder="Votre Nom d'utilisateur">
    </div>
    <div class="input_field">
        <input type="password"   name="mdp1" id="mdp1" placeholder="Votre mot de passe">
    </div>
    <div class="input_field">
        <input type="password" name="mdp2" id="mdp2" placeholder="Confirmer mot de passe">
    </div>
    <div class="input_field">
        Date de naissance
            <input type="date" name="naissance" id="nais">
    </div>
    <br>
    <div class="input_field">
        Sexe
        <input type="radio" name="sexe" id="masculin" value="m">
        <label for="masculin">masculin</label>
        <input type="radio" name="sexe" id="féminin" value="f">
        <label for="mféminin">Féminin</label>
    </div>




    <div class="btn">
        <input type="submit">
    </div>
  </form>
</div>

</body>
</html>