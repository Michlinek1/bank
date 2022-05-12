<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet " href = "style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script  src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
        <script defer src = "scriptlogowanie.js"></script>
    
        <title>Zaloguj</title>  
    </head>
    <body>
        
        <form class = "login-form"  method = "post">
        <div class = "container">
            <!-- bank logo -->
            <div class = "login_logo">
            <i class = "fa fa-bank"=></i>
            </div>
            <div class = "login">
        <input type = "mail" class = "login_logowanie"name = "mail" placeholder = "Wpisz swój E-mail" autocomplete = "off">
        <h1 id = "bledy"></h1>
        <br> <br>

        <input type = "password" name = "password" class = "login_logowanie" placeholder = "Wpisz swoje hasło">
        <h1 id = "bledy"></h1>
        <br>
        <input type ="checkbox" id =  "pokazhaslo" onclick = "pokaz_haslo()">Pokaż hasło
        <br> <br>
        <button class = "login_przycisk"type = "submit" name = "zaloguj" value = "Zaloguj" >Zaloguj</button>
        <br> <br>
        <div class = "login-form_link">
        <a href = "register.php" class = "login_link">Zarejestruj</a>
        <?php
        if(isset($_POST['zaloguj'])){
            if($_POST['mail'] == "" || $_POST['password'] == ""){
                echo '<script>'
                .'swal("Błąd", "Wprowadź poprawne dane", "error")'
                .'</script>';
            }else{
            $pol = new mysqli('localhost', 'root', '', 'bank');
            $sql = $pol->query("SELECT * FROM uzytkownik WHERE email = '$_POST[mail]'");
            $row = $sql->fetch_assoc();
            if($_POST['password'] == $row['haslo'] && $_POST['mail'] == $row['email']){
                $_SESSION['zalogowany'] = true;
                $_SESSION['id'] = $row['id'];
                $_SESSION['login'] = $row['login'];
                header("Location: index.php?logged=true");
            }else{
                echo '<script>'
                .'swal("Błąd", "Wprowadz poprawny email oraz hasło", "error")'
                .'</script>';
            }
        }
        }
    
    
        
        

          

         

        ?>
        </div>
        </div>
        </form>
      

    </body>
    </html> 
