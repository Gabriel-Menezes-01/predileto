document.addEventListener('DOMContentLoaded', () => {
  const newsletterForm = document.getElementById('newsletterForm');

  if (!newsletterForm) return;

  newsletterForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const emailInput = newsletterForm.querySelector('input[type="email"]');
    const email = emailInput.value.trim();

    // Validação básica de email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email || !emailRegex.test(email)) {
      alert('Por favor, insira um email válido.');
      return;
    }

    // Simulação de envio dos dados
    console.log('Email cadastrado para newsletter:', email);
    alert('Obrigado por se inscrever! Verifique seu email.');

    // Limpar o campo
    emailInput.value = '';
  });
});
