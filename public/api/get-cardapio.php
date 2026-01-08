<?php
/**
 * API para buscar cardápio do banco de dados
 * Retorna os dados em formato JSON
 */

header('Content-Type: application/json');
require_once __DIR__ . '/../database/db_config.php';

// Receber tipo de prato (opcional)
$tipo = isset($_GET['tipo']) ? $conn->real_escape_string($_GET['tipo']) : null;

// Construir query
$query = "SELECT id, nome, tipo, imagem, preco, rating, descricao FROM cardapio WHERE ativo = TRUE";

if ($tipo) {
    $query .= " AND tipo = '$tipo'";
}

$query .= " ORDER BY id ASC";

// Executar query
$result = $conn->query($query);

if (!$result) {
    echo json_encode(['erro' => 'Erro ao buscar cardápio: ' . $conn->error]);
    exit;
}

// Preparar dados
$pratos = [];
while ($row = $result->fetch_assoc()) {
    $pratos[] = [
        'id' => (int)$row['id'],
        'nome' => $row['nome'],
        'tipo' => $row['tipo'],
        'imagem' => $row['imagem'],
        'preco' => (float)$row['preco'],
        'rating' => (int)$row['rating'],
        'descricao' => $row['descricao']
    ];
}

echo json_encode($pratos);
$conn->close();
?>
