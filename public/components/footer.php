<?php
// Usa variáveis fornecidas pela página para manter caminhos relativos consistentes
$assetBase = $assetBase ?? '../assets';
?>

<footer class="footer">
    <div class="footer-container">
        <!-- Contato -->
        <div class="footer-section footer-contact-section">
            <h4 class="footer-section-title">CONTATO</h4>
            <ul class="footer-list">
                <li>5 Rue Dolou, 75015 Cacis</li>
                <li class="contact-item">
                    <span class="contact-label">Call •</span>
                    <a href="tel:+351999999999">+351 999 999 999</a>
                </li>
                <li>
                    <a href="mailto:predileto@mail.com">predileto@mail.com</a>
                </li>
            </ul>
        </div>

        <!-- Centro: Logo + Newsletter -->
        <div class="footer-center">
            <div class="footer-logo-wrap">
                <img src="<?= $assetBase ?>/images/logo/LogoPredileto.svg" alt="Logo Predileto" class="footer-logo-img">
            </div>
            <div class="footer-section footer-newsletter-section">
                <h3 class="newsletter-title">Junte-se à nossa lista de e-mails para<br>atualizações,</h3>
                <p class="newsletter-subtitle">Receba novidades e ofertas de eventos.</p>
                <form class="newsletter-form" id="newsletterForm">
                    <input type="email" name="email" placeholder="Email" required class="newsletter-input">
                    <button type="submit" class="newsletter-btn">Subscribe</button>
                </form>
            </div>
        </div>

        <!-- Horas + Social -->
        <div class="footer-section footer-hours-section">
            <div class="footer-hours-header">
                <h4 class="footer-section-title">HORAS DE TRABALHO</h4>
            </div>
            <ul class="footer-list">
                <li>Terça - Sexta: <span class="hours-highlight">7:00am - 10:00pm</span></li>
                <li>Sábado: <span class="hours-highlight">7:00am - 6:00pm</span></li>
                <li>Domingo: <span class="hours-highlight">8:00am - 6:00pm</span></li>
            </ul>
            <div class="footer-social footer-social-inline">
                <a href="#" class="social-icon" aria-label="Instagram" target="_blank">
                    <i class="bi bi-instagram"></i>
                </a>
                <a href="#" class="social-icon" aria-label="Facebook" target="_blank">
                    <i class="bi bi-facebook"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Divider -->
    <div class="footer-divider"></div>

    <!-- Copyright -->
    <div class="footer-copyright">
        <p>© Copyright - <span class="highlight">Predileto</span> 2024 | Desenhado por <span class="highlight">Gabriel Menezes</span></p>
    </div>
</footer>