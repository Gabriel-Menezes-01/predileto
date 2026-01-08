document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('contatoForm');
  const feedback = document.getElementById('formFeedback');
  const submitBtn = form?.querySelector('button[type="submit"]');
  const telInput = document.querySelector("#telefone");

  if (!form) return;

  function validateEmail(email) {
    return /[^\s@]+@[^\s@]+\.[^\s@]+/.test(email);
  }

  function showConfirmationModal() {
    if (typeof window.showAppModal === 'function') {
      window.showAppModal({
        title: 'Mensagem enviada!',
        message: 'Obrigado pelo contato. Responderemos em breve.',
        variant: 'success',
        primaryLabel: 'Voltar ao início',
        redirectUrl: './contato.php',
        autoCloseMs: 3000
      });
    }
  }

  const showError = (message) => {
    if (typeof window.showAppModal === 'function') {
      // Mensagem mais curta para mobile
      const isMobile = window.innerWidth <= 640;
      const displayMessage = isMobile && message.length > 80 ? 
        message.substring(0, 77) + '...' : message;
      
      window.showAppModal({
        title: 'Atenção',
        message: displayMessage,
        variant: 'error',
        primaryLabel: 'Entendi'
      });
    } else if (feedback) {
      feedback.textContent = message;
      feedback.style.color = '#D00000';
    }
  };

  form.addEventListener('submit', (e) => {
    e.preventDefault();
    if (feedback) feedback.textContent = '';

    const nome = form.nome.value.trim();
    const email = form.email.value.trim();
    const telefone = form.telefone.value.trim();
    const countryCode = telInput.dataset.countryCode || '';
    const assunto = form.assunto.value.trim();
    const mensagem = form.mensagem.value.trim();

    // Validações simples
    if (!nome || !email || !assunto || !mensagem || !telefone) {
      showError('Por favor, preencha os campos obrigatórios.');
      return;
    }

    if (!validateEmail(email)) {
      showError('Informe um email válido.');
      return;
    }

    // Validar telefone com regras por país
    const telDigits = telefone.replace(/\D/g, '');
    const rules = typeof window.getPhoneRules === 'function' ? window.getPhoneRules(countryCode) : { min: 9 };
    if (telDigits.length < (rules.min || 9)) {
      showError(`Por favor, insira um telefone válido (${rules.min}+ dígitos).`);
      return;
    }

    const fullPhone = `${countryCode} ${telDigits}`;
    
    // Feedback do botão
    if (submitBtn) {
      submitBtn.disabled = true;
      submitBtn.textContent = 'Enviando...';
    }

    // Enviar dados via fetch
    const formData = new FormData();
    formData.append('nome', nome);
    formData.append('email', email);
    formData.append('telefone', fullPhone);
    formData.append('assunto', assunto);
    formData.append('mensagem', mensagem);

    fetch('../enviar-contato.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (submitBtn) {
        submitBtn.disabled = false;
        submitBtn.textContent = 'Enviar mensagem';
      }
      
      if (data.success) {
        form.reset();
        showConfirmationModal();
      } else {
        showError(data.message || 'Erro ao enviar mensagem.');
      }
    })
    .catch(error => {
      if (submitBtn) {
        submitBtn.disabled = false;
        submitBtn.textContent = 'Enviar mensagem';
      }
      showError('Erro ao enviar mensagem. Tente novamente.');
      console.error('Erro:', error);
    });
  });
});
