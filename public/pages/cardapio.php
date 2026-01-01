<!DOCTYPE html>
<html lang="pt-BR">
<?php
$assetBase = '../assets';
$rootPath  = '..';
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
                <span class="menu-label"><h1>Menu</h1></span>
                <h2>Pratos Populares Carne</h2>
                <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content making.</p>
            </div>
            <div class="cards-container" id="carneContainer"></div>
            <div class="btn-ver-todos">
                <a href="./todos-os-pratos.php">Ver todos os pratos</a>
            </div>
        </section>

            <div class="imgPrato">
                <img src="<?= $assetBase ?>/images/menu/prato1.jpg" alt="Prato de carne com legumes">
            </div>

        <!-- Pratos Populares Frango -->
        <section class="menu-section">
            <div class="menu-header">
                <span class="menu-label">Menu</span>
                <h2>Pratos Populares Frango</h2>
                <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content making.</p>
            </div>
            <div class="cards-container" id="frangoContainer"></div>
            <div class="btn-ver-todos">
                <a href="./todos-os-pratos.php">Ver todos os pratos</a>
            </div>
        </section>

            <div class="imgPrato">
                <img src="<?= $assetBase ?>/images/menu/prato1.jpg" alt="Prato de carne com legumes">
            </div>

        <!-- Pratos Populares Peixe -->
        <section class="menu-section">
            <div class="menu-header">
                <span class="menu-label">Menu</span>
                <h2>Pratos Populares Peixe</h2>
                <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content making.</p>
            </div>
            <div class="cards-container" id="peixeContainer"></div>
            <div class="btn-ver-todos">
                <a href="./todos-os-pratos.php">Ver todos os pratos</a>
            </div>
        </section>

    </main>

    <?php include __DIR__ . "/../components/footer.php" ?>

    <script src="<?= $assetBase ?>/js/cardapio-data.js"></script>
    <script src="<?= $assetBase ?>/js/cardapio.js"></script>
    <script src="<?= $assetBase ?>/js/header.js"></script>
</body>
</html>
