<?php
session_start();

// Mostrar erros em ambiente de desenvolvimento (remova/ajuste em produção)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// pega dados com segurança
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

if ($email === '' || $senha === '') {
    // falta campo
    header('Location: login.php?erro=2');
    exit;
}

// encripta (banco usa MD5 atualmente)
$senha_encriptada = md5($senha);

require 'config.php'; // assume $conexao definido aqui

// checa conexão com o banco
if (!$conexao || mysqli_connect_errno()) {
    error_log('DB connection failed: ' . mysqli_connect_error());
    // redireciona com erro genérico
    header('Location: login.php?erro=1');
    exit;
}

// modo debug: mostra o hash armazenado para o email (use apenas em dev)
if (isset($_GET['debug']) && $_GET['debug'] == '1') {
    if ($dbg = $conexao->prepare("SELECT senha FROM usuario WHERE email = ?")) {
        $dbg->bind_param('s', $email);
        $dbg->execute();
        $dbg->bind_result($stored_hash);
        if ($dbg->fetch()) {
            echo "Enviado MD5: " . htmlspecialchars($senha_encriptada) . "<br>Hash no banco: " . htmlspecialchars($stored_hash);
        } else {
            echo "Nenhum usuário encontrado com esse e-mail.";
        }
        $dbg->close();
    } else {
        echo "Erro no prepare debug: " . htmlspecialchars($conexao->error);
    }
    exit;
}

// prepared statement (mais seguro)
if ($stmt = $conexao->prepare("SELECT id_usuario, nome FROM usuario WHERE email = ? AND senha = ?")) {
    $stmt->bind_param('ss', $email, $senha_encriptada);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id_usuario, $nome);
        $stmt->fetch();

        // guarda dados mínimos na sessão
        $_SESSION['user_id'] = $id_usuario;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_nome'] = $nome;

        // fechar statement antes do redirect
        $stmt->close();

        // redireciona para página de sucesso (ou restrito)
        header('Location: sucesso.php?ok=1');
        exit;
    } else {
        // credenciais inválidas
        $stmt->close();
        header('Location: login.php?erro=1');
        exit;
    }
} else {
    // erro
    // opcional: log do erro e notificar
    header('Location: login.php?erro=1');
    exit;
}
