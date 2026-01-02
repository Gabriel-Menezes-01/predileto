<?php
header('Content-Type: application/json');

// Avaliações adicionadas manualmente (copie do Google Maps do seu cliente)
// Você pode atualizar isso periodicamente
$reviews = array(
    array(
        'author' => 'João Silva',
        'rating' => 5,
        'text' => 'Excelente comida e atendimento! O ambiente é muito acolhedor. Voltarei com certeza!',
        'profile_photo_url' => 'https://via.placeholder.com/150?text=João',
        'time' => '2 semanas atrás'
    ),
    array(
        'author' => 'Maria Santos',
        'rating' => 5,
        'text' => 'Adorei! Os pratos são muito bem apresentados e têm um sabor incrível. Recomendo!',
        'profile_photo_url' => 'https://via.placeholder.com/150?text=Maria',
        'time' => '1 mês atrás'
    ),
    array(
        'author' => 'Carlos Costa',
        'rating' => 4,
        'text' => 'Muito bom mesmo. Comida fresca e equipe atenciosa. Preço justo.',
        'profile_photo_url' => 'https://via.placeholder.com/150?text=Carlos',
        'time' => '2 meses atrás'
    ),
    array(
        'author' => 'Ana Oliveira',
        'rating' => 5,
        'text' => 'Perfeito! Prato suculento, apresentação impecável. Ambiente lindo!',
        'profile_photo_url' => 'https://via.placeholder.com/150?text=Ana',
        'time' => '3 meses atrás'
    ),
    array(
        'author' => 'Roberto Dias',
        'rating' => 4,
        'text' => 'Ótima escolha para uma refeição especial. Voltaria!',
        'profile_photo_url' => 'https://via.placeholder.com/150?text=Roberto',
        'time' => '3 meses atrás'
    )
);

// Filtrar apenas avaliações com 4 ou 5 estrelas
$filteredReviews = array_filter($reviews, function($review) {
    return $review['rating'] >= 4;
});

// Retornar como JSON
echo json_encode(array_values($filteredReviews));
?>

