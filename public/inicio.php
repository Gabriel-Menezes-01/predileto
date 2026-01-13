<?php
session_start();

// Headers para controle de cache - força o navegador a revalidar
header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Expires: 0');

// Carrega configurações centralizadas
require __DIR__ . '/../config.php';
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <link rel="icon" type="image/svg+xml" href="<?= $assetBase ?>/images/logo/LogoPredileto.svg">
    <link rel="alternate icon" type="image/png" sizes="32x32" href="<?= $assetBase ?>/images/logo/logoPredileto.png">
    <link rel="stylesheet" href="<?= getAssetUrl('css/header.css') ?>">
    <link rel="stylesheet" href="<?= getAssetUrl('css/footer.css') ?>">
    <link rel="stylesheet" href="<?= getAssetUrl('css/inicio.css') ?>">
    <link rel="stylesheet" href="<?= getAssetUrl('css/cardapio.css') ?>">
    <link rel="stylesheet" href="<?= getAssetUrl('css/phone.css') ?>">
    <link rel="stylesheet" href="<?= getAssetUrl('css/alerts.css') ?>">
    <link rel="stylesheet" href="<?= getAssetUrl('css/responsive.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.3.2/css/flag-icons.min.css">
    <title>Predileto</title>
</head>
<body>
    <?php include __DIR__ . "/components/header.php" ?>

<main class="mainInicio">
    <section class="hero-section">
        <div class="hero-container">
            <div class="hero-content">
                <h1 class="hero-title">
                    Bem-vindo ao 
                    <span class="highlight">Predileto</span>
                </h1>
                <p class="hero-subtitle">Uma experiência gastronômica inesquecível</p>
                <a href="<?= $rootPath ?>/pages/cardapio.php" class="hero-btn">Ver Menu</a>
            </div>
            <div class="hero-image">
                <div class="hero-image-wrapper">
                    <img src="<?= $assetBase ?>/images/gallery/predileto.jpg" alt="Interior acolhedor do restaurante Predileto com iluminação ambiente">
                    
                </div>
                
            </div>
        </div>
    </section>
    <section class="info-bar" id="contato">
        <a href="https://maps.google.com/?q=Praceta+vale+paraíso,+2765-053+Estoril" target="_blank" class="info-item info-location">
            <div class="info-icon"><i class="bi bi-geo-alt"></i></div>
            <div>
                <h3>Localização</h3>
                <p>R.Praceta vale paraíso, 2765-053 Estoril </p>
            </div>
        </a>
        <div class="info-item">
            <div class="info-icon"><i class="bi bi-clock"></i></div>
            <div>
                <h3>Aberto</h3>
                <p>Domingo a Segunda: 12h às 23h30</p>
            </div>
        </div>
        <a href="https://wa.me/351926233942?text=Olá%20Predileto%2C%20gostaria%20de%20fazer%20uma%20reserva!" target="_blank" class="info-item info-reservation">
            <div class="info-icon"><i class="bi bi-envelope"></i></div>
            <div>
                <h3>Reserva</h3>
                <p>+351 926 233 942</p>
            </div>
        </a>
    </section>

    <section class="history-section" id="sobre">
        <div class="history-grid">
            <div class="history-image">
                <img src="<?= $assetBase ?>/images/gallery/predileto2.jpg" alt="Mesas postas no restaurante Predileto">
            </div>
            <div class="history-text">
                <h2>A História</h2>
                <p>O Predileto nasceu para celebrar encontros, sabores autorais e um ambiente acolhedor. Com ingredientes frescos e técnicas contemporâneas, entregamos pratos marcantes e experiências memoráveis.</p>
            </div>
        </div>
    </section>

    <section class="services-section" id="servicos">
        <div class="services-container">
            <div class="services-text">
                <span class="services-label">O QUE OFERECEMOS</span>
                <h2 class="services-title">Nossos excelentes serviços</h2>
                <p class="services-description">Oferecemos uma variedade de serviços, incluindo catering personalizado, eventos privados e menus sazonais que atendem a todos os gostos.</p>
            </div>

            <div class="services-cards">
                <div class="service-card">
                    <div class="service-icon"><i class="bi bi-journal-bookmark"></i></div>
                    <p class="service-name">Menus Especiais</p>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="bi bi-calendar-event"></i></div>
                    <p class="service-name">Aberto 15/6</p>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="bi bi-scooter"></i></div>
                    <p class="service-name">Entrega em domicílio</p>
                </div>
            </div>
        </div>
    </section>

    <section class="popular-dishes-section" id="menu">
        <div class="section-header">
            <span class="section-label">MENU</span>
            <h2 class="section-title">Pratos populares</h2>
            <p class="section-description">Descubra nossos pratos autorais, feitos com ingredientes frescos e técnicas contemporâneas. Cada prato é preparado com cuidado para oferecer uma experiência gastronômica memorável.</p>
        </div>
        
        <div class="dishes-grid" id="popularDishesGrid">
            <!-- Pratos carregados dinamicamente -->
        </div>

        <div class="section-action">
            <a href="<?= $rootPath ?>/pages/todos-os-pratos.php" class="view-all-btn">Veja todos os pratos</a>
        </div>
    </section>

    <section class="testimonials-section" id="depoimentos">
        <div class="testimonials-container">
            <div class="testimonials-header">
                <span class="testimonials-label">DEPOIMENTO</span>
                <h2 class="testimonials-title">O que dizem nossos clientes</h2>
                <p class="testimonials-description">Adoramos receber notícias dos nossos clientes, por isso, deixe um comentário ou envie-nos um e-mail.</p>
            </div>

            <!-- Elfsight Google Reviews Widget -->
            <div class="elfsight-app-8bbc82e6-0f53-4081-b503-5c1445fdac4d" data-elfsight-app-lazy></div>
        </div>
    </section>

    <section class="reservation-section" id="reserva">
        <div class="reservation-overlay"></div>
        <div class="reservation-container">
            <div class="reservation-content">
                <span class="reservation-label">RESERVA</span>
                <h2 class="reservation-title">Reserve já a sua mesa!</h2>
                
                <form class="reservation-form" id="reservationForm" method="POST">
                    <div class="form-row">
                        <input type="text" name="name" placeholder="Name" required class="form-input form-input-full">
                    </div>
                    <div class="form-row">
                        <input type="email" name="email" placeholder="Email" required class="form-input form-input-full">
                    </div>
                    <div class="form-row">
                        <div class="phone-input-wrapper" data-phone-group>
                            <button type="button" class="phone-flag-btn" data-country="pt">
                                <span class="fi fi-pt fis"></span>
                                <span class="phone-dial-code">+351</span>
                                <span class="arrow">▼</span>
                            </button>
                            <div class="phone-country-menu"></div>
                            <input type="tel" name="telefone" placeholder="926 233 942" required class="form-input" data-country-code="+351">
                        </div>
                    </div>
                    <div class="form-row-multiple">
                        <input type="number" name="pessoas" placeholder="Pessoas" min="1" required class="form-input">
                        <input type="time" name="horario" required class="form-input">
                        <input type="date" name="data" required class="form-input">
                    </div>
                    <button type="submit" class="reservation-btn">Reserve uma mesa</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Modal de Confirmação de Reserva (Home) -->
    <div id="confirmationModal" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-icon-check">
                <i class="bi bi-check"></i>
            </div>
            <h2>Sua reserva está confirmada!</h2>
            <p>Obrigado por nos escolher e esperamos recebê-lo em breve.</p>
            <a href="<?= $rootPath ?>/inicio.php" class="modal-btn">Volta o Início</a>
        </div>
    </div>
