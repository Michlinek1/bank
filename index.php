<?php
session_start();

$pol = new mysqli('localhost', 'root', '', 'bank');

$sql = mysqli_query($pol, "SELECT * FROM uzytkownik WHERE login = '$_SESSION[login]'");
$sql1 = mysqli_query($pol, "SELECT * FROM platnosci WHERE id_uzytkownika = '$_SESSION[id]'");
$row = mysqli_fetch_assoc($sql);
$row1 = mysqli_fetch_assoc($sql1);
if($_SESSION['zalogowany'] == false){
    header("Location: logowanie.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <link rel = "stylesheet" href = "style.css"/>
    <link rel = "stylesheet" href = "styleindex.css"/>
    <script defer src = "scriptindex.js"></script>
    <title>Bank</title>
</head>
<body>
    <script>
        function time() {
    var datapokazywanie = document.getElementById("time");
    var data = new Date();
    datapokazywanie.innerHTML = data.toLocaleString();;
  };
  
  setInterval(time, 1000);
        </script>
    <div class ="pieniadze">
        <h1>Twoje środki: <?php echo"$row[pieniadze]"?> zł</h1>
        <button class = "login_przycisk" onclick = "window.location.href = 'przelew.php'">Zrób przelew</button>
    </div>
    <div class = "column">
        <div class = "header">
            <div class = "menu">
                <ul>
                    <h1><?php echo "Witaj: $row[login]"?></h1>
                    <h1 id = "time"></h1>
                    <a href ="logowanie.php" ><h1 id = "wyloguj" name = "Wyloguj"> Wyloguj <?php session_destroy() ?></h1></a>
                </ul>
            </div>
        </div>
    </div>
<!-- TODO:
    1. zrobic przelew
    2. zrobic wyswietlanie wszystkich przelewow
    3. zrobic wyswietlanie wszystkich platnosci
!-->


    <!--<div class = "wykres">
        <canvas id = "myChart" height="400" width="100"></canvas>
    </div>

    <script>
            const myChart = document.getElementById('myChart').getContext('2d');
            var wykres = new Chart(myChart, {
                type: 'line',
                data:{
                    labels:["Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec", "Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad", "Grudzień"],
                    datasets:[{
                        label: 'wydatki',
                        data:[
                            1000, //TODO: zmienic na dane z bazy oraz zrobic tabele wydatki
                            2000,
                            3000,
                            4000,
                            5000
                        ],
                       
                           
                        
                        borderWidth: 1,
                        borderColor: 'rgb(54, 162, 235)',
                    }],
                },
                options: {
                    responsive:true,
                    maintainAspectRatio: false,
                    scales:{
                        y:{
                            ticks:{
                                beginAtZero: true
                            }
                        }
                    }
             }
                
            });
</script>!-->
</body>
</html> 
