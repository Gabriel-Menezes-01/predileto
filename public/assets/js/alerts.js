(() => {
  const ICONS = {
    success: '<i class="bi bi-check"></i>',
    error: '<i class="bi bi-x"></i>',
    info: '<i class="bi bi-info"></i>'
  };

  function ensureModal() {
    let overlay = document.getElementById('appModal');
    if (overlay) return overlay;

    overlay = document.createElement('div');
    overlay.id = 'appModal';
    overlay.className = 'modal-overlay';
    overlay.innerHTML = `
      <div class="modal-content">
        <div class="modal-icon success" aria-hidden="true"></div>
        <h2></h2>
        <p></p>
        <div class="modal-actions"></div>
      </div>
    `;
    document.body.appendChild(overlay);
    return overlay;
  }

  function clearActions(actionsEl) {
    while (actionsEl.firstChild) actionsEl.removeChild(actionsEl.firstChild);
  }

  function showAppModal(options = {}) {
    const {
      title = 'Tudo certo!',
      message = '',
      variant = 'success',
      primaryLabel = 'OK',
      primaryAction,
      secondaryLabel,
      secondaryAction,
      autoCloseMs,
      redirectUrl
    } = options;

    const overlay = ensureModal();
    const content = overlay.querySelector('.modal-content');
    const icon = overlay.querySelector('.modal-icon');
    const titleEl = overlay.querySelector('h2');
    const messageEl = overlay.querySelector('p');
    const actionsEl = overlay.querySelector('.modal-actions');

    clearActions(actionsEl);

    icon.className = `modal-icon ${variant}`;
    icon.innerHTML = ICONS[variant] || ICONS.success;
    titleEl.textContent = title;
    messageEl.textContent = message;

    const primaryBtn = document.createElement('button');
    primaryBtn.className = 'modal-btn';
    primaryBtn.type = 'button';
    primaryBtn.textContent = primaryLabel;
    primaryBtn.addEventListener('click', () => {
      if (primaryAction) primaryAction();
      overlay.classList.remove('show');
      if (redirectUrl) window.location.href = redirectUrl;
    });
    actionsEl.appendChild(primaryBtn);

    if (secondaryLabel) {
      const secondaryBtn = document.createElement('button');
      secondaryBtn.className = 'modal-btn secondary';
      secondaryBtn.type = 'button';
      secondaryBtn.textContent = secondaryLabel;
      secondaryBtn.addEventListener('click', () => {
        if (secondaryAction) secondaryAction();
        overlay.classList.remove('show');
      });
      actionsEl.appendChild(secondaryBtn);
    }

    overlay.classList.add('show');

    // Fechar ao pressionar Esc
    const escHandler = (e) => {
      if (e.key === 'Escape') {
        overlay.classList.remove('show');
        document.removeEventListener('keydown', escHandler);
      }
    };
    document.addEventListener('keydown', escHandler);

    if (autoCloseMs) {
      setTimeout(() => overlay.classList.remove('show'), autoCloseMs);
    }
  }

  window.showAppModal = showAppModal;
})();
