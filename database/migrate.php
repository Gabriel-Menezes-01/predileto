<?php
/**
 * Script de migração dos dados do cardápio
 * Para ser executado uma única vez via navegador
 * Acesso: http://localhost/predileto/database/migrate.php
 */

require_once __DIR__ . '/db_config.php';

// Verificar se já foi migrado
$check = $conn->query("SELECT COUNT(*) as count FROM cardapio");
$row = $check->fetch_assoc();

if ($row['count'] > 0) {
    echo "✓ Dados já foram migrados! Total de " . $row['count'] . " pratos no banco.<br>";
    echo "Se deseja limpar e remigrear, delete a tabela cardapio primeiro.";
    exit;
}

// Dados para migrar (compatível com cardapio-data.js)
$dados = [
    // Carnes
    [
        'nome' => 'Picanha',
        'tipo' => 'carne',
        'imagem' => '/predileto/public/assets/images/imgCardapio/picanha.jpg',
        'preco' => 11.50,
        'rating' => 5,
        'descricao' => 'Picanha suculenta e macia'
    ],
    [
        'nome' => 'Bitoque de Vaca',
        'tipo' => 'carne',
        'imagem' => '/predileto/public/assets/images/imgCardapio/bitoqueCarne.jpeg',
        'preco' => 9.50,
        'rating' => 5,
        'descricao' => 'Bife de vaca suculento'
    ],
    [
        'nome' => 'Bitoque de Frango',
        'tipo' => 'carne',
        'imagem' => '/predileto/public/assets/images/imgCardapio/bitoqueFrango.png',
        'preco' => 9.50,
        'rating' => 5,
        'descricao' => 'Peito de frango suculento'
    ],
    [
        'nome' => 'Bife Vazia',
        'tipo' => 'carne',
        'imagem' => '/predileto/public/assets/images/imgCardapio/bifeVazia.png',
        'preco' => 11.00,
        'rating' => 5,
        'descricao' => 'Bife vazio suculento'
    ],
    [
        'nome' => 'Maminha',
        'tipo' => 'carne',
        'imagem' => '/predileto/public/assets/images/imgCardapio/picanha.jpg',
        'preco' => 9.50,
        'rating' => 5,
        'descricao' => 'Maminha suculenta e macia'
    ],
    [
        'nome' => 'Chapa Mista 2 Pessoas',
        'tipo' => 'carne',
        'imagem' => '/predileto/public/assets/images/imgCardapio/MassaDeCarne.jpg',
        'preco' => 20.00,
        'rating' => 5,
        'descricao' => 'Chapa com variedade de carnes para 2 pessoas'
    ],
    // Massas
    [
        'nome' => 'Massa de Carne',
        'tipo' => 'massa',
        'imagem' => '/predileto/public/assets/images/imgCardapio/MassaDeCarne.jpg',
        'preco' => 7.90,
        'rating' => 5,
        'descricao' => 'Espaguete à bolonhesa tradicional'
    ],
    [
        'nome' => 'Massa de Camarão',
        'tipo' => 'massa',
        'imagem' => '/predileto/public/assets/images/imgCardapio/bitoqueFrango.png',
        'preco' => 8.00,
        'rating' => 5,
        'descricao' => 'Espaguete com camarão ao molho de tomate'
    ],
];

// Inserir dados
$count = 0;
foreach ($dados as $prato) {
    $stmt = $conn->prepare("INSERT INTO cardapio (nome, tipo, imagem, preco, rating, descricao) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssdir", 
        $prato['nome'], 
        $prato['tipo'], 
        $prato['imagem'], 
        $prato['preco'], 
        $prato['rating'], 
        $prato['descricao']
    );
    
    if ($stmt->execute()) {
        $count++;
    }
}

echo "✓ Migração concluída! " . $count . " pratos inseridos no banco de dados.";
$conn->close();
?>
