<?php
session_start();
$assetBase = $assetBase ?? './assets';
$rootPath  = $rootPath  ?? '.';
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="<?= $assetBase ?>/css/header.css">
    <link rel="stylesheet" href="<?= $assetBase ?>/css/footer.css">
    <link rel="stylesheet" href="<?= $assetBase ?>/css/inicio.css">
    <link rel="stylesheet" href="<?= $assetBase ?>/css/phone.css">
    <link rel="stylesheet" href="<?= $assetBase ?>/css/alerts.css">
    <link rel="stylesheet" href="<?= $assetBase ?>/css/responsive.css">
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
                <a href="#menu" class="hero-btn">View Menu</a>
            </div>
            <div class="hero-image">
                <div class="hero-image-wrapper">
                    <img src="<?= $assetBase ?>/images/gallery/predileto.jpg" alt="Interior acolhedor do restaurante Predileto com iluminação ambiente">
                    
                </div>
                
            </div>
        </div>
    </section>
    <section class="info-bar" id="contato">
        <div class="info-item">
            <div class="info-icon"><i class="bi bi-geo-alt"></i></div>
            <div>
                <h3>Localização</h3>
                <p>R. xxxxxxxx, 123 - Cacais</p>
            </div>
        </div>
        <div class="info-item">
            <div class="info-icon"><i class="bi bi-clock"></i></div>
            <div>
                <h3>Aberto</h3>
                <p>Domingo a Sábado: 12h às 23h30<br>segunda: fechado</p>
            </div>
        </div>
        <div class="info-item">
            <div class="info-icon"><i class="bi bi-envelope"></i></div>
            <div>
                <h3>Reserva</h3>
                <p>hirestaurantate@gmail.com</p>
            </div>
        </div>
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
        
        <div class="dishes-grid">
            <div class="dish-card">
                <div class="dish-image">
                    <img src="images/gallery/arrozdepato.jpg" alt="Prato 1">
                </div>
                <div class="dish-content">
                    <div class="dish-header">
                        <h3 class="dish-name">Lorem Epsum</h3>
                        <span class="dish-price">$13</span>
                    </div>
                    <div class="dish-footer">
                        <div class="dish-rating">
                            <span class="rating-score">5.0</span>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                        </div>
                        <button class="order-btn">Order Now</button>
                    </div>
                </div>
            </div>

            <div class="dish-card">
                <div class="dish-image">
                    <img src="<?= $assetBase ?>/images/gallery/salmao.jpg" alt="Prato 2">
                </div>
                <div class="dish-content">
                    <div class="dish-header">
                        <h3 class="dish-name">Lorem Epsum</h3>
                        <span class="dish-price">$13</span>
                    </div>
                    <div class="dish-footer">
                        <div class="dish-rating">
                            <span class="rating-score">5.0</span>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                        </div>
                        <button class="order-btn">Order Now</button>
                    </div>
                </div>
            </div>

            <div class="dish-card">
                <div class="dish-image">
                    <img src="<?= $assetBase ?>/images/gallery/picanha.jpg" alt="Prato 3">
                </div>
                <div class="dish-content">
                    <div class="dish-header">
                        <h3 class="dish-name">Lorem Epsum</h3>
                        <span class="dish-price">$13</span>
                    </div>
                    <div class="dish-footer">
                        <div class="dish-rating">
                            <span class="rating-score">5.0</span>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                        </div>
                        <button class="order-btn">Order Now</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-action">
            <a href="#" class="view-all-btn">Veja todos os pratos</a>
        </div>
    </section>

    <section class="testimonials-section" id="depoimentos">
        <div class="testimonials-container">
            <div class="testimonials-header">
                <span class="testimonials-label">DEPOIMENTO</span>
                <h2 class="testimonials-title">O que dizem nossos clientes</h2>
                <p class="testimonials-description">Adoramos receber notícias dos nossos clientes, por isso, deixe um comentário ou envie-nos um e-mail.</p>
            </div>

            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-header-card">
                        <img src="<?= $assetBase ?>/images/gallery/cliente1.jpg" alt="Foto de Daniyel Spyra" class="testimonial-avatar">
                        <div class="testimonial-info">
                            <h3 class="testimonial-name">Daniyel Spyra</h3>
                            <p class="testimonial-location">Newyork</p>
                        </div>
                    </div>
                    <hr class="testimonial-divider">
                    <p class="testimonial-text">"It is professional, considers everyone's time, can think about the 'There are many variations of passages whole probls small niche, friendly."</p>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-header-card">
                        <img src="<?= $assetBase ?>/images/gallery/cliente2.jpg" alt="Foto de Natasha D" class="testimonial-avatar">
                        <div class="testimonial-info">
                            <h3 class="testimonial-name">Natasha D</h3>
                            <p class="testimonial-location">Salt Lake City</p>
                        </div>
                    </div>
                    <hr class="testimonial-divider">
                    <p class="testimonial-text">"It is professional, considers everyone's time, can think about the 'There are many variations of passages whole probls small niche, friendly."</p>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-header-card">
                        <img src="<?= $assetBase ?>/images/gallery/cliente3.jpg" alt="Foto de Jack Sparrow" class="testimonial-avatar">
                        <div class="testimonial-info">
                            <h3 class="testimonial-name">Jack Sparrow</h3>
                            <p class="testimonial-location">San Diego</p>
                        </div>
                    </div>
                    <hr class="testimonial-divider">
                    <p class="testimonial-text">"It is professional, considers everyone's time, can think about the 'There are many variations of passages whole probls small niche, friendly."</p>
                </div>
            </div>
        </div>
    </section>

    <section class="reservation-section" id="reserva">
        <div class="reservation-overlay"></div>
        <div class="reservation-container">
            <div class="reservation-content">
                <span class="reservation-label">RESERVA</span>
                <h2 class="reservation-title">Reserve já a sua mesa!</h2>
                
                <form class="reservation-form" id="reservationForm">
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
            <a href="./index.php" class="modal-btn">Volta o Início</a>
        </div>
    </div>
</main>

<?php include __DIR__ . "/components/footer.php" ?>

        <script defer src="<?= $assetBase ?>/js/alerts.js"></script>
        <script defer src="<?= $assetBase ?>/js/phone-country.js"></script>
        <script defer src="<?= $assetBase ?>/js/header.js"></script>
        <script defer src="<?= $assetBase ?>/js/reservation.js"></script>
        <script defer src="<?= $assetBase ?>/js/footer.js"></script>
</body>
</html>
