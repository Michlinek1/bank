<?php
mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR | MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX); ;

?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet " href = "style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script defer src = "scriptrejestracja.js"></script>
        <title>Zarejestruj</title>  
    </head>
    <body>
        
        <form class = "login-form" name = "login"   method = "post">
        <div class = "container">
            <div class = "login_logo">
            <i class = "fa fa-bank"></i>
            </div>
            <div class = "login">
        <input type = "text" class = "login_logowanie" name = "login" placeholder = "Podaj swój login"  autocomplete = "off" >
        <h1 id = "bledy"></h1>
        <br> <br>
        <input type = "mail" class = "login_logowanie" name = "mail" placeholder = "Wpisz swój E-mail"  autocomplete = "off" >
        <h1 id = "bledy"></h1>
        <br> <br>
        <input type = "password" name = "password" class = "login_logowanie"  placeholder = "Wpisz swoje hasło" >
        <h1 id = "bledy"></h1>
        <br> <br>
        <input type = "password" name = "password2" class = "login_logowanie"  onclick = "chowanie()"placeholder = "Wpisz hasło ponownie" >
        <h1 id = "bledy"></h1>
        <input type ="checkbox" id =  "pokazhaslo" onclick = "pokaz_haslo_rejestracja()">Pokaż hasło
        <br> <br>
        <button class = "login_przycisk" type = "submit" value = "Zarejestruj" name = "zarejestruj">Zarejestruj się</button>
        <br> <br>
    <?php
    if(isset($_POST['zarejestruj'])){
        $pol = new mysqli('localhost', 'root', '', 'bank');
        $pyt = mysqli_query($pol, "SELECT * FROM uzytkownik");
        $row = mysqli_fetch_array($pyt);
        if(($_POST['login'] == $row['login']) || ($_POST['mail'] == $row['email'])){
            echo "<script>document.getElementById('bledy').innerHTML = 'Login lub hasło  jest już zajęte!';</script>";
            echo "<script>document.getElementsByClassName('login_logowanie')[0].style.borderColor = 'red';</script>";
            echo "<script>document.getElementsByClassName('login_logowanie')[1].style.borderColor = 'red';</script>";
        }else{
            $login = $_POST['login'];
            $mail = $_POST['mail'];
            $password = $_POST['password'];
            $password2 = md5($password);
            $sql  = mysqli_query($pol, "INSERT INTO uzytkownik (login, email, haslo, haslohash) VALUES ('$login', '$mail', '$password', '$password2')");
            header('Location: logowanie.php');
        }
        }
    

    ?>
        </div>
        </div>

        </form>

    </html> 