<?php
// calculadora.PHP_emanueca
// GitHub: https://github.com/emanuecaIFFar/
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>primeira calculadora tst</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <main class="container">
    <h1>Calculadora PHP Simples</h1>

    <form action="recebe.php" method="post" class="card">
      <div class="grid">
        <label for="n1">Número 1</label>
        <input type="text" id="n1" name="n1" placeholder="Ex.: 12,5 ou 12.5" required>

        <label for="n2">Número 2</label>
        <input type="text" id="n2" name="n2" placeholder="Ex.: 3,2 ou 3.2" required>
      </div>

      <label for="op">Operação</label>
      <select id="op" name="op" required>
        <option value="add">Adição (+)</option>
        <option value="sub">Subtração (−)</option>
        <option value="mul">Multiplicação (×)</option>
        <option value="div">Divisão (÷)</option>
      </select>

      <button type="submit">Calcular</button>
    </form>

    <p class="hint">
    você pode usar vírgula (,) ou ponto (.) como separador decimal.
    </p>
  </main>
</body>
</html>
