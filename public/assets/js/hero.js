// Hero Section - Efeitos Dinâmicos

document.addEventListener('DOMContentLoaded', function() {
    const heroSection = document.querySelector('.hero-section');
    const heroContent = document.querySelector('.hero-content');
    const heroImage = document.querySelector('.hero-image-wrapper');
    const heroTitle = document.querySelector('.hero-title');
    const decorativeCircle = document.querySelector('.hero-image-wrapper::after');

    // Parallax Effect
    if (heroSection && heroContent && heroImage) {
        function handleScroll() {
            const scrollPosition = window.scrollY;
            
            if (scrollPosition < window.innerHeight) {
                // Verifica se está em tela pequena (layout em coluna)
                const isSmallScreen = window.innerWidth <= 1024;
                
                if (isSmallScreen) {
                    // Em telas pequenas, ambos sobem juntos
                    const movement = scrollPosition * -0.3;
                    heroContent.style.transform = `translateY(${movement}px)`;
                    heroImage.style.transform = `translateY(${movement}px)`;
                } else {
                    // Em telas grandes, mantém o efeito parallax original
                    heroContent.style.transform = `translateY(${scrollPosition * 0.5}px)`;
                    heroImage.style.transform = `translateY(${scrollPosition * -0.3}px)`;
                }
            }
        }
        
        window.addEventListener('scroll', handleScroll);
        
        // Atualiza o comportamento ao redimensionar a janela
        window.addEventListener('resize', function() {
            handleScroll();
        });
    }

    // Mouse Move Effect - Hover no título
    if (heroTitle) {
        heroTitle.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.02)';
        });
        
        heroTitle.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    }

    // Botão com feedback visual
    const heroBtn = document.querySelector('.hero-btn');
    if (heroBtn) {
        heroBtn.addEventListener('mousedown', function() {
            this.style.transform = 'scale(0.95) translateY(2px)';
        });
        
        heroBtn.addEventListener('mouseup', function() {
            this.style.transform = 'scale(1) translateY(-2px)';
        });

        heroBtn.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) translateY(-2px)';
        });
    }

    // Rotação do círculo decorativo (via animation)
    if (heroImage) {
        const style = document.createElement('style');
        style.innerHTML = `
            .hero-image-wrapper::after {
                animation: gearRotate 20s linear infinite;
            }
        `;
        document.head.appendChild(style);
    }

    // Float Animation na imagem
    if (heroImage) {
        heroImage.style.animation = 'slideInRight 0.8s ease-out, float 4s ease-in-out infinite 0.8s';
    }

    // Observador de interseção para animações ao entrar na tela
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('in-view');
            }
        });
    }, {
        threshold: 0.1
    });

    if (heroContent) observer.observe(heroContent);
    if (heroImage) observer.observe(heroImage);
});

// Smooth Scroll para links âncora
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
