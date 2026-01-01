<?php
// Usa variáveis fornecidas pela página para manter caminhos relativos consistentes
$assetBase = $assetBase ?? '../assets';
$rootPath  = $rootPath  ?? '..';
?>


<header class="site-header">
    <div class="conteinerHeader">
        <div class="logoImg">
            <img src="<?= $assetBase ?>/images/logo/LogoPredileto.svg" alt="Logo Predileto apresentando o nome da marca em uma fonte moderna, contra um fundo limpo, transmitindo uma sensação de qualidade e elegância.">
        </div>

        <!-- Desktop nav -->
        <nav class="nav-desktop">
            <ul>
                <li><a href="<?= $rootPath ?>/inicio.php">Início</a></li>
                <li><a href="<?= $rootPath ?>/pages/cardapio.php">Cardápio</a></li>
                <li><a href="<?= $rootPath ?>/pages/sobreNos.php">Sobre Nós</a></li>
                <li><a href="<?= $rootPath ?>/pages/contato.php">Contato</a></li>
            </ul>
            <div class="btnHeader">
                <a href="<?= $rootPath ?>/pages/reserva.php"><button type="button">Reservar já</button></a>
            </div>
        </nav>

        <!-- Mobile toggle -->
        <button class="menu-toggle" aria-label="Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <!-- Mobile nav -->
        <nav class="nav-mobile">
            <ul>
                <li><a href="<?= $rootPath ?>/inicio.php">Início</a></li>
                <li><a href="<?= $rootPath ?>/pages/cardapio.php">Cardápio</a></li>
                <li><a href="<?= $rootPath ?>/pages/sobreNos.php">Sobre Nós</a></li>
                <li><a href="<?= $rootPath ?>/pages/contato.php">Contato</a></li>
            </ul>
            <div class="btnHeader">
                <a href="<?= $rootPath ?>/pages/reserva.php"><button type="button">Reservar já</button></a>
            </div>
        </nav>
    </div>
</header>