<?php
/**
 * Arquivo raiz que redireciona para a página inicial
 */

// Headers para controle de cache
header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Expires: 0');

// Detecta o caminho base dinamicamente
$basePath = dirname($_SERVER['PHP_SELF']);
$redirectUrl = $basePath . './public/inicio.php';

// Redireciona para inicio.php
header('Location: ' . $redirectUrl);
exit;
?>
