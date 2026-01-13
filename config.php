<?php
/**
 * Configuração centralizada de paths
 * Define os caminhos corretos para assets e URLs internas
 * funciona tanto em desenvolvimento quanto em produção
 */

// Headers de controle de cache (aplica automaticamente em todas as páginas)
if (!headers_sent()) {
    header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
    header('Pragma: no-cache');
    header('Expires: 0');
    header('X-Site-Version: 1.0');
    
    // Security headers
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('X-XSS-Protection: 1; mode=block');
}

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

// Função auxiliar para gerar URLs de assets com Cache Busting usando filemtime()
function getAssetUrl($path) {
    global $assetBase;
    
    // Remove a barra inicial se houver
    $cleanPath = ltrim($path, '/');
    
    // Constrói o caminho do arquivo físico
    if (strpos($_SERVER['SCRIPT_FILENAME'], 'localhost') !== false || 
        strpos($_SERVER['SERVER_NAME'], 'localhost') !== false ||
        strpos($_SERVER['SERVER_NAME'], '127.0.0.1') !== false) {
        // Desenvolvimento local
        $filePath = __DIR__ . '/public/assets/' . $cleanPath;
    } else {
        // Produção
        $filePath = __DIR__ . '/public/assets/' . $cleanPath;
    }
    
    // Obtém o timestamp do arquivo para cache busting
    $version = '';
    if (file_exists($filePath)) {
        $version = '?v=' . filemtime($filePath);
    }
    
    $url = $assetBase . '/' . $cleanPath;
    return $url . $version;
}

// Função auxiliar para gerar URLs internas
function getRootUrl($path) {
    global $rootPath;
    return $rootPath . '/' . ltrim($path, '/');
}
?>
