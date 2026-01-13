<?php
/**
 * Headers de controle de cache
 * Inclua este arquivo no início de todas as páginas PHP
 */

// Previne cache do navegador para páginas dinâmicas
header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Expires: 0');

// Header personalizado com versão do site (para verificação de atualizações)
header('X-Site-Version: 1.0');

// Security headers adicionais
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('X-XSS-Protection: 1; mode=block');

// Previne cache de recursos sensíveis
if (isset($_SERVER['REQUEST_URI'])) {
    $uri = $_SERVER['REQUEST_URI'];
    
    // Para páginas PHP, sempre revalida
    if (strpos($uri, '.php') !== false) {
        header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0, private');
    }
    
    // Para API endpoints, sem cache
    if (strpos($uri, '/api/') !== false) {
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Content-Type: application/json; charset=utf-8');
    }
}
?>
