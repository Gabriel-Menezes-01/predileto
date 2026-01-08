<!DOCTYPE html>
<html lang="pt-BR">
<?php
// Carrega configurações centralizadas
require __DIR__ . '/../../config.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $assetBase ?>/css/header.css">
    <link rel="stylesheet" href="<?= $assetBase ?>/css/footer.css">
    <link rel="stylesheet" href="<?= $assetBase ?>/css/cardapio.css">
    <link rel="stylesheet" href="<?= $assetBase ?>/css/alerts.css">
    <link rel="stylesheet" href="<?= $assetBase ?>/css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Cardápio - Predileto</title>
</head>
<body>
    
        <?php include __DIR__ . "/../components/header.php" ?>

    <main>
        <!-- Pratos Populares Carne -->
        <section class="menu-section">
            <div class="menu-header">
                <span class="menu-label">Menu</span>
                <h2>Pratos Populares Carne</h2>
                <p>Descubra nossas seleções premium de carnes grelhadas, preparadas com técnicas tradicionais portuguesas e acompanhadas pelos melhores temperos.</p>
            </div>
            <div class="cards-container" id="carneContainer"></div>
            <div class="btn-ver-todos">
                <a href="<?= $rootPath ?>/pages/todos-os-pratos.php">Ver todos os pratos</a>
            </div>
        </section>

            <div class="imgPrato">
                <img src="<?= $assetBase ?>/images/logoMenu/carne.png" alt="Prato de carne com legumes"
                >
            </div>

        <!-- Pratos Populares Massa -->
        <section class="menu-section">
            <div class="menu-header">
                <h2>Pratos Populares Massa</h2>
                <p>Massas frescas preparadas artesanalmente com molhos autênticos, combinando ingredientes nobres em cada preparação deliciosa.</p>
            </div>
            <div class="cards-container" id="massaContainer"></div>
            <div class="btn-ver-todos">
                <a href="<?= $rootPath ?>/pages/todos-os-pratos.php">Ver todos os pratos</a>
            </div>
        </section>

            <div class="imgPrato">
                <img src="<?= $assetBase ?>/images/logoMenu/peixe.png" alt="Pratos de massa">
            </div>

        <!-- Pratos Populares Peixe -->
        <section class="menu-section">
            <div class="menu-header">
            
                <h2>Pratos Populares Peixe</h2>
                <p>Peixes frescos do dia, preparados na perfeição com técnicas clássicas que realçam o sabor natural e a qualidade premium.</p>
            </div>
            <div class="cards-container" id="peixeContainer"></div>
            <div class="btn-ver-todos">
                <a href="<?= $rootPath ?>/pages/todos-os-pratos.php">Ver todos os pratos</a>
            </div>
        </section>

    </main>

    <?php include __DIR__ . "/../components/footer.php" ?>

    <script>
        // Passa a configuração do PHP para o JavaScript
        window.ASSET_BASE_PATH = '<?= $assetBase ?>';
    </script>
    <script src="<?= $assetBase ?>/js/cardapio-data.js"></script>
    <script src="<?= $assetBase ?>/js/cardapio.js"></script>
    <script src="<?= $assetBase ?>/js/header.js"></script>
</body>
</html>
