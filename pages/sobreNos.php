<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="../css/sobreNos.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <title>Predileto - Sobre Nós</title>
</head>
<body>
  
        <?php include "../../predileto/components/header.php" ?>
  

  <main class="sobre-main">
    <!-- Hero Sobre Nós -->
    <section class="sobre-hero">
      <div class="sobre-hero-container">
        <div class="sobre-hero-text">
          <span class="section-badge">SOBRE NÓS</span>
          <h1>Qualidade e Tradição</h1>
          <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content gfsheré making look like readable English. Many desktop publishing packages.</p>
          <a class="btn-primary" href="#galeria">Veja mais</a>
        </div>
        <div class="sobre-hero-media">
          <div class="decor-circle"></div>
          <div class="hero-image-wrap">
            <img src="../images/gallery/predileto.jpg" alt="Ambiente do restaurante Predileto com iluminação aconchegante">
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
          <p>Profissionais consideram todos problemas pequenos nichos amigáveis.</p>
          <a class="feature-link" href="#">See more</a>
        </article>
        <article class="feature-card">
          <div class="feature-icon">👨‍🍳</div>
          <h3>Chefs habilidosos</h3>
          <p>Profissionais consideram todos problemas pequenos nichos amigáveis.</p>
          <a class="feature-link" href="#">See more</a>
        </article>
        <article class="feature-card">
          <div class="feature-icon">🍹</div>
          <h3>Bebidas e Sucos</h3>
          <p>Profissionais consideram todos problemas pequenos nichos amigáveis.</p>
          <a class="feature-link" href="#">See more</a>
        </article>
        <article class="feature-card">
          <div class="feature-icon">🥗</div>
          <h3>Pratos para todos</h3>
          <p>Profissionais consideram todos problemas pequenos nichos amigáveis.</p>
          <a class="feature-link" href="#">See more</a>
        </article>
      </div>
    </section>

    <!-- Galeria -->
    <section class="sobre-galeria" id="galeria">
      <div class="galeria-header">
        <span class="section-badge">GALERIA</span>
        <h2>O que produzimos</h2>
      </div>
      <div class="galeria-grid">
        <div class="galeria-item destaque">
          <img src="../images/gallery/predileto2.jpg" alt="Interior do restaurante Predileto">
        </div>
        <div class="galeria-item">
          <img src="../images/gallery/predileto.jpg" alt="Pancakes empilhadas">
        </div>
        <div class="galeria-item">
          <img src="../images/gallery/salmao.jpg" alt="Prato de salmão fresco">
        </div>
        <div class="galeria-item">
          <img src="../images/gallery/arrozdepato.jpg" alt="Chef preparando prato">
        </div>
        <div class="galeria-item">
          <img src="../images/gallery/picanha.jpg" alt="Drink e entrada">
        </div>
      </div>
    </section>
  </main>

  <?php include "../components/footer.php" ?>

  <script defer src="../js/header.js"></script>
  <script defer src="../js/footer.js"></script>
</body>
</html>
