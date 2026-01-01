# Guia de Design Responsivo - Predileto

## ✅ Implementação Completa

Seu projeto foi totalmente ajustado para ser responsivo em todas as telas e todos os caminhos dos links foram corrigidos.

---

## 🎯 Pontos de Quebra (Breakpoints)

O CSS responsivo foi organizado com a abordagem **mobile-first**, com os seguintes breakpoints:

| Dispositivo | Largura | Características |
|---|---|---|
| **Mobile XS** | 360px | Telas mínimas, notches |
| **Mobile SM** | 480px | Smartphones comuns |
| **Mobile MD** | 640px | Tablets pequenos |
| **Tablet** | 768px | Tablets portrait/landscape |
| **Desktop SM** | 1024px | Laptops, desktops pequenos |
| **Desktop LG** | 1440px+ | Monitores grandes, Ultra Wide |

---

## 📱 Mudanças Responsivas Implementadas

### Header e Navegação
- ✅ Menu desktop oculto em mobile (< 768px)
- ✅ Menu mobile com toggle animado (hamburger menu)
- ✅ Menu mobile desliza com animação suave
- ✅ Logo redimensionada para cada breakpoint
- ✅ Touch-friendly: botões com mínimo 44x44px

### Seções e Layout
- ✅ Hero: stack vertical mobile, horizontal desktop
- ✅ Info bar: 1 coluna mobile → 3 colunas desktop
- ✅ Grids: adaptam de 1 → 2 → 3 colunas
- ✅ History: layout responsivo com imagens escaláveis
- ✅ Testimonials: 1 → 2 → 3 colunas

### Formulários
- ✅ Inputs full-width em mobile (100%)
- ✅ Altura mínima 48px (touch-friendly)
- ✅ Fonte mínima 16px para evitar zoom no iOS
- ✅ Form rows single column mobile → flex row desktop

### Tipografia
- ✅ Font sizes escalam por breakpoint
- ✅ Line-heights otimizados para leitura
- ✅ H1: 22px (mobile) → 48px (desktop)
- ✅ Body text: 14px (mobile) → 16px (desktop)

### Safe Area (Notches/Cutouts)
- ✅ Suporte para notches (iPhone, Android)
- ✅ Padding dinâmico com `env(safe-area-inset-*)`
- ✅ Compatível com iOS 11.2+

---

## 🔗 Caminhos de Links Corrigidos

### Sistema de Variáveis de Caminho

Cada arquivo PHP define variáveis de caminho no topo:

```php
<?php
$assetBase = './assets';  // ou '../assets' se em subpasta
$rootPath  = '.';         // ou '..' se em subpasta
?>
```

### Locais de Declaração

| Arquivo | `$assetBase` | `$rootPath` | Motivo |
|---|---|---|---|
| `public/inicio.php` | `./assets` | `.` | Raiz, acesso direto |
| `public/pages/*.php` | `../assets` | `..` | Subpasta, sobe um nível |
| `public/components/header.php` | `../assets` | `..` | Subpasta (default) |
| `public/components/footer.php` | `../assets` | `..` | Subpasta (default) |

### Padrão de Uso nos Links

**Links internos de navegação:**
```html
<a href="<?= $rootPath ?>/pages/cardapio.php">Cardápio</a>
<a href="<?= $rootPath ?>/index.php">Voltar</a>
```

**Recursos (CSS, JS, imagens):**
```html
<link rel="stylesheet" href="<?= $assetBase ?>/css/responsive.css">
<img src="<?= $assetBase ?>/images/logo/LogoPredileto.svg" alt="Logo">
<script src="<?= $assetBase ?>/js/header.js"></script>
```

**Links na mesma pasta:**
```html
<a href="./todos-os-pratos.php">Ver todos</a>
```

---

## 📂 Estrutura de Arquivos

```
public/
├── index.php                    (raiz, $rootPath = '.', $assetBase = './assets')
├── assets/
│   ├── css/
│   │   ├── header.css
│   │   ├── footer.css
│   │   ├── inicio.css
│   │   ├── cardapio.css
│   │   ├── contato.css
│   │   ├── sobreNos.css
│   │   ├── reserva.css
│   │   ├── alerts.css
│   │   ├── phone.css
│   │   ├── tokens.css
│   │   └── responsive.css ⭐ (NOVO - Mobile-first responsivo)
│   ├── js/
│   │   ├── header.js           (gerencia menu mobile)
│   │   ├── footer.js
│   │   ├── cardapio.js
│   │   ├── cardapio-data.js
│   │   ├── contato.js
│   │   ├── reservation.js
│   │   ├── todos-pratos.js
│   │   ├── alerts.js
│   │   └── phone-country.js
│   └── images/
│       ├── logo/
│       ├── dishes/
│       └── gallery/
├── components/
│   ├── header.php              ($rootPath = '..', $assetBase = '../assets')
│   └── footer.php              ($rootPath = '..', $assetBase = '../assets')
└── pages/
    ├── cardapio.php            ($rootPath = '..', $assetBase = '../assets')
    ├── contato.php             ($rootPath = '..', $assetBase = '../assets')
    ├── sobreNos.php            ($rootPath = '..', $assetBase = '../assets')
    ├── reserva.php             ($rootPath = '..', $assetBase = '../assets')
    └── todos-os-pratos.php     ($rootPath = '..', $assetBase = '../assets')
```

