<!DOCTYPE html>
<html lang="pt-BR">
<?php
// Carrega configurações centralizadas
require __DIR__ . '/../../config.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <link rel="icon" type="image/svg+xml" href="<?= $assetBase ?>/images/logo/LogoPredileto.svg">
    <link rel="alternate icon" type="image/png" sizes="32x32" href="<?= $assetBase ?>/images/logo/logoPredileto.png">
    <link rel="stylesheet" href="<?= getAssetUrl('css/header.css') ?>">
    <link rel="stylesheet" href="<?= getAssetUrl('css/footer.css') ?>">
    <link rel="stylesheet" href="<?= getAssetUrl('css/cardapio.css') ?>">
    <link rel="stylesheet" href="<?= getAssetUrl('css/alerts.css') ?>">
    <link rel="stylesheet" href="<?= getAssetUrl('css/responsive.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Todos os Pratos - Predileto</title>
</head>
<body>
    
        <?php include __DIR__ . "/../components/header.php" ?>
    

    <main>
        <section class="todos-pratos-container">
            <div class="menu-header">
                <span class="menu-label"><h1>Menu</h1></span>
                <h2>Pratos Populares</h2>
            </div>

            <div class="todos-pratos-header">
                <div class="search-box">
                    <input type="text" id="searchInput" placeholder="Buscar pratos...">
                    <button type="button"><i class="bi bi-search"></i></button>
                </div>
                <div class="filter-btns">
                    <button class="filter-btn active" data-filter="todos">Todos</button>
                    <button class="filter-btn" data-filter="carne">Carne</button>
                    <button class="filter-btn" data-filter="massa">Massas</button>
                    <button class="filter-btn" data-filter="peixe">Peixe</button>
                </div>
            </div>

            <div class="todas-cards-container" id="todosCardsContainer"></div>
        </section>
    </main>

    <?php include __DIR__ . "/../components/footer.php" ?>

    <script>
        // Passa a configuração do PHP para o JavaScript
        window.ASSET_BASE_PATH = '<?= $assetBase ?>';
    </script>
    <script src="<?= getAssetUrl('js/cache-control.js') ?>"></script>
    <script src="<?= getAssetUrl('js/cardapio-data.js') ?>"></script>
    <script src="<?= getAssetUrl('js/todos-pratos.js') ?>"></script>
    <script src="<?= getAssetUrl('js/header.js') ?>"></script>
</body>
</html>
