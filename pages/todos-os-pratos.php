<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../predileto/css/cardapio.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Todos os Pratos - Predileto</title>
</head>
<body>
    
        <?php include "../../predileto/components/header.php" ?>
    

    <main>
        <section class="todos-pratos-container">
            <div class="menu-header">
                <span class="menu-label">Menu</span>
                <h2>Popular Dishes</h2>
            </div>

            <div class="todos-pratos-header">
                <div class="search-box">
                    <input type="text" id="searchInput" placeholder="Search Here">
                    <button type="button"><i class="bi bi-search"></i></button>
                </div>
                <div class="filter-btns">
                    <button class="filter-btn active" data-filter="todos">Todos</button>
                    <button class="filter-btn" data-filter="carne">Carne</button>
                    <button class="filter-btn" data-filter="frango">Frango</button>
                    <button class="filter-btn" data-filter="peixe">Peixe</button>
                </div>
            </div>

            <div class="todas-cards-container" id="todosCardsContainer"></div>
        </section>
    </main>

    <?php include "../components/footer.php" ?>

    <script src="../../predileto/js/cardapio-data.js"></script>
    <script src="../../predileto/js/todos-pratos.js"></script>
</body>
</html>