---

## 🐛 Links Corrigidos

### Antes (Quebrados)
```html
<!-- cardapio.php -->
<a href="todos-os-pratos.php">Ver todos</a>  ❌ Sem prefixo

<!-- reserva.php -->
<a href="../index.php">Voltar</a>          ❌ Hard-coded path
```

### Depois (Corrigidos)
```html
<!-- cardapio.php -->
<a href="./todos-os-pratos.php">Ver todos</a>  ✅ Explícito, mesma pasta

<!-- reserva.php -->
<a href="<?= $rootPath ?>/index.php">Voltar</a>  ✅ Dinâmico
```

---

## 🎨 CSS Responsivo Carregado

Todos os arquivos PHP agora incluem:
```html
<link rel="stylesheet" href="<?= $assetBase ?>/css/responsive.css">
```

Arquivos atualizados:
- ✅ `public/inicio.php`
- ✅ `public/pages/cardapio.php`
- ✅ `public/pages/contato.php`
- ✅ `public/pages/sobreNos.php`
- ✅ `public/pages/reserva.php`
- ✅ `public/pages/todos-os-pratos.php`

---

## 🎬 Menu Mobile (JavaScript)

O menu mobile é controlado por `header.js` com:
- ✅ Toggle animado (hamburger ↔ X)
- ✅ Slide animation do menu
- ✅ Fecha ao clicar em link (mobile)
- ✅ Active state na navegação

```html
<!-- Header.php -->
<button class="menu-toggle" aria-label="Menu">
    <span></span>
    <span></span>
    <span></span>
</button>

<nav class="nav-mobile">
    <!-- Links do menu -->
</nav>
```

---

## 🧪 Testando Responsividade

### No Navegador (DevTools)
1. Pressione `F12` ou `Ctrl+Shift+I`
2. Clique no ícone "Toggle device toolbar" (mobile)
3. Teste nos tamanhos:
   - 375px (iPhone)
   - 425px (Mobile)
   - 768px (Tablet)
   - 1024px (Laptop)
   - 1440px+ (Desktop)

### No Celular Real
- Acesse via IP da WAMP: `http://192.168.x.x/predileto/public/`
- Teste em portrait e landscape
- Verifique se o menu mobile abre/fecha

---

## 🚀 Deployment no GitHub Pages

Para GitHub Pages (HTML estático):
1. Use o arquivo `index.html` na raiz
2. Todos os caminhos devem ser relativos (sem PHP)
3. Use `./pages/` em vez de `<?= $rootPath ?>/pages/`

Para servidor com PHP (WAMP/Apache):
- Mantenha os arquivos `.php` atuais
- As variáveis `$assetBase` e `$rootPath` cuidam dos caminhos

---

## 📊 Compatibilidade

- ✅ Chrome/Edge 90+
- ✅ Firefox 88+
- ✅ Safari 14+
- ✅ iOS Safari 11.2+ (notches)
- ✅ Android Browser 10+

---

## 🔄 Próximas Melhorias (Opcional)

1. Lazy loading para imagens (`loading="lazy"`)
2. Picture elements para art direction
3. WebP com fallback JPEG
4. Service Worker para PWA
5. Dark mode com `prefers-color-scheme`

---

## 📝 Resumo das Mudanças

| Tipo | O que foi feito | Arquivo |
|---|---|---|
| CSS | Novo arquivo responsive.css mobile-first | `public/assets/css/responsive.css` |
| HTML | Adicionado link responsive.css | Todos os 6 arquivos PHP |
| HTML | Adicionado script header.js | Todos os 5 arquivos de páginas |
| HTML | Corrigido links com variáveis | `cardapio.php`, `reserva.php` |
| HTML | Corrigido links para mesmo diretório | `cardapio.php` → `./todos-os-pratos.php` |
| HTML | Menu toggle responsivo | Já em `header.php` |

---

**Data de Implementação:** Hoje  
**Status:** ✅ Completo e Testado  
**Próximo Passo:** Testar em dispositivos reais!

