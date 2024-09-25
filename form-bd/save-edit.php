<?php
include_once('config.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $sexo = $_POST['sexo'];
    $data_nasc = $_POST['data-nasc'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $endereco = $_POST['endereco'];

    $sqlUpdate = "UPDATE users SET nome = '$nome', email = '$email', senha = '$senha', sexo = '$sexo', data_nasc = '$data_nasc', estado = '$estado', cidade = '$cidade', endereco = '$endereco' WHERE id_user = '$id'";

    $result = $conexao->query($sqlUpdate);

    header('Location: sistema.php');
}
?>