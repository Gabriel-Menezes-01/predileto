# Predileto Restaurant Website - AI Agent Guidelines

## Project Overview
Single-page PHP restaurant website with mobile-first responsive design, running on WAMP stack (Windows/Apache/MySQL/PHP). No framework - vanilla PHP with component includes.

## Critical Architecture Patterns

### Path Resolution System
All pages use PHP variables for dynamic path resolution based on directory depth:

```php
// Root level (inicio.php, index.php)
$assetBase = './assets';
$rootPath  = '.';

// Pages folder (pages/*.php)
$assetBase = '../assets';
$rootPath  = '..';

// Components (components/*.php)
$assetBase = '../assets';
$rootPath  = '..';
```

**Always use these variables - never hardcode paths:**
- Links: `href="<?= $rootPath ?>/pages/cardapio.php"`
- CSS/JS: `<link href="<?= $assetBase ?>/css/header.css">`
- Images: `<img src="<?= $assetBase ?>/images/logo.svg">`

### Component Include Pattern
- Header: `<?php include __DIR__ . "/../components/header.php" ?>`
- Footer: `<?php include __DIR__ . "/../components/footer.php" ?>`
- Header/footer rely on parent page's `$assetBase` and `$rootPath` variables

### CSS Loading Order (Critical)
Every page must load CSS in this exact order:
1. `header.css` - Header/navigation styles
2. `footer.css` - Footer styles
3. Page-specific CSS (e.g., `contato.css`, `cardapio.css`)
4. `responsive.css` - **ALWAYS LAST** - Mobile-first breakpoints

### JavaScript Loading (End of Body)
```html
<script src="<?= $assetBase ?>/js/alerts.js"></script>
<script src="<?= $assetBase ?>/js/[page-specific].js"></script>
<script src="<?= $assetBase ?>/js/header.js"></script> <!-- Must be last for nav -->
```

## Responsive Design Rules

### Mobile-First Breakpoints
```css
/* Base: 360px+ (mobile first) */
@media (min-width: 480px) { /* Small phones */ }
@media (min-width: 640px) { /* Large phones */ }
@media (min-width: 768px) { /* Tablets */ }
@media (min-width: 1024px) { /* Desktop */ }
@media (min-width: 1440px) { /* Large desktop */ }
```

### Menu Toggle System
- Mobile: `.menu-toggle` (hamburger) visible, `.nav-mobile` slides in
- Desktop (≥968px): `.nav-desktop` visible, hamburger hidden
- JavaScript in `header.js` handles toggle state and active link highlighting

### Touch Target Sizing
Minimum 44x44px for all interactive elements on mobile (WCAG AAA compliance).

## Data Architecture

### Menu System
- Static data in `cardapio-data.js` (no database)
- Structure: `pratos.carne[]` (6 items), `pratos.frango[]` (6 items), `pratos.peixe[]` (6 items)
- Each item: `{id, nome, preco, rating, categoria, imagem, descricao}`
- Images relative to calling page: `../images/dishes/carne1.jpg`
- Prices auto-formatted in EUR via `formatarPreco()` function

### Form Submissions
All forms use Formspree (external service) - no backend processing:
- Contact form: `action="https://formspree.io/f/xlgdjead"`
- Reservation form: Same endpoint
- Newsletter form: Same endpoint
- Legacy PHP handlers (`enviar-contato.php`, `enviar-reserva.php`) exist but use Formspree internally

## Development Workflow

### Local Testing
```powershell
# WAMP must be running on port 80
# Test URL: http://localhost/predileto/public/
# Entry point: d:\WAMP\www\predileto\index.php
```

### Testing Responsive Design
1. Open DevTools (F12)
2. Toggle device toolbar (Ctrl+Shift+M)
3. Test breakpoints: 375px, 768px, 1024px, 1440px
4. Verify hamburger menu at <968px
5. Verify 3-line horizontal menu at ≥968px

### Common Pitfalls
- ❌ Don't use `href="todos-os-pratos.php"` → ✅ Use `href="./todos-os-pratos.php"`
- ❌ Don't hardcode `../index.php` → ✅ Use `<?= $rootPath ?>/index.php`
- ❌ Don't load `responsive.css` before other CSS → ✅ Always load it last
- ❌ Don't forget `header.js` → ✅ Required for menu toggle and active states

## Key Files Reference
- [index.php](index.php) - Root entry point, sets base paths
- [public/inicio.php](public/inicio.php) - Main homepage template
- [public/components/header.php](public/components/header.php) - Shared header with dual nav
- [public/assets/css/responsive.css](public/assets/css/responsive.css) - All responsive overrides
- [public/assets/js/header.js](public/assets/js/header.js) - Menu toggle + active state logic
- [public/assets/js/cardapio-data.js](public/assets/js/cardapio-data.js) - Static menu data
- [00-LEIA-PRIMEIRO.md](00-LEIA-PRIMEIRO.md) - Comprehensive implementation guide (Portuguese)

## When Adding New Pages
1. Copy path variable pattern from existing pages
2. Include header/footer components using `__DIR__` pattern
3. Load CSS in correct order (responsive.css last)
4. Load header.js last in script tags
5. Use `$rootPath` for all internal links
6. Use `$assetBase` for all assets
