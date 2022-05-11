
//rejestracja
function pokaz_haslo_rejestracja(){
    var haslo = document.getElementsByClassName("login_logowanie");
    if((haslo[2].type == "password" && haslo[3].type == "password")){
        haslo[2].type = "text";
        haslo[3].type = "text";
    }
    else{
        haslo[2].type = "password";
        haslo[3].type = "password";
    }

}
const form = document.getElementsByClassName("login-form")[0];
form.addEventListener("submit", (e) =>{
    const bladh1 = document.getElementById("bledy");
    const haslo =  document.getElementsByClassName("login_logowanie")[2];
    const haslo2 = document.getElementsByClassName("login_logowanie")[3];
    const login = document.getElementsByClassName("login_logowanie")[0];
    const email = document.getElementsByClassName("login_logowanie")[1];
    let bledy = [];
    
    if(login.value == "" || login.value == null|| haslo.value == "" || haslo.value == null|| email.value == "" || email.value ==null){
        bledy.push("Nie wypełniono wszystkich pól");
        login.style.borderColor = "red";
        haslo.style.borderColor = "red";
        email.style.borderColor = "red";
        haslo2.style.borderColor = "red";
    }else{
        login.style.borderColor = "green";
        haslo.style.borderColor = "green";
        email.style.borderColor = "green";
        haslo2.style.borderColor = "green";
    }
    if((haslo.value.length < 8 || haslo.value.length > 20) || (haslo2.value.length < 8 || haslo2.value.length >20)){
        bledy.push("Hasło musi mieć co najmniej 8 znaków i mnie niż 20");
        haslo.style.borderColor = "red";
        haslo2.style.borderColor = "red";
        
    }else if(haslo.value != haslo2.value){
        bledy.push("Hasła nie są identyczne");
        haslo.style.borderColor = "red";
        haslo2.style.borderColor = "red";
       
    }else{
        haslo.style.borderColor = "green";
        haslo2.style.borderColor = "green";
        

    }
    
    if(login.value.length < 8 || login.value.length > 20){
        bledy.push("Login musi mieć co najmniej 8 znaków i mnie niż 20");
        login.style.borderColor = "red";
    }else{
        login.style.borderColor = "green";
    }
    
    if(email.value.indexOf("@") == -1){
        email.style.borderColor = "red";
        bledy.push("Niepoprawny email");
    }else{
        email.style.borderColor = "green";
    }
    if(bledy.length > 0){
        e.preventDefault();
        bladh1.innerHTML = bledy.join("<br>");
        
    }
    if(bledy.length == 0){
        form.submit();
    }
   
});





