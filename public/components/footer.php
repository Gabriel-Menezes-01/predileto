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
                <li>Segunda - Domingo: <span class="hours-highlight">8:00am - 22:00pm</span></li>
            </ul>
            <div class="footer-social footer-social-inline">
                <a href="https://www.instagram.com/predileto_negri?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="social-icon" aria-label="Instagram" target="_blank">
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