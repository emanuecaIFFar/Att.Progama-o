<?php
$erro = isset($_GET['erro']) ? intval($_GET['erro']) : 0;
$ok   = isset($_GET['ok']) ? intval($_GET['ok']) : 0;
?>

<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Login_atividade</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--CSS-->
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <main class="card">
    <h1>Entrar</h1>

    <?php if ($erro === 1): ?>
      <p class="msg erro">senha incorreta. tente novamente.</p>
    <?php elseif ($erro === 2): ?>
      <p class="msg erro">Por favor, preencha todos os campos.</p>
    <?php endif; ?>

    <?php if ($ok === 1): ?>
      <p class="msg ok">login realizado com sucesso. Vou te redirecionar...</p>
    <?php endif; ?>

    <form class="form" method="post" action="verifica_usuario.php">
      <label class="label">
        <span>E-mail</span>
        <input class="input" type="email" name="email" placeholder="voce@exemplo.com" required>
      </label>

      <label class="label">
        <span>Senha</span>
        <input class="input" type="password" name="senha" placeholder="********" required>
      </label>

      <button class="btn" type="submit">Entrar</button>

      <p class="tip">senha de teste:
    <br>Email: <strong>emanuelif@gmail.com</strong>
    <br>Senha: <strong>123456</strong>
  </p>
    </form>
  </main>
</body>
</html>
