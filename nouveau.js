function validate(){
    var name = document.getElementById("name").value;
    var prenom = document.getElementById("prenom").value;
    var phone = document.getElementById("num").value;
    var email = document.getElementById("email").value;
    var adr = document.getElementById("adr").value;
    var username = document.getElementById("username").value;
    var mdp1 = document.getElementById("mdp1").value;
    var mdp2 = document.getElementById("mdp2").value;
    var error_message = document.getElementById("error_message");
    
    error_message.style.padding = "10px";
    
    var text;
    if(name.length < 3){
      text = "Please Enter valid Name";
      error_message.innerHTML = text;
      return false;
    }
    if(prenom.length < 4){
      text = "Please Enter Correct prenom";
      error_message.innerHTML = text;
      return false;
    }
    if(isNaN(phone) || phone.length != 8){
      text = "Please Enter valid Phone Number";
      error_message.innerHTML = text;
      return false;
    }
    if(email.indexOf("@") == -1 || email.length < 6){
      text = "Please Enter valid Email";
      error_message.innerHTML = text;
      return false;
    }
    if(adr.length <= 5){
      text = "Please Enter More Than 5 Characters (adresse)";
      error_message.innerHTML = text;
      return false;
    }
    if(username.length <= 10){
        text = "Please Enter More Than 10 Characters(username)";
        error_message.innerHTML = text;
        return false;}
    if(mdp1.length <= 5){
            text = "Please Enter More Than 8 Characters(password)";
            error_message.innerHTML = text;
            return false;
          }
     if(mdp2 !=  mdp1){
            text = "repeterinvalid password confirmation";
            error_message.innerHTML = text;
            return false;
          }
          


    alert("Form Submitted Successfully!");
    return true;
  }