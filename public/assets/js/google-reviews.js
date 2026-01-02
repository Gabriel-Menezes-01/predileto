// Carregar avaliações do Google
document.addEventListener('DOMContentLoaded', function() {
    const testimonialsGrid = document.getElementById('testimonials-grid');
    let currentIndex = 0;
    let reviews = [];
    
    // Buscar as avaliações
    fetch('./get-google-reviews.php')
        .then(response => response.json())
        .then(data => {
            reviews = data;
            
            if (reviews.length === 0) {
                // Se não houver reviews, mostrar mensagem
                testimonialsGrid.innerHTML = '<p style="text-align: center; grid-column: 1 / -1;">Nenhuma avaliação encontrada.</p>';
                return;
            }
            
            // Exibir primeiro carrossel
            displayCarousel();
            
            // Trocar de avaliação a cada 5 segundos
            setInterval(function() {
                currentIndex = (currentIndex + 1) % reviews.length;
                displayCarousel();
            }, 5000);
        })
        .catch(error => {
            console.error('Erro ao buscar avaliações:', error);
            testimonialsGrid.innerHTML = '<p style="text-align: center; grid-column: 1 / -1;">Erro ao carregar avaliações.</p>';
        });
    
    // Função para exibir carrossel de avaliações
    function displayCarousel() {
        testimonialsGrid.innerHTML = '';
        
        // Mostrar até 3 avaliações por vez (rotacionando)
        for (let i = 0; i < 3; i++) {
            const index = (currentIndex + i) % reviews.length;
            const review = reviews[index];
            
            const card = document.createElement('div');
            card.className = 'testimonial-card';
            card.style.animation = `slideIn 0.5s ease-in-out ${i * 0.1}s both`;
            
            // Gerar estrelas
            const starsHTML = generateStars(review.rating);
            
            // Extrair localização ou usar padrão
            const location = review.reviewer_location || 'Cliente Google';
            
            card.innerHTML = `
                <div class="testimonial-header-card">
                    <img src="${review.profile_photo_url}" alt="Foto de ${review.author}" class="testimonial-avatar" onerror="this.src='https://via.placeholder.com/150'">
                    <div class="testimonial-info">
                        <h3 class="testimonial-name">${review.author}</h3>
                        <p class="testimonial-location">${review.time || location}</p>
                    </div>
                </div>
                <div class="testimonial-rating">
                    ${starsHTML}
                </div>
                <hr class="testimonial-divider">
                <p class="testimonial-text">"${review.text}"</p>
            `;
            
            testimonialsGrid.appendChild(card);
        }
    }
});

// Função para gerar HTML das estrelas
function generateStars(rating) {
    let starsHTML = '';
    for (let i = 1; i <= 5; i++) {
        if (i <= rating) {
            starsHTML += '<i class="bi bi-star-fill" style="color: #FFB703;"></i>';
        } else {
            starsHTML += '<i class="bi bi-star" style="color: #FFB703;"></i>';
        }
    }
    return starsHTML;
}

