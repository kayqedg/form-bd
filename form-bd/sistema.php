<?php
    session_start();
    print_r($_SESSION);
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header("Location: login.php");
    }
    $logado = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KS - System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="text-align: center;">
    <h1>Acessou o Sistema</h1>
    <?php
    echo "<h2>Bem Vindo <u>$logado</u></h2>";
    echo "<br>";
    ?>
    <button><a href="sair.php">Sair</a></button>
</body>
</html>