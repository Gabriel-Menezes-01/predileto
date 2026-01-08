<?php
// Carrega configurações centralizadas se não estiverem já definidas
if (!isset($assetBase)) {
    require __DIR__ . '/../../config.php';
}
?>

<footer class="footer">
    <div class="footer-container">
        <!-- Contato -->
        <div class="footer-section footer-contact-section">
            <h4 class="footer-section-title">CONTATO</h4>
            <ul class="footer-list">
                <li> R.Praceta vale paraíso, 2765-053 Estoril</li>
                <li class="contact-item">
                    <span class="contact-label">Telefone </span>
                    <a href="tel:+351926233942">+351 926 233 942</a>
                </li>
                <li>
                    <a href="mailto:Prediletonegri@gmail.com">Prediletonegri@gmail.com</a>
                </li>
            </ul>
        </div>

        <!-- Centro: Logo + Redes Sociais -->
        <div class="footer-center">
            <div class="footer-logo-wrap">
                <img src="<?= $assetBase ?>/images/logo/LogoPredileto.svg" alt="Logo Predileto" class="footer-logo-img">
            </div>
            <div class="footer-social footer-social-center">
                <a href="https://www.instagram.com/predileto_negri?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="social-icon" aria-label="Instagram" target="_blank">
                    <i class="bi bi-instagram"></i>
                </a>
                <a href="#" class="social-icon" aria-label="Facebook" target="_blank">
                    <i class="bi bi-facebook"></i>
                </a>
            </div>
        </div>

        <!-- Horas de Trabalho -->
        <div class="footer-section footer-hours-section">
            <div class="footer-hours-header">
                <h4 class="footer-section-title">HORAS DE TRABALHO</h4>
            </div>
            <ul class="footer-list">
                <li>Segunda - Domingo: <span class="hours-highlight">8:00am - 22:00pm</span></li>
            </ul>
        </div>
    </div>

    <!-- Divider -->
    <div class="footer-divider"></div>

    <!-- Copyright -->
    <div class="footer-copyright">
        <p>© Copyright - <span class="highlight">Predileto</span> 2024 | Desenvolvido por <a href="https://www.linkedin.com/in/gabrielmenezesdasilva" class="highlight" target="_blank">Gabriel Menezes</a></p>
    </div>
</footer>