<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/alerts.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.3.2/css/flag-icons.min.css">
    <link rel="stylesheet" href="../css/phone.css">
    <link rel="stylesheet" href="../../predileto/css/contato.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Contato - Predileto</title>
</head>
<body>

        <?php include "../../predileto/components/header.php" ?>
    

    <main>
        <section class="contato-container">
            <div class="menu-header">
                <span class="menu-label">Contato</span>
                <h2>Fale Conosco</h2>
                <p>Envie uma mensagem ou entre em contato pelos nossos canais. Respondemos rapidamente.</p>
            </div>

            <div class="contato-grid">
                <form class="contato-form" id="contatoForm" novalidate>
                    <div class="form-row">
                        <div class="form-field">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" name="nome" placeholder="Seu nome" required>
                        </div>
                        <div class="form-field">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="voce@email.com" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-field">
                            <label for="telefone">Telefone</label>
                            <div class="phone-input-wrapper" data-phone-group>
                                <button type="button" class="phone-flag-btn" data-country="pt">
                                    <span class="fi fi-pt fis"></span>
                                    <span class="phone-dial-code">+351</span>
                                    <span class="arrow">▼</span>
                                </button>
                                <div class="phone-country-menu"></div>
                                <input type="tel" id="telefone" name="telefone" placeholder="926 233 942" required data-country-code="+351">
                            </div>
                        </div>
                        <div class="form-field">
                            <label for="assunto">Assunto</label>
                            <input type="text" id="assunto" name="assunto" placeholder="Assunto" required>
                        </div>
                    </div>
                    <div class="form-field">
                        <label for="mensagem">Mensagem</label>
                        <textarea id="mensagem" name="mensagem" rows="6" placeholder="Como podemos ajudar?" required></textarea>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="contato-submit">Enviar mensagem</button>
                        <p class="form-feedback" id="formFeedback" aria-live="polite"></p>
                    </div>
                </form>

                <aside class="contato-info">
                    <h3>Informações</h3>
                    <ul class="info-list">
                        <li><i class="bi bi-geo-alt"></i>R.Praceta vale, paraíso, 2765-053 Estoril </li>
                        <li><i class="bi bi-clock"></i> Segunda a Segunda 08:00 as 22:00 horas</li>
                        <li><i class="bi bi-envelope"></i> prediletonegri@gmail.com</li>
                        <li><i class="bi bi-telephone"></i> +351 926 233 942</li>
                    </ul>
                    <div class="map-embed">
                        <iframe title="Mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2259.5395860280614!2d-9.376461478578657!3d38.70673309307831!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd1ec5be4072de13%3A0x5b00b04398677409!2sRestaurante%20Predileto!5e0!3m2!1spt-BR!2spt!4v1766684605111!5m2!1spt-BR!2spt" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" loading="lazy"></iframe>
                    </div>
                </aside>
            </div>
        </section>
    </main>

    <?php include "../components/footer.php" ?>

    <script src="../js/alerts.js"></script>
    <script src="../js/phone-country.js"></script>
    <script src="../../predileto/js/contato.js"></script>
</body>
</html>
