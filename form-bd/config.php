<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = 'Kaka9090';
$dbName = 'db_form';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conexao -> connect_errno) {
    echo 'Erro';
} else {
    echo "Conexão efetuada";
    echo "<br>";
}
?>