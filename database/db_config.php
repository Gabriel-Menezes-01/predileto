<?php
/**
 * Configuração do Banco de Dados MySQL
 * Conexão centralizada para o cardápio
 */

// Dados de conexão
$db_host = 'localhost:3306';
$db_user = 'u554038308_Predileto';
$db_pass = '@Predileto28'; 
$db_name = 'u554038308_Predileto'; 

// Criar conexão
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro de conexão com banco de dados: " . $conn->connect_error);
}

// Definir charset UTF-8
$conn->set_charset("utf8");

?>
