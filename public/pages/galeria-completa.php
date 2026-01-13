<!doctype html>
<html lang="pt-BR">
<?php
// Carrega configurações centralizadas
require __DIR__ . '/../../config.php';

// Array com as fotos e descrições
$galeria = [
    [
        'id' => 1,
        'imagem' => 'predileto.jpg',
        'titulo' => 'Ambiente Aconchegante',
        'descricao' => 'Nosso ambiente é projetado para oferecer conforto e aconchego aos nossos clientes. Iluminação suave e decoração elegante criam a atmosfera perfeita para suas refeições.'
    ],
    [
        'id' => 2,
        'imagem' => 'predileto2.jpg',
        'titulo' => 'Interior Sofisticado',
        'descricao' => 'Cada detalhe do nosso restaurante foi pensado para proporcionar uma experiência gastronômica de excelência. Mobiliário de qualidade e espaço aconchegante.'
    ],
    [
        'id' => 3,
        'imagem' => 'salmao.jpg',
        'titulo' => 'Salmão Fresco',
        'descricao' => 'Nosso salmão é selecionado diariamente para garantir a melhor qualidade. Preparado por nossos chefs experientes com temperos exclusivos.'
    ],
    [
        'id' => 4,
        'imagem' => 'arrozdepato.jpg',
        'titulo' => 'Arroz de Pato',
        'descricao' => 'Um prato clássico da culinária portuguesa. Feito com técnicas tradicionais e ingredientes premium, é um dos destaques do nosso cardápio.'
    ],
    [
        'id' => 5,
        'imagem' => 'picanha.jpg',
        'titulo' => 'Picanha Grelhada',
        'descricao' => 'Corte premium grelhado na perfeição. Suculento, macio e com sabor incomparável. Servido com guarnições selecionadas.'
    ],
    [
        'id' => 6,
        'imagem' => 'estrogonofedeFrango.jpg',
        'titulo' => 'Estrogonofe de Frango',
        'descricao' => 'Receita clássica que agrada a todos. Frango macio em um molho cremoso e saboroso, servido com arroz e batata palha.'
    ],
    [
        'id' => 7,
        'imagem' => 'MassaDeCamarao.jpg',
        'titulo' => 'Massa de Camarão',
        'descricao' => 'Camarões frescos em uma massa al dente com molho delicioso. Uma combinação perfeita de sabores do mar.'
    ],
    [
        'id' => 8,
        'imagem' => 'MassaDeCarne.jpg',
        'titulo' => 'Massa de Carne',
        'descricao' => 'Massa fresca acompanhada de carne moída e molho caseiro. Tradicional e saborosa, feita com ingredientes selecionados.'
    ]
];
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
  <link rel="stylesheet" href="<?= getAssetUrl('css/alerts.css') ?>">
  <link rel="stylesheet" href="<?= getAssetUrl('css/responsive.css') ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <title>Predileto - Galeria Completa</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #fff;
      color: #1c1c1c;
      line-height: 1.6;
      overflow-x: hidden;
    }

    header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
    }

    .galeria-main {
      padding-top: 80px;
      padding-bottom: 60px;
    }

    .galeria-header {
      padding: 40px 20px;
      text-align: center;
      background: linear-gradient(135deg, rgba(246, 166, 35, 0.1) 0%, rgba(212, 175, 116, 0.1) 100%);
    }

    .galeria-header h1 {
      font-size: clamp(32px, 5vw, 48px);
      font-weight: 800;
      margin-bottom: 16px;
      color: #1f1f1f;
    }

    .galeria-header p {
      font-size: 16px;
      color: #505050;
      max-width: 600px;
      margin: 0 auto;
    }

    .galeria-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 40px 20px;
    }

    .galeria-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 24px;
      margin-bottom: 40px;
    }

    .galeria-card {
      background: #fff;
      border-radius: 12px;
      overflow: hidden;
      cursor: pointer;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .galeria-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }

    .galeria-card-image {
      width: 100%;
      height: 220px;
      overflow: hidden;
      background: #f0f0f0;
    }

    .galeria-card-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.3s ease;
    }

    .galeria-card:hover .galeria-card-image img {
      transform: scale(1.1);
    }

    .galeria-card-content {
      padding: 20px;
    }

    .galeria-card-title {
      font-size: 18px;
      font-weight: 700;
      margin-bottom: 8px;
      color: #1f1f1f;
    }

    .galeria-card-text {
      font-size: 13px;
      color: #666;
      line-height: 1.5;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    /* Modal Lightbox */
    .lightbox-modal {
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.9);
      display: none;
      align-items: center;
      justify-content: center;
      z-index: 2000;
      padding: 16px;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .lightbox-modal.active {
      display: flex;
      opacity: 1;
    }

    .lightbox-content {
      background: #fff;
      border-radius: 12px;
      width: 100%;
      max-width: 800px;
      overflow: hidden;
      animation: slideIn 0.3s ease;
    }

    @keyframes slideIn {
      from {
        transform: translateY(-50px);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .lightbox-image {
      width: 100%;
      height: 400px;
      overflow: hidden;
      background: #f0f0f0;
    }

    .lightbox-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .lightbox-info {
      padding: 32px;
    }

    .lightbox-title {
      font-size: 28px;
      font-weight: 800;
      margin-bottom: 16px;
      color: #1f1f1f;
    }

    .lightbox-description {
      font-size: 16px;
      color: #505050;
      line-height: 1.8;
      margin-bottom: 24px;
    }

    .lightbox-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding-top: 20px;
      border-top: 1px solid #eee;
    }

    .lightbox-counter {
      font-size: 14px;
      color: #999;
      font-weight: 600;
    }

    .lightbox-nav {
      display: flex;
      gap: 12px;
    }

    .lightbox-btn {
      background: #F6A623;
      color: #000;
      border: none;
      padding: 10px 20px;
      border-radius: 6px;
      cursor: pointer;
      font-weight: 600;
      font-size: 14px;
      transition: all 0.3s ease;
    }

    .lightbox-btn:hover {
      background: #e59600;
      transform: translateY(-2px);
    }

    .lightbox-close {
      position: absolute;
      top: 20px;
      right: 20px;
      background: rgba(255, 255, 255, 0.2);
      border: none;
      color: #fff;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      font-size: 24px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
    }

    .lightbox-close:hover {
      background: rgba(255, 255, 255, 0.3);
    }

    @media (max-width: 768px) {
      .galeria-grid {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 16px;
      }

      .lightbox-image {
        height: 250px;
      }

      .lightbox-info {
        padding: 20px;
      }

      .lightbox-title {
        font-size: 22px;
      }

      .lightbox-footer {
        flex-direction: column;
        gap: 16px;
        align-items: flex-start;
      }
    }
  </style>
</head>
<body>
  
  <?php include __DIR__ . "/../components/header.php" ?>
  

  <main class="galeria-main">
    <!-- Header da Galeria -->
    <section class="galeria-header">
      <h1>Nossa Galeria</h1>
      <p>Explore nosso espaço, ambiente aconchegante e pratos deliciosos preparados com dedicação e qualidade.</p>
    </section>

    <!-- Grid de Fotos -->
    <div class="galeria-container">
      <div class="galeria-grid" id="galeriaGrid">
        <?php foreach ($galeria as $item): ?>
          <div class="galeria-card" data-id="<?= $item['id'] ?>" onclick="abrirLightbox(<?= $item['id'] ?>)">
            <div class="galeria-card-image">
              <img src="<?= $assetBase ?>/images/gallery/<?= $item['imagem'] ?>" alt="<?= $item['titulo'] ?>">
            </div>
            <div class="galeria-card-content">
              <div class="galeria-card-title"><?= $item['titulo'] ?></div>
              <div class="galeria-card-text"><?= $item['descricao'] ?></div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </main>

  <!-- Modal Lightbox -->
  <div class="lightbox-modal" id="lightboxModal">
    <button class="lightbox-close" onclick="fecharLightbox()">
      <i class="bi bi-x-lg"></i>
    </button>
    <div class="lightbox-content">
      <div class="lightbox-image">
        <img id="lightboxImage" src="" alt="">
      </div>
      <div class="lightbox-info">
        <h2 class="lightbox-title" id="lightboxTitle"></h2>
        <p class="lightbox-description" id="lightboxDescription"></p>
        <div class="lightbox-footer">
          <span class="lightbox-counter"><span id="currentIndex">1</span> / <span id="totalIndex">8</span></span>
          <div class="lightbox-nav">
            <button class="lightbox-btn" onclick="irAnterior()">
              <i class="bi bi-chevron-left"></i> Anterior
            </button>
            <button class="lightbox-btn" onclick="irProximo()">
              Próximo <i class="bi bi-chevron-right"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include __DIR__ . "/../components/footer.php" ?>

  <script>
    // Dados da galeria
    const galerias = <?= json_encode($galeria) ?>;
    let indexAtual = 0;

    function abrirLightbox(id) {
      // Encontrar o índice do item com o id
      indexAtual = galerias.findIndex(item => item.id === id);
      mostrarLightbox();
    }

    function fecharLightbox() {
      document.getElementById('lightboxModal').classList.remove('active');
    }

    function irProximo() {
      indexAtual = (indexAtual + 1) % galerias.length;
      mostrarLightbox();
    }

    function irAnterior() {
      indexAtual = (indexAtual - 1 + galerias.length) % galerias.length;
      mostrarLightbox();
    }

    function mostrarLightbox() {
      const item = galerias[indexAtual];
      const assetBase = '<?= $assetBase ?>';
      
      document.getElementById('lightboxImage').src = assetBase + '/images/gallery/' + item.imagem;
      document.getElementById('lightboxTitle').textContent = item.titulo;
      document.getElementById('lightboxDescription').textContent = item.descricao;
      document.getElementById('currentIndex').textContent = indexAtual + 1;
      document.getElementById('totalIndex').textContent = galerias.length;
      
      document.getElementById('lightboxModal').classList.add('active');
    }

    // Fechar lightbox ao clicar fora
    document.getElementById('lightboxModal').addEventListener('click', function(e) {
      if (e.target === this) {
        fecharLightbox();
      }
    });

    // Navegação com setas do teclado
    document.addEventListener('keydown', function(e) {
      const modal = document.getElementById('lightboxModal');
      if (modal.classList.contains('active')) {
        if (e.key === 'ArrowRight') irProximo();
        if (e.key === 'ArrowLeft') irAnterior();
        if (e.key === 'Escape') fecharLightbox();
      }
    });
  </script>
</body>
</html>
