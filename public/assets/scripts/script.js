  function verification(){

    var user = document.getElementById("name").value;
    var password = document.getElementById("password").value;
    console.log(user);
    var pass=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0,9a-zA-Z]{8,}$/;

    if(user !="" &&  password !="")
    { 
      if(password.test(pass)){
        alert("vous etes connectés");
      }
      else
          {
            alert("vérifié le mot de passe");
          }
    }
    else{
      alert("entrer les informations");
    }
    

}