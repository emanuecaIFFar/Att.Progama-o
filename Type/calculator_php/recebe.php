<?php
$erro = null;
$resultado = null;
$simbolo = '';

$n1_raw = $_POST['n1'] ?? '';
$n2_raw = $_POST['n2'] ?? '';
$op     = $_POST['op'] ?? '';

if (empty($n1_raw) || empty($n2_raw) || empty($op)) {
    $erro = "Requisição inválida. Preencha todos os campos do formulário.";
} else {
    $n1_str_normalizada = str_replace(',', '.', str_replace('.', '', $n1_raw));
    $n2_str_normalizada = str_replace(',', '.', str_replace('.', '', $n2_raw));

    if (!is_numeric($n1_str_normalizada) || !is_numeric($n2_str_normalizada)) {
        $erro = "Entrada inválida. Use apenas números (ex.: 12.5 ou 12,5).";
    } else {
        $n1 = (float)$n1_str_normalizada;
        $n2 = (float)$n2_str_normalizada;

        if ($op === 'div' && $n2 == 0) {
            $erro = "Erro: divisão por zero não é permitida.";
        }
    }
}

if ($erro === null) {
    $operacoes = [
        'add' => ['simbolo' => '+', 'calculo' => fn($a, $b) => $a + $b],
        'sub' => ['simbolo' => '−', 'calculo' => fn($a, $b) => $a - $b],
        'mul' => ['simbolo' => '×', 'calculo' => fn($a, $b) => $a * $b],
        'div' => ['simbolo' => '÷', 'calculo' => fn($a, $b) => $a / $b],
    ];

    if (isset($operacoes[$op])) {
        $simbolo   = $operacoes[$op]['simbolo'];
        $resultado = $operacoes[$op]['calculo']($n1, $n2);
    } else {
        $erro = "Operação inválida.";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Resultado - Calculadora PHP Simples</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="container">
        <h1>Resultado</h1>

        <?php if ($erro): ?>
            <div class="alert error">
                <?= htmlspecialchars($erro) ?>
            </div>
        <?php else: ?>
            <div class="card result">
                <p>
                    <strong>Cálculo:</strong>
                    <?= htmlspecialchars($n1_raw) ?> <?= $simbolo ?> <?= htmlspecialchars($n2_raw) ?>
                </p>
                <p>
                    <strong>Resultado:</strong>
                    <?= rtrim(rtrim(number_format($resultado, 10, ',', '.'), '0'), ',') ?>
                </p>
            </div>
        <?php endif; ?>

        <a class="button" href="calculadora.php">← Voltar</a>
    </main>
</body>
</html>