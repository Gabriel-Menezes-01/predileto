# Sistema de Controle de Cache - Predileto

## 📋 Resumo

Implementado sistema completo de controle de cache que garante que os usuários sempre vejam a versão mais atualizada do site, sem precisar limpar o cache manualmente.

## 🎯 O que Foi Implementado

### 1. Headers HTTP de Cache (Lado Servidor)

**Arquivo: `config.php`**
- Headers automáticos em todas as páginas PHP
- `Cache-Control: no-cache, no-store, must-revalidate`
- `Pragma: no-cache`
- `Expires: 0`
- Headers de segurança adicionais

**Arquivo: `.htaccess`**
- Configurações Apache para controle de cache por tipo de arquivo
- HTML/PHP: Sem cache (sempre revalidar)
- CSS/JS: Cache de 1 hora (com versioning)
- Imagens: Cache de 1 ano (raramente mudam)
- Compressão GZIP para melhor performance

### 2. Versioning de Assets (Cache Busting)

**Arquivo: `config.php`**
```php
$assetVersion = '1.0.' . time();

function getAssetUrl($path) {
    return $assetBase . '/' . $path . '?v=' . $assetVersion;
}
```

**Resultado:**
- CSS: `header.css?v=1.0.1736697234`
- JS: `alerts.js?v=1.0.1736697234`
- Quando você atualizar os arquivos, o timestamp muda automaticamente
- Navegador detecta nova versão e baixa arquivo atualizado

### 3. Meta Tags HTML

**Arquivo: `inicio.php` (e deve ser aplicado em todas as páginas)**
```html
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
```

### 4. JavaScript de Controle de Cache

**Arquivo: `cache-control.js`**

Recursos implementados:

#### 4.1 Detecção de Versão
- Compara versão armazenada localmente com versão atual
- Se mudou, limpa cache automaticamente

#### 4.2 Monitoramento de Saída
- Detecta quando usuário sai do site
- Marca flag no sessionStorage

#### 4.3 Revalidação ao Retornar
- Quando usuário volta, verifica se há atualizações
- Força recarregamento se necessário

#### 4.4 Limpeza de Cache por Inatividade
- Após 30 minutos de inatividade, prepara limpeza
- Na próxima visita, cache é limpo

#### 4.5 Cache API
- Limpa cache do Service Worker (se houver)
- Usa `caches.delete()` para remover cache antigo

## 📁 Arquivos Criados/Modificados

### Criados
1. ✅ `public/assets/js/cache-control.js` - Sistema JavaScript de controle
2. ✅ `public/cache-headers.php` - Headers PHP reutilizáveis

### Modificados
1. ✅ `config.php` - Headers automáticos + versioning
2. ✅ `index.php` - Headers de cache
3. ✅ `public/inicio.php` - Meta tags + scripts atualizados
4. ✅ `.htaccess` - Controle Apache de cache

## 🚀 Como Funciona

### Cenário 1: Primeira Visita
1. Usuário acessa o site
2. `cache-control.js` salva versão: `v1.0`
3. Arquivos carregam com `?v=1.0.timestamp`

### Cenário 2: Você Atualiza o Site
1. Você modifica CSS/JS
2. Timestamp muda automaticamente: `?v=1.0.1736697500`
3. Navegador vê URL diferente e baixa novo arquivo

### Cenário 3: Usuário Retorna Após Atualização
1. Usuário volta ao site
2. JavaScript detecta nova versão
3. Limpa cache antigo
4. Recarrega página com versão nova

### Cenário 4: Usuário Sai e Volta
1. Usuário fecha aba
2. `beforeunload` marca no sessionStorage
3. Volta ao site
4. JavaScript força revalidação dos recursos

## 🔧 Como Usar

### Para Atualizar o Site

**Opção 1: Automática (Recomendada)**
- O sistema já está configurado para usar `time()` no versioning
- Cada reload gera nova versão automaticamente
- Ideal para desenvolvimento

**Opção 2: Manual**
Edite `config.php` quando fizer deploy:
```php
$assetVersion = '1.1.0'; // Mude para 1.2.0 na próxima atualização
```

### Para Testar

1. Acesse o site: `http://localhost/predileto/`
2. Abra DevTools (F12) → Console
3. Veja: "Sistema de controle de cache inicializado"
4. Verifique Network → Headers:
   - Cache-Control: no-cache
   - URLs com `?v=...`

### Para Aplicar em Outras Páginas

Todas as páginas em `/pages/` já herdam o sistema automaticamente porque incluem `config.php`. Para garantir:

```php
<?php
// No início de cada página
require __DIR__ . '/../../config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <link rel="stylesheet" href="<?= getAssetUrl('css/style.css') ?>">
</head>
<body>
    <script src="<?= getAssetUrl('js/cache-control.js') ?>"></script>
    <script src="<?= getAssetUrl('js/script.js') ?>"></script>
</body>
</html>
```

## 📊 Níveis de Cache Implementados

| Tipo | Cache | Estratégia |
|------|-------|-----------|
| HTML/PHP | ❌ Sem cache | Sempre recarrega |
| CSS/JS | ✅ 1 hora + versioning | Cache curto, versioning força atualização |
| Imagens | ✅ 1 ano | Cache longo (raramente mudam) |
| Fontes | ✅ 1 ano | Cache permanente |

## ⚙️ Configurações Avançadas

### Desabilitar Versioning Automático
Em `config.php`:
```php
$assetVersion = '1.0.0'; // Versão fixa
```

### Ajustar Timeout de Inatividade
Em `cache-control.js`:
```javascript
const INACTIVITY_TIMEOUT = 60 * 60 * 1000; // 60 minutos
```

### Forçar Limpeza ao Sair
Em `cache-control.js`, linha 48:
```javascript
window.addEventListener('beforeunload', function() {
    clearSiteCache(); // Adicione esta linha
    sessionStorage.setItem('predileto_user_left', 'true');
});
```

## 🐛 Troubleshooting

### Cache ainda aparece?
1. Limpe cache manualmente uma vez: Ctrl+Shift+Delete
2. Verifique se WAMP está recarregando `.htaccess`
3. Reinicie Apache

### Versioning não funciona?
1. Verifique se está usando `getAssetUrl()` em todos os assets
2. Confira console do navegador por erros
3. Verifique permissões de arquivo

### Performance lenta?
1. Desative cache automático em `cache-control.js`:
```javascript
// Comente linha 163:
// preventExcessiveCache();
```

## ✅ Checklist de Implementação

- [x] Headers HTTP em `config.php`
- [x] Meta tags em `inicio.php`
- [x] Versioning de assets com `getAssetUrl()`
- [x] JavaScript `cache-control.js` incluído
- [x] `.htaccess` configurado
- [ ] Aplicar em todas as páginas `/pages/*.php` (próximo passo)
- [ ] Testar em produção

## 📝 Próximos Passos Recomendados

1. **Aplicar em todas as páginas**: Atualizar `cardapio.php`, `contato.php`, etc. para usar `getAssetUrl()`
2. **Service Worker**: Implementar SW para cache offline avançado
3. **CDN**: Considerar CDN para assets estáticos
4. **Monitoring**: Adicionar logging de cache hits/misses

## 🔗 Referências

- [MDN - HTTP Caching](https://developer.mozilla.org/en-US/docs/Web/HTTP/Caching)
- [Cache API](https://developer.mozilla.org/en-US/docs/Web/API/Cache)
- [Apache mod_expires](https://httpd.apache.org/docs/current/mod/mod_expires.html)
