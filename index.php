<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Witaj <?php echo $_SESSION['login']; ?> </title>
</head>
<body>
    <h1>Witaj</h1>
    
</body>
</html>