function pokaz_haslo(){
    var haslo = document.getElementsByClassName("login_logowanie");
    if(haslo[1].type == "password"){
        haslo[1].type = "text";
    }
    else{
        haslo[1].type = "password";
    }
}



    const form = document.getElementsByClassName("login-form")[0];
    const mail = document.getElementsByClassName("login_logowanie")[0];
    const haslo = document.getElementsByClassName("login_logowanie")[1] 
    const bladh1 = document.getElementById("bledy");
    form.addEventListener("submit", (e) =>{
        let bledy = [];
        if(mail.value == "" || mail.value == null || haslo.value == "" || haslo.value == null){
            bledy.push("Nie wypełniono wszystkich pól");
            mail.style.borderColor = "red";
            haslo.style.borderColor = "red";
        }else{
            mail.style.borderColor = "green";
            haslo.style.borderColor = "green";
        }
        if(mail.value.indexOf("@") == -1){
            bledy.push("Niepoprawny adres email");
            mail.style.borderColor = "red";
        }else{
            mail.style.borderColor = "green";
        }
        if(haslo.value.length < 8 || haslo.value.length > 20){
            bledy.push("Hasło musi mieć co najmniej 8 znaków i mnie niż 20");
            haslo.style.borderColor = "red";
        }else{
            haslo.style.borderColor = "green";
        }
        if(bledy.length > 0){
            bladh1.innerHTML = bledy.join("<br>");
            e.preventDefault();
        }
        if(bledy.length == 0){
            form.submit();
        }
    
    

});
