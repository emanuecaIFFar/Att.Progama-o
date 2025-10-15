<?php
session_start();

// opcional: impedir acesso sem login
if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit;
}
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Sucesso</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <main class="card">
    <h1>Sucesso</h1>
    <p class="msg ok">Login efetuado com sucesso. Bem-vindo, <?php echo htmlspecialchars($_SESSION['user_nome']); ?>!</p>
    <p class="tip"><a href="logout.php">Sair</a></p>
  </main>
</body>
</html>
