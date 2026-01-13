<!doctype html>
<html lang="pt-BR">
<?php
// Carrega configurações centralizadas
require __DIR__ . '/../../config.php';
?>
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
  <link rel="stylesheet" href="<?= getAssetUrl('css/sobreNos.css') ?>">
  <link rel="stylesheet" href="<?= getAssetUrl('css/alerts.css') ?>">
  <link rel="stylesheet" href="<?= getAssetUrl('css/responsive.css') ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <title>Predileto - Sobre Nós</title>
</head>
<body>
  
        <?php include __DIR__ . "/../components/header.php" ?>
  

  <main class="sobre-main">
    <!-- Hero Sobre Nós -->
    <section class="sobre-hero">
      <div class="sobre-hero-container">
        <div class="sobre-hero-text">
          <span class="section-badge">SOBRE NÓS</span>
          <h1>Qualidade e Tradição</h1>
          <p>O Predileto é um restaurante tradicional de cozinha portuguesa, instalado em Estoril, que combina a autenticidade dos pratos clássicos portugueses com ingredientes frescos e de qualidade superior. Com uma equipe de chefs experientes e dedicados, oferecemos uma experiência gastronômica que honra as raízes da culinária portuguesa, trazendo à sua mesa os sabores que definem a identidade de Portugal.</p>
          <a class="btn-primary" href="galeria-completa.php">Veja mais</a>
        </div>
        <div class="sobre-hero-media">
          <div class="decor-circle"></div>
          <div class="hero-image-wrap">
            <img src="<?= $assetBase ?>/images/gallery/predileto.jpg" alt="Ambiente do restaurante Predileto com iluminação aconchegante">
          </div>
        </div>
      </div>
    </section>

    <!-- Features -->
    <section class="sobre-features" id="servicos">
      <div class="features-grid">
        <article class="feature-card">
          <div class="feature-icon">🍲</div>
          <h3>Produto fresco</h3>
          <p>Utilizamos apenas ingredientes de primeira qualidade, selecionados diariamente para garantir a frescura e o melhor sabor em cada prato.</p>
          <a class="feature-link" href="#">Ver Mais</a>
        </article>
        <article class="feature-card">
          <div class="feature-icon">👨‍🍳</div>
          <h3>Chefs habilidosos</h3>
          <p>Nossa equipe de chefs experientes trabalha com paixão para criar pratos autênticos que refletem a verdadeira essência da gastronomia portuguesa.</p>
          <a class="feature-link" href="#">Ver Mais</a>
        </article>
        <article class="feature-card">
          <div class="feature-icon">🍹</div>
          <h3>Bebidas e Sucos</h3>
          <p>Oferecemos uma seleção cuidada de bebidas e sucos frescos para acompanhar perfeitamente cada refeição e proporcionar a melhor experiência.</p>
          <a class="feature-link" href="#">Ver Mais</a>
        </article>
        <article class="feature-card">
          <div class="feature-icon">🥗</div>
          <h3>Pratos para todos</h3>
          <p>Contamos com um cardápio diversificado que atende todos os paladares, desde os tradicionais pratos portugueses até opções especiais e requintadas.</p>
          <a class="feature-link" href="#">Ver Mais</a>
        </article>
      </div>
    </section>

    <!-- Galeria -->
    <section class="sobre-galeria" id="galeria">
      <div class="galeria-grid lightbox-gallery">
        <div class="galeria-item">
          <img src="<?= $assetBase ?>/images/gallery/predileto2.jpg" alt="Interior do restaurante Predileto" data-full="<?= $assetBase ?>/images/gallery/predileto2.jpg">
        </div>
        <div class="galeria-item">
          <img src="<?= $assetBase ?>/images/gallery/predileto.jpg" alt="Ambiente do restaurante" data-full="<?= $assetBase ?>/images/gallery/predileto.jpg">
        </div>
        <div class="galeria-item">
          <img src="<?= $assetBase ?>/images/gallery/salmao.jpg" alt="Prato de salmão fresco" data-full="<?= $assetBase ?>/images/gallery/salmao.jpg">
        </div>
        <div class="galeria-item">
          <img src="<?= $assetBase ?>/images/gallery/arrozdepato.jpg" alt="Prato arroz de pato" data-full="<?= $assetBase ?>/images/gallery/arrozdepato.jpg">
        </div>
        <div class="galeria-item">
          <img src="<?= $assetBase ?>/images/gallery/picanha.jpg" alt="Picanha grelhada" data-full="<?= $assetBase ?>/images/gallery/picanha.jpg">
        </div>
        <div class="galeria-item destaque">
          <img src="<?= $assetBase ?>/images/gallery/estrogonofedeFrango.jpg" alt="Estrogonofe de frango" data-full="<?= $assetBase ?>/images/gallery/estrogonofedeFrango.jpg">
        </div>
        <div class="galeria-item">
          <img src="<?= $assetBase ?>/images/gallery/MassaDeCamarao.jpg" alt="Massa de camarão" data-full="<?= $assetBase ?>/images/gallery/MassaDeCamarao.jpg">
        </div>
        <div class="galeria-item">
          <img src="<?= $assetBase ?>/images/gallery/MassaDeCarne.jpg" alt="Massa de carne" data-full="<?= $assetBase ?>/images/gallery/MassaDeCarne.jpg">
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . "/../components/footer.php" ?>

  <script src="<?= getAssetUrl('js/cache-control.js') ?>"></script>
  <script defer src="<?= getAssetUrl('js/galeria-lightbox.js') ?>"></script>
  <script defer src="<?= getAssetUrl('js/header.js') ?>"></script>
  <script defer src="<?= getAssetUrl('js/footer.js') ?>"></script>
</body>
</html>
