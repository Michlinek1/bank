<?php
session_start();

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet " href = "style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script defer src = "scriptlogowanie.js"></script>
        <title>Zaloguj</title>  
    </head>
    <body>
        
        <form class = "login-form"  method = "post">
        <div class = "container">
            
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
        <button class = "login_przycisk"type = "submit" name = "zaloguj" value = "Zaloguj">Zaloguj</button>
        <br> <br>
        <div class = "login-form_link">
        <a href = "register.php" class = "login_link">Zarejestruj</a>
        <?php
        if(isset($_POST['zaloguj'])){
            $pol = new mysqli('localhost', 'root', '', 'bank');
            $sql = $pol->query("SELECT * FROM uzytkownik WHERE email = '$_POST[mail]'");
            $row = $sql->fetch_assoc();
            if($_POST['password'] == $row['haslo'] && $_POST['mail'] == $row['email']){
                $_SESSION['zalogowany'] = true;
                $_SESSION['id'] = $row['id'];
                $_SESSION['login'] = $row['login'];
                header("Location: index.php?logged=true");
            }else{
                echo "<script>document.getElementById('bledy').innerHTML = 'Błędne hasło lub email!';</script>";
                echo "<script>document.getElementsByClassName('login_logowanie')[0].style.borderColor = 'red';</script>";
                echo "<script>document.getElementsByClassName('login_logowanie')[1].style.borderColor = 'red';</script>";
            }
        }
        

          

         

        ?>
        </div>
        </div>
        </form>
      

    </body>
    </html> 
