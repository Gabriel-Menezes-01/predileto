/**
 * Sistema de controle de cache
 * Gerencia cache e força recarregamento quando necessário
 */

(function() {
    'use strict';

    // Versão atual do site (sincronizado com PHP)
    const SITE_VERSION = 'v1.0';
    const VERSION_KEY = 'predileto_site_version';

    /**
     * Verifica se a versão mudou e força reload se necessário
     */
    function checkVersion() {
        const storedVersion = localStorage.getItem(VERSION_KEY);
        
        if (storedVersion && storedVersion !== SITE_VERSION) {
            console.log('Nova versão detectada, limpando cache...');
            clearSiteCache();
        }
        
        localStorage.setItem(VERSION_KEY, SITE_VERSION);
    }

    /**
     * Limpa o cache do site usando Cache API (Service Worker)
     */
    async function clearSiteCache() {
        if ('caches' in window) {
            try {
                const cacheNames = await caches.keys();
                await Promise.all(
                    cacheNames.map(cacheName => caches.delete(cacheName))
                );
                console.log('Cache limpo com sucesso');
            } catch (error) {
                console.error('Erro ao limpar cache:', error);
            }
        }
    }

    /**
     * Detecta quando o usuário sai da página
     */
    function setupBeforeUnloadHandler() {
        window.addEventListener('beforeunload', function() {
            // Marca que o usuário saiu do site
            sessionStorage.setItem('predileto_user_left', 'true');
        });
    }

    /**
     * Verifica se deve forçar recarregamento ao retornar
     */
    function checkReloadOnReturn() {
        const userLeft = sessionStorage.getItem('predileto_user_left');
        const pageAccessedByReload = (
            (window.performance.navigation && window.performance.navigation.type === 1) ||
            window.performance
                .getEntriesByType('navigation')
                .map((nav) => nav.type)
                .includes('reload')
        );

        // Se usuário voltou após sair (não é um reload manual)
        if (userLeft === 'true' && !pageAccessedByReload) {
            console.log('Usuário retornou, verificando atualizações...');
            sessionStorage.removeItem('predileto_user_left');
            
            // Força revalidação dos recursos
            if ('fetch' in window) {
                fetch(window.location.href, {
                    cache: 'reload',
                    headers: {
                        'Cache-Control': 'no-cache, no-store, must-revalidate',
                        'Pragma': 'no-cache'
                    }
                }).then(() => {
                    // Verifica se há atualizações
                    checkForUpdates();
                }).catch(err => {
                    console.error('Erro ao verificar atualizações:', err);
                });
            }
        }
    }

    /**
     * Verifica se há atualizações disponíveis
     */
    async function checkForUpdates() {
        try {
            // Faz requisição com cache bypass
            const response = await fetch(window.location.href, {
                method: 'HEAD',
                cache: 'no-cache',
                headers: {
                    'Cache-Control': 'no-cache, no-store, must-revalidate'
                }
            });

            // Verifica se há nova versão nos headers
            const serverVersion = response.headers.get('X-Site-Version');
            const localVersion = localStorage.getItem(VERSION_KEY);

            if (serverVersion && serverVersion !== localVersion) {
                console.log('Nova versão disponível, recarregando...');
                localStorage.setItem(VERSION_KEY, serverVersion);
                window.location.reload(true);
            }
        } catch (error) {
            console.error('Erro ao verificar atualizações:', error);
        }
    }

    /**
     * Previne cache excessivo de recursos dinâmicos
     */
    function preventExcessiveCache() {
        // Intercepta requisições de assets
        if ('fetch' in window) {
            const originalFetch = window.fetch;
            window.fetch = function(...args) {
                const url = args[0];
                
                // Se for um recurso local (CSS, JS, etc)
                if (typeof url === 'string' && 
                    (url.includes('/assets/') || url.includes('/api/'))) {
                    
                    // Adiciona timestamp se não tiver versão
                    if (!url.includes('?v=') && !url.includes('&v=')) {
                        const separator = url.includes('?') ? '&' : '?';
                        args[0] = url + separator + 't=' + Date.now();
                    }
                }
                
                return originalFetch.apply(this, args);
            };
        }
    }

    /**
     * Limpa cache quando o site está inativo por muito tempo
     */
    function setupInactivityCache() {
        const INACTIVITY_TIMEOUT = 30 * 60 * 1000; // 30 minutos
        let inactivityTimer;

        function resetTimer() {
            clearTimeout(inactivityTimer);
            inactivityTimer = setTimeout(() => {
                console.log('Site inativo, preparando limpeza de cache...');
                sessionStorage.setItem('predileto_clear_on_next', 'true');
            }, INACTIVITY_TIMEOUT);
        }

        // Eventos que resetam o timer
        ['mousedown', 'mousemove', 'keypress', 'scroll', 'touchstart'].forEach(event => {
            document.addEventListener(event, resetTimer, true);
        });

        resetTimer();
    }

    /**
     * Inicializa o sistema de controle de cache
     */
    function init() {
        // Verifica se deve limpar cache ao carregar
        if (sessionStorage.getItem('predileto_clear_on_next') === 'true') {
            clearSiteCache();
            sessionStorage.removeItem('predileto_clear_on_next');
        }

        // Verifica versão do site
        checkVersion();

        // Configura handlers
        setupBeforeUnloadHandler();
        checkReloadOnReturn();
        setupInactivityCache();

        // Previne cache excessivo (opcional)
        // preventExcessiveCache();

        console.log('Sistema de controle de cache inicializado');
    }

    // Inicializa quando DOM estiver pronto
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
