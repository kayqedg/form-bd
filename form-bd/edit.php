<?php
if (!empty($_GET['id'])) {

  include_once('config.php');


  $id = $_GET['id'];

  $sqlSelect = "SELECT * FROM users WHERE id_user=$id";

  $result = $conexao->query($sqlSelect);

  if ($result->num_rows > 0) {
    while ($user_data = mysqli_fetch_assoc($result)) {
      $nome = $user_data['nome'];
      $email = $user_data['email'];
      $senha = $user_data['senha'];
      $sexo = $user_data['sexo'];
      $data_nasc = $user_data['data_nasc'];
      $estado = $user_data['estado'];
      $cidade = $user_data['cidade'];
      $endereco = $user_data['endereco'];
    }
    echo "$data_nasc";

  } else {
    header("Location: sistema.php");
  }


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
  <form action="save-edit.php" method="post" class="form">
    <fieldset class="form-fieldset">
      <legend class="form-legend">Registre-se</legend>
      <div class="inputs-div">
        <div class="input-box">
          <input type="text" name="nome" class="input-text" autocomplete="off" value="<?php echo $nome ?>" required />
          <label for="nome" class="input-label">Nome</label> <br />
        </div>

        <div class="input-box">
          <input type="text" name="email" id="" class="input-text" autocomplete="off" value="<?php echo $email ?>"
            required />
          <label for="email" class="input-label">Email</label> <br />
        </div>

        <div class="input-box">
          <input type="text" name="senha" id="" class="input-text" autocomplete="off" value="<?php echo $senha ?>"
            required />
          <label for="senha" class="input-label">Senha</label> <br />
        </div>

        <p>Sexo:</p>
        <input class="input-radio" type="radio" name="sexo" id="fem" value="feminino" <?php echo $sexo == 'feminino ' ? 'checked' : '' ?> required />
        <label for="fem">Feminino</label> <br />
        <input class="input-radio" type="radio" name="sexo" id="masc" value="masculino" <?php echo $sexo == 'masculino' ? 'checked' : '' ?> required />
        <label for="masc">Masculino</label> <br />

        <label for="data-nasc">Data de Nascimento:</label>
        <input type="date" name="data-nasc" id="data-nasc" value="<?php echo $data_nasc ?>" required /> <br />

        <div class="input-box">
          <input type="text" name="estado" id="" class="input-text" autocomplete="off" value="<?php echo $estado ?>"
            required />
          <label for="estado" class="input-label">Estado</label> <br />
        </div>

        <div class="input-box">
          <input type="text" name="cidade" id="" class="input-text" autocomplete="off" value="<?php echo $cidade ?>"
            required />
          <label for="cidade" class="input-label">Cidade</label> <br />
        </div>

        <div class="input-box">
          <input type="text" name="endereco" id="" class="input-text" autocomplete="off" value="<?php echo $endereco ?>"
            required />
          <label for="endereco" class="input-label">Endereço</label> <br />
        </div>
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="submit" name="update" value="Enviar" id="update" />
        <br />
        <p style="margin-left: 1rem">
          <a href="sistema.php" style="color: blueviolet">Voltar</a>
        </p>
        <br />
      </div>
    </fieldset>
  </form>
</body>

</html>