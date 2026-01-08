<?php
/**
 * Configuração centralizada de paths
 * Define os caminhos corretos para assets e URLs internas
 * funciona tanto em desenvolvimento quanto em produção
 */

// Detecta o ambiente
$isLocalhost = isset($_SERVER['SERVER_NAME']) && 
               (strpos($_SERVER['SERVER_NAME'], 'localhost') !== false || 
                strpos($_SERVER['SERVER_NAME'], '127.0.0.1') !== false);

// Define o base path baseado na URL atual
if ($isLocalhost) {
    // Desenvolvimento local: localhost/predileto/
    $assetBase = '/predileto/public/assets';
    $rootPath = '/predileto/public';
    $publicPath = '/predileto/public';
} else {
    // Produção: https://prediletonegri.com/
    // Ajuste conforme necessário se o site não estiver na raiz
    $assetBase = '/public/assets';
    $rootPath = '/public';
    $publicPath = '/public';
}

// Função auxiliar para gerar URLs de assets
function getAssetUrl($path) {
    global $assetBase;
    return $assetBase . '/' . ltrim($path, '/');
}

// Função auxiliar para gerar URLs internas
function getRootUrl($path) {
    global $rootPath;
    return $rootPath . '/' . ltrim($path, '/');
}
?>