</main>

<?php include __DIR__ . "/components/footer.php" ?>

        <!-- Elfsight Google Reviews Platform -->
        <script src="https://elfsightcdn.com/platform.js" async></script>

        <script>
            // Passa a configuração do PHP para o JavaScript
            window.ASSET_BASE_PATH = '<?= $assetBase ?>';
        </script>
        <script src="<?= getAssetUrl('js/cache-control.js') ?>"></script>
        <script src="<?= getAssetUrl('js/cardapio-data.js') ?>"></script>
        <script defer src="<?= getAssetUrl('js/alerts.js') ?>"></script>
        <script defer src="<?= getAssetUrl('js/phone-country.js') ?>"></script>
        <script defer src="<?= getAssetUrl('js/header.js') ?>"></script>
        <script defer src="<?= getAssetUrl('js/hero.js') ?>"></script>
        <script defer src="<?= getAssetUrl('js/reservation.js') ?>"></script>
        <script defer src="<?= getAssetUrl('js/footer.js') ?>"></script>
        
        <script>
        // Carregar os 3 primeiros pratos do cardápio
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('popularDishesGrid');
            const primeiros3Pratos = pratos.carne.slice(0, 3);
            
            primeiros3Pratos.forEach(prato => {
                const dishCard = `
                    <div class="card-prato">
                        <div class="imagem-prato" data-nome="${prato.nome}">
                            <img src="${prato.imagem}" alt="${prato.nome}">
                        </div>
                        <div class="info-prato">
                            <h3>${prato.nome}</h3>
                            <p class="descricao">${prato.descricao}</p>
                            <div class="preco-rating">
                                <span class="preco">${formatarPreco(prato.preco)}</span>
                            </div>
                            <div class="rating-btn">
                                <div class="rating">
                                    ${gerarEstrelas(prato.rating)}
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                container.innerHTML += dishCard;
            });
        });
        </script>
</body>
</html>
