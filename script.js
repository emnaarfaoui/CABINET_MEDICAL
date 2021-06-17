function validate(){
    var username = document.getElementById("username").value;
    var mdp = document.getElementById("mdp").value;
    var error_message = document.getElementById("error_message");
    error_message.style.padding = "10px";

    var text;
    if(username.length < 10){
      text = "Please Enter valid username";
      error_message.innerHTML = text;
      return false;
    }
    if(mdp.length < 10){
      text = "Please Enter Correct password";
      error_message.innerHTML = text;
      return false;
    }
    alert("Form Submitted Successfully!");
    return true;
  }