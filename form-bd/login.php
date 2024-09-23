<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KS - Login</title>
  </head>
  <link rel="stylesheet" href="style.css" />
  <body>
    <form action="login-test.php" method="post" class="form">
      <fieldset class="form-fieldset">
        <legend class="form-legend">Login</legend>
        <div class="inputs-div">
          <div class="input-box">
            <input
              type="text"
              name="email"
              class="input-text"
              autocomplete="off"
              required
            />
            <label for="nome" class="input-label">Email</label>
          </div>

          <div class="input-box">
            <input
              type="password"
              name="senha"
              id=""
              class="input-text"
              autocomplete="off"
              required
            />
            <label for="senha" class="input-label">Senha</label> <br />
          </div>
          <p style="font-size: 66%; margin-left: 8rem">
            Não possui uma conta?
            <a href="register.php" style="color: blueviolet">Registre-se</a>
          </p>

          <input type="submit" name="submit" value="Entrar" id="submit" />
        </div>
      </fieldset>
    </form>
  </body>
</html>
