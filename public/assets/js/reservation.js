document.addEventListener('DOMContentLoaded', () => {
  const reservationForm = document.getElementById('reservationForm');
  const telInput = document.querySelector('input[name="telefone"]');

  if (!reservationForm) return;

  const redirectUrl = window.location.pathname.includes('/pages/') ? '../inicio.php' : 'inicio.php';

  const showError = (message) => {
    if (typeof window.showAppModal === 'function') {
      window.showAppModal({
        title: 'Atenção',
        message,
        variant: 'error',
        primaryLabel: 'Entendi'
      });
    }
  };

  // Validar data mínima (não permitir datas passadas)
  const dateInput = reservationForm.querySelector('input[type="date"]');
  if (dateInput) {
    const today = new Date().toISOString().split('T')[0];
    dateInput.min = today;
  }

  // Validar horário permitido (restaurante aberto de 12h às 23h30)
  const timeInput = reservationForm.querySelector('input[type="time"]');
  if (timeInput) {
    timeInput.addEventListener('change', (e) => {
      const time = e.target.value;
      if (time) {
        const [hours, minutes] = time.split(':').map(Number);
        if (hours < 12 || (hours >= 24)) {
          showError('O restaurante funciona das 12h às 23h30');
          e.target.value = '';
        } else if (hours === 23 && minutes > 30) {
          showError('O restaurante funciona até as 23h30');
          e.target.value = '';
        }
      }
    });
  }

  // Limitar quantidade de pessoas
  const pessoasInput = reservationForm.querySelector('input[name="pessoas"]');
  if (pessoasInput) {
    pessoasInput.addEventListener('change', (e) => {
      const valor = parseInt(e.target.value);
      if (valor > 20) {
        showError('Máximo de 20 pessoas. Para grupos maiores, entre em contato conosco.');
        e.target.value = '20';
      }
    });
  }

  // Função para mostrar modal de confirmação
  function showConfirmationModal() {
    const modal = document.getElementById('confirmationModal');
    const redirectUrl = window.location.pathname.includes('/pages/') ? '../inicio.php' : 'inicio.php';
    if (modal) {
      modal.classList.add('show');
      setTimeout(() => {
        window.location.href = redirectUrl;
      }, 3000);
    }
  }

  // Fechar modal ao clicar no botão
  const modalBtn = document.querySelector('.modal-btn');
  if (modalBtn) {
    modalBtn.addEventListener('click', (e) => {
      e.preventDefault();
      const redirectUrl = window.location.pathname.includes('/pages/') ? '../inicio.php' : 'inicio.php';
      window.location.href = redirectUrl;
    });
  }

  reservationForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(reservationForm);
    const data = {
      name: formData.get('name').trim(),
      email: formData.get('email').trim(),
      telefone: (formData.get('telefone') || '').trim(),
      pessoas: parseInt(formData.get('pessoas')),
      horario: formData.get('horario'),
      data: formData.get('data')
    };

    const countryCode = telInput.dataset.countryCode || '';

    // Validação básica
    if (!data.name || !data.email || !data.pessoas || !data.horario || !data.data || !data.telefone) {
      showError('Por favor, preencha todos os campos.');
      return;
    }

    // Validar email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(data.email)) {
      showError('Por favor, insira um email válido.');
      return;
    }

    // Validar telefone com regras por país
    const telDigits = data.telefone.replace(/\D/g, '');
    const rules = typeof window.getPhoneRules === 'function' ? window.getPhoneRules(countryCode) : { min: 9 };
    if (telDigits.length < (rules.min || 9)) {
      showError(`Por favor, insira um telefone válido (${rules.min}+ dígitos).`);
      return;
    }

    // Validar data (não permitir datas muito antigas)
    const dataReserva = new Date(data.data);
    const hoje = new Date();
    hoje.setHours(0, 0, 0, 0);
    
    if (dataReserva < hoje) {
      showError('Por favor, selecione uma data válida.');
      return;
    }

    const fullPhone = `${countryCode} ${telDigits}`;
    
    // Botão feedback
    const submitBtn = reservationForm.querySelector('button[type="submit"]');
    const btnOriginalText = submitBtn.textContent;
    submitBtn.disabled = true;
    submitBtn.textContent = 'Enviando...';

    // Enviar dados via fetch
    const formDataToSend = new FormData();
    formDataToSend.append('name', data.name);
    formDataToSend.append('email', data.email);
    formDataToSend.append('telefone', fullPhone);
    formDataToSend.append('pessoas', data.pessoas);
    formDataToSend.append('horario', data.horario);
    formDataToSend.append('data', data.data);

    // Determinar caminho correto baseado na URL atual
    const phpPath = window.location.pathname.includes('/pages/') ? '../enviar-reserva.php' : 'enviar-reserva.php';

    fetch(phpPath, {
      method: 'POST',
      body: formDataToSend
    })
    .then(response => response.json())
    .then(result => {
      submitBtn.disabled = false;
      submitBtn.textContent = btnOriginalText;
      
      if (result.success) {
        reservationForm.reset();
        
        if (typeof window.showAppModal === 'function') {
          window.showAppModal({
            title: 'Sua reserva está confirmada!',
            message: `Obrigado por nos escolher.\n\n📅 ${new Date(data.data).toLocaleDateString('pt-BR')}  ⏰ ${data.horario}  👥 ${data.pessoas} pessoas`,
            variant: 'success',
            primaryLabel: 'Voltar ao início',
            redirectUrl,
            autoCloseMs: 3000
          });
          
          // Redirecionar após 3 segundos
          setTimeout(() => {
            window.location.href = redirectUrl;
          }, 3000);
        } else {
          showConfirmationModal();
          
          // Redirecionar após 3 segundos
          setTimeout(() => {
            window.location.href = redirectUrl;
          }, 3000);
        }
      } else {
        showError(result.message || 'Erro ao enviar reserva.');
      }
    })
    .catch(error => {
      submitBtn.disabled = false;
      submitBtn.textContent = btnOriginalText;
      showError('Erro ao enviar reserva. Tente novamente.');
      console.error('Erro:', error);
    });
  });
});
