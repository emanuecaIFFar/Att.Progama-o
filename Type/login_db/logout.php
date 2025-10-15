<?php
// Inicia a sessão para poder destruí-la
session_start();

// Remove todas as variáveis da sessão (limpa os dados de login)
session_unset();

// Destrói a sessão completamente
session_destroy();

// Redireciona o usuário de volta para a página de login
header('Location: login.php');
exit;
?>