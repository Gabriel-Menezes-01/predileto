<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.3.2/css/flag-icons.min.css">
  <link rel="stylesheet" href="../css/phone.css">
  <link rel="stylesheet" href="../css/alerts.css">
  <link rel="stylesheet" href="../css/reserva.css">
  <link rel="stylesheet" href="../css/footer.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <title>Reserva - Predileto</title>
</head>
<body>
  <?php include "../components/header.php" ?>

  <main class="mainReserva">
    <section class="reserva-hero">
      <div class="reserva-hero-title">
        <h1>Reserve o assento agora aqui facilmente</h1>
      </div>
    </section>

    <section class="reserva-container">
      <div class="reserva-content">
        <!-- Imagem à esquerda -->
        <div class="reserva-image">
          <img src="../images/gallery/reserved.jpg" alt="Mesa reservada com ambiente acolhedor" />
        </div>

        <!-- Formulário à direita -->
        <div class="reserva-form-wrapper">
          <div class="reserva-label">RESERVA</div>
          <h2>Reserve já a sua mesa</h2>
          <p class="reserva-description">
            As pessoas, a comida e a localização prioriegiada fazem do Predileto o lugar perfeito para bons amigos e família se reunirem e se divertirem.
          </p>

          <form id="reservationForm" class="reserva-form">
            <div class="form-row">
              <div class="form-group">
                <input 
                  type="text" 
                  name="name" 
                  placeholder="Nome" 
                  required
                  aria-label="Nome completo"
                />
              </div>
              <div class="form-group">
                <input 
                  type="email" 
                  name="email" 
                  placeholder="Email" 
                  required
                  aria-label="Email"
                />
              </div>
            </div>

            <div class="form-row">
              <div class="form-group" data-phone-group>
                <div class="phone-input-wrapper">
                  <button type="button" class="phone-flag-btn" data-country="pt">
                    <span class="fi fi-pt fis"></span>
                    <span class="phone-dial-code">+351</span>
                    <span class="arrow">▼</span>
                  </button>
                  <div class="phone-country-menu"></div>
                  <input 
                    type="tel" 
                    name="telefone" 
                    placeholder="926 233 942" 
                    required
                    aria-label="Telefone"
                    data-country-code="+351"
                  />
                </div>
              </div>
              <div class="form-group">
                <input 
                  type="date" 
                  name="data" 
                  required
                  aria-label="Data da reserva"
                />
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <input 
                  type="time" 
                  name="horario" 
                  required
                  aria-label="Horário da reserva"
                />
              </div>
              <div class="form-group">
                <input 
                  type="number" 
                  name="pessoas" 
                  placeholder="Quantidade de Pessoas" 
                  min="1" 
                  max="20"
                  required
                  aria-label="Quantidade de pessoas"
                />
              </div>
            </div>

            <button type="submit" class="reserva-btn">Reserve uma mesa</button>
          </form>
        </div>
      </div>
    </section>
  </main>

  <!-- Modal de Confirmação de Reserva -->
  <div id="confirmationModal" class="modal-overlay">
    <div class="modal-content">
      <div class="modal-icon-check">
        <i class="bi bi-check"></i>
      </div>
      <h2>Sua reserva está confirmada!</h2>
      <p>Obrigado por nos escolher e esperamos recebê-lo em breve.</p>
      <a href="../index.php" class="modal-btn">Volta o Início</a>
    </div>
  </div>

  <?php include "../components/footer.php" ?>

  <script src="../js/alerts.js"></script>
  <script src="../js/phone-country.js"></script>
  <script src="../js/reservation.js"></script>
</body>
</html>
