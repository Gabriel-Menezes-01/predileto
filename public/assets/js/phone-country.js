(function () {
  let COUNTRIES = [];

  // Carregar países da API REST Countries
  async function loadCountriesFromAPI() {
    try {
      const response = await fetch('https://restcountries.com/v3.1/all');
      const data = await response.json();
      
      COUNTRIES = data
        .filter(country => country.idd && country.idd.root)
        .map(country => {
          const dialCode = country.idd.root + (country.idd.suffixes?.[0] || '');
          return {
            code: country.cca2.toLowerCase(),
            name: country.name.common,
            dial: dialCode,
            min: 9
          };
        })
        .sort((a, b) => a.name.localeCompare(b.name));
      
      if (COUNTRIES.length === 0) {
        loadFallbackCountries();
      }
    } catch (error) {
      console.warn('Erro ao carregar países da API, usando fallback:', error);
      loadFallbackCountries();
    }
  }

  function loadFallbackCountries() {
    COUNTRIES = [
      { code: 'pt', name: 'Portugal', dial: '+351', min: 9 },
      { code: 'br', name: 'Brasil', dial: '+55', min: 10 },
      { code: 'es', name: 'Espanha', dial: '+34', min: 9 },
      { code: 'fr', name: 'França', dial: '+33', min: 9 },
      { code: 'it', name: 'Itália', dial: '+39', min: 9 },
      { code: 'us', name: 'Estados Unidos', dial: '+1', min: 10 },
      { code: 'gb', name: 'Reino Unido', dial: '+44', min: 10 },
      { code: 'de', name: 'Alemanha', dial: '+49', min: 9 },
      { code: 'ca', name: 'Canadá', dial: '+1', min: 10 },
      { code: 'au', name: 'Austrália', dial: '+61', min: 9 }
    ];
  }

  function getRulesByDial(dial) {
    const found = COUNTRIES.find(c => c.dial === dial);
    return found || { code: 'xx', name: 'Desconhecido', dial, min: 10 };
  }

  function attachPhoneSelector(group) {
    const btn = group.querySelector('.phone-flag-btn');
    const menu = group.querySelector('.phone-country-menu');
    const input = group.querySelector('input[type=\"tel\"]');
    const dialCodeSpan = btn.querySelector('.phone-dial-code');
    const flagSpan = btn.querySelector('.fi');

    if (!btn || !menu || !input) return;

    // Criar menu de países
    COUNTRIES.forEach(country => {
      const item = document.createElement('div');
      item.className = 'phone-country-item';
      item.innerHTML = `
        <span class=\"fi fi-${country.code} fis\"></span>
        <span class=\"country-name\">${country.name}</span>
        <span class=\"country-dial\">${country.dial}</span>
      `;
      item.addEventListener('click', () => {
        selectCountry(country);
        menu.classList.remove('open');
      });
      menu.appendChild(item);
    });

    function selectCountry(country) {
      flagSpan.className = `fi fi-${country.code} fis`;
      dialCodeSpan.textContent = country.dial;
      btn.dataset.country = country.code;
      input.dataset.countryCode = country.dial;
      input.placeholder = `${country.dial} ...`;
    }

    btn.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      menu.classList.toggle('open');
    });

    document.addEventListener('click', (e) => {
      if (!group.contains(e.target)) {
        menu.classList.remove('open');
      }
    });

    input.addEventListener('input', (e) => {
      e.target.value = e.target.value.replace(/[^\d\s\-\(\)]/g, '');
    });
  }

  function attachAll() {
    const groups = document.querySelectorAll('[data-phone-group]');
    groups.forEach(group => {
      attachPhoneSelector(group);
    });
  }

  window.PHONE_COUNTRIES = COUNTRIES;
  window.getPhoneRules = function (dial) { return getRulesByDial(dial); };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', async () => {
      await loadCountriesFromAPI();
      attachAll();
    });
  } else {
    loadCountriesFromAPI().then(() => attachAll());
  }
})();
