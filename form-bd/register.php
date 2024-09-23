<?php
if (isset($_POST['submit'])) {
  // print_r($_POST['nome']);
  // print_r('<br>'); 
  // print_r($_POST['email']);
  // print_r('<br />'); 
  //print_r($_POST['tel']);
  // print_r('<br />');
  // print_r($_POST['sexo']);
  //print_r('<br />');
  // print_r($_POST['data-nasc']);
  // print_r('<br />');
  //print_r($_POST['estado']);
  // print_r('<br />');
  // print_r($_POST['cidade']);
  //print_r('<br />');
  // print_r($_POST['endereco']);
  include_once('config.php');
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $sexo = $_POST['sexo'];
  $data_nasc = $_POST['data-nasc'];
  $estado = $_POST['estado'];
  $cidade = $_POST['cidade'];
  $endereco = $_POST['endereco'];

  $result = mysqli_query($conexao, "INSERT INTO 
    users(
    nome, 
    email, 
    senha, 
    sexo, 
    data_nasc, 
    estado, 
    cidade, 
    endereco
    )
    VALUES (
    '$nome', 
    '$email', 
    '$senha', 
    '$sexo', 
    '$data_nasc', 
    '$estado', 
    '$cidade',
    '$endereco'
    )");
  print_r("<script>alert('Registrado com sucesso!')</script>");
}
;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>KS - Register</title>
</head>
<link rel="stylesheet" href="style.css" />

<body>
  <form action="register.php" method="post" class="form">
    <fieldset class="form-fieldset">
      <legend class="form-legend">Registre-se</legend>
      <div class="inputs-div">
        <div class="input-box">
          <input type="text" name="nome" class="input-text" autocomplete="off" required />
          <label for="nome" class="input-label">Nome</label> <br />
        </div>

        <div class="input-box">
          <input type="text" name="email" id="" class="input-text" autocomplete="off" required />
          <label for="email" class="input-label">Email</label> <br />
        </div>

        <div class="input-box">
          <input type="password" name="senha" id="" class="input-text" autocomplete="off" required />
          <label for="senha" class="input-label">Senha</label> <br />
        </div>

        <p>Sexo:</p>
        <input class="input-radio" type="radio" name="sexo" id="fem" value="feminino" required />
        <label for="fem">Feminino</label> <br />
        <input class="input-radio" type="radio" name="sexo" id="masc" value="masculino" required />
        <label for="masc">Masculino</label> <br />

        <label for="data-nasc">Data de Nascimento:</label>
        <input type="date" name="data-nasc" id="data-nasc" required /> <br />

        <div class="input-box">
          <input type="text" name="estado" id="" class="input-text" autocomplete="off" required />
          <label for="estado" class="input-label">Estado</label> <br />
        </div>

        <div class="input-box">
          <input type="text" name="cidade" id="" class="input-text" autocomplete="off" required />
          <label for="cidade" class="input-label">Cidade</label> <br />
        </div>

        <div class="input-box">
          <input type="text" name="endereco" id="" class="input-text" autocomplete="off" required />
          <label for="endereco" class="input-label">Endereço</label> <br />
        </div>

        <input type="submit" name="submit" value="Enviar" id="submit" />
        <br />
        <p style="margin-left: 1rem">
          Já possui conta? <a href="login.php" style="color: blueviolet">Entrar</a>
        </p>
        <br />
      </div>
    </fieldset>
  </form>
</body>

</html>