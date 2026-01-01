# 🧪 INSTRUÇÕES DE TESTE - Responsivo + Links

## 📋 Teste Rápido (5 minutos)

### Passo 1: Verificar no Navegador
```
1. Abra: http://localhost/predileto/public/
2. Pressione F12 (DevTools)
3. Clique no ícone de mobile (canto superior esquerdo)
4. Mudança para mobile? Se SIM ✅ continua. Se NÃO ❌ verifique paths.
```

### Passo 2: Testar Links
```
1. Clique em "Cardápio" no menu
2. Deve abrir sem erros ✅
3. Clique em "Ver todos os pratos"
4. Deve abrir a página todos-os-pratos.php ✅
5. Volte ao Início clicando no logo ou "Início"
```

### Passo 3: Testar Menu Mobile
```
1. Maximize DevTools (F12)
2. Configure para mobile (375px)
3. Procure pelo ícone hamburguer (3 linhas) ☰
4. Clique nele - deve virar X ✅
5. Clique novamente - deve voltar para ☰ ✅
6. Clique em qualquer link - menu deve fechar ✅
```

### Passo 4: Testar Breakpoints
```
Largura 375px (Mobile):
- Logo pequeno 50px ✅
- Menu hamburguer visível ✅
- Grid com 1 coluna ✅
- Hero com imagem em cima ✅

Largura 768px (Tablet):
- Logo maior 60px ✅
- Menu desktop começando ✅
- Grid com 2 colunas ✅
- Hero ainda em transição ✅

Largura 1024px+ (Desktop):
- Logo 70px ✅
- Menu desktop completo ✅
- Grid com 3 colunas ✅
- Hero lado a lado ✅
```

---

## 🔍 Teste Detalhado (15 minutos)

### Desktop (1440px)
```
□ Abra: http://localhost/predileto/public/inicio.php
□ Verifique logo (70px)
□ Menu horizontal visível: Início | Cardápio | Sobre Nós | Contato | [Reservar]
□ Hero com imagem à direita
□ 3 info boxes lado a lado
□ Footer com 4 colunas

□ Clique em "Cardápio"
□ Pratos em grid 3x3
□ "Ver todos" links funcionam
□ Cards têm shadow/hover effects

□ Clique em "Contato"
□ Formulário responsivo
□ Campos ocupam espaço adequado
□ Submeter deveria enviar email

□ Clique em "Reservas"
□ Formulário com campos horizontais
□ Data/hora pickers funcionam
□ Mensagem confirmação aparece
□ Link "Voltar" funciona

□ Verificar todos os links da navegação
```

### Tablet Landscape (1024px)
```
□ Redimensione para 1024px
□ Logo 70px (desktop size)
□ Menu desktop ainda visível
□ Hero com imagem à direita
□ Grids com 3 colunas
□ Tudo deve se organizar bem

□ Todos os links devem funcionar
□ Nenhum overflow/scroll horizontal
```

### Tablet Portrait (768px)
```
□ Redimensione para 768px
□ Logo começa a mudar
□ Menu desktop está ativo
□ Grids começam a adaptar (2-3 colunas)
□ Hero pode estar em transição

□ Sem problemas de layout
□ Texto legível
□ Imagens escaladas
```

### Mobile (480px)
```
□ Redimensione para 480px
□ Logo pequeno 50px
□ Menu hamburguer ☰ visível
□ Nav desktop sumiu
□ Nav mobile pronta para usar

□ Clique no hamburguer
□ Menu abre com slide animado
□ Links aparecem verticais
□ Clique em um link
□ Menu fecha automaticamente
□ Link abre página correta ✅

□ Verifique grids (1 coluna)
□ Cards uma por uma
□ Imagens preenchem tela
□ Nenhum overflow horizontal ✅

□ Teste formulário
□ Inputs expandem 100%
□ Altura mínima 48px (touch)
□ Teclado não quebra layout
```

### Mobile XS (360px)
```
□ Redimensione para 360px
□ Layout ainda funciona
□ Hamburger still visible and clickable
□ Hero content readable
□ Nenhum scroll horizontal
□ Safe area (notch) considerado
```

---

## 🔗 Teste de Links (Matriz)

### De Início (/)
```
□ Clique em "Cardápio" → /pages/cardapio.php ✅
□ Clique em "Sobre Nós" → /pages/sobreNos.php ✅
□ Clique em "Contato" → /pages/contato.php ✅
□ Clique em "Reservar já" → /pages/reserva.php ✅
□ Clique em logo → /index.php ✅
```

### De Cardápio (/pages/cardapio.php)
```
□ Clique em "Início" → ../index.php ✅
□ Clique em "Cardápio" → ./cardapio.php (current) ✅
□ Clique em "Sobre Nós" → ../pages/sobreNos.php ✅
□ Clique em "Contato" → ../pages/contato.php ✅
□ Clique em "Reservar já" → ../pages/reserva.php ✅
□ Clique em "Ver todos os pratos" → ./todos-os-pratos.php ✅
```

### De Todos os Pratos (/pages/todos-os-pratos.php)
```
□ Clique em "Cardápio" (nav) → ./cardapio.php ✅
□ Clique em "Início" (nav) → ../index.php ✅
```

### De Contato (/pages/contato.php)
```
□ Clique em "Início" → ../index.php ✅
□ Clique em "Cardápio" → ./cardapio.php ✅
□ Envie formulário → enviar-contato.php ✅
```

### De Reserva (/pages/reserva.php)
```
□ Clique em "Início" → ../index.php ✅
□ Envie formulário → enviar-reserva.php ✅
□ Click "Voltar ao Início" no modal → ../index.php ✅
```

---

## 🎨 Teste Visual

### Cores e Contraste (Mobile)
```
□ Texto legível em fundo
□ Botões destacam
□ Links claros
□ Sem problemas de contrast
```

### Tipografia
```
□ H1: 48px desktop, 24px mobile ✅
□ Body: 16px desktop, 14px mobile ✅
□ Sem zoom ao focar inputs (16px) ✅
□ Line-height adequado (~1.5) ✅
```

### Imagens
```
□ Sem distorção
□ Escaladas corretamente
□ Logo PNG: http://localhost/predileto/public/assets/images/logo/LogoPredileto.svg ✅
□ Sem erro 404 ✅
```

### Animações
```
□ Menu hamburguer animation suave ✅
□ Transição de menu desliza (300ms) ✅
□ Hover effects nos botões ✅
□ Sem lag/stuttering ✅
```

---

## 🎯 Teste em Dispositivo Real

### iPhone 12/13 (390x844px)
```
1. Na mesma rede que o PC com WAMP
2. Obtenha IP do PC: ipconfig (cmd)
3. No celular: http://192.168.X.X/predileto/public/
4. Teste orientação portrait e landscape
5. Toque em hamburguer e links
6. Verifique notch (safe area)
```

### Android (412x915px)
```
1. Mesma rede
2. http://192.168.X.X/predileto/public/
3. Teste scroll suave
4. Menu mobile funciona
5. Sem layout shifts
```

### Tablet (iPad - 768x1024px)
```
1. Mesmo IP
2. Teste em landscape
3. Grid com 3 colunas
4. Botões clicáveis
```

---

## 🐛 Problemas Comuns e Soluções

### Problema: Links retornam 404
```
Solução:
1. Verificar se está usando $rootPath dinamicamente
2. Confirmar que paths.php está incluído
3. Verificar console (F12 > Console) por erros PHP
4. Usar grep para encontrar links quebrados:
   grep -r "href=" public/ | grep -v "\$rootPath"
```

### Problema: Menu mobile não abre
```
Solução:
1. Verificar se header.js está sendo carregado
2. DevTools > Console verificar erros JS
3. Verificar se classe "menu-toggle" existe
4. Verificar se .nav-mobile existe
```

### Problema: CSS não aplica em mobile
```
Solução:
1. Verificar meta viewport: 
   <meta name="viewport" content="width=device-width, initial-scale=1">
2. Limpar cache: Ctrl+Shift+Delete
3. Hard refresh: Ctrl+Shift+R
4. Verificar se responsive.css está linkado
5. Abrir DevTools > Network > verificar se responsive.css carregou
```

### Problema: Imagens não carregam
```
Solução:
1. Verificar console por 404 errors
2. Usar F12 > Network > Images
3. Confirmar caminho: <?= $assetBase ?>/images/...
4. Verificar se arquivo existe em public/assets/images/
```

### Problema: Texto muito pequeno em mobile
```
Solução:
1. Verificar font-size no responsive.css
2. Aumentar se necessário:
   @media (max-width: 480px) {
       body { font-size: 16px; }
   }
3. Hard refresh (Ctrl+Shift+R)
```

---

## ✅ Checklist Final

```
RESPONSIVIDADE:
□ Mobile (360px) - funciona
□ Tablet (768px) - funciona
□ Desktop (1440px) - funciona
□ Menu mobile abre/fecha
□ Sem scroll horizontal
□ Imagens escaladas
□ Texto legível

LINKS:
□ Navegação funciona em todas páginas
□ "Ver todos" links funcionam
□ Modal "Voltar" funciona
□ Footer links funcionam (tel, email)
□ Nenhum 404 error

CSS:
□ responsive.css carrega
□ Cores corretas
□ Fonts corretas
□ Animações suaves

JAVASCRIPT:
□ Menu toggle funciona
□ Sem erros no console
□ header.js carrega

ASSETS:
□ Logo carrega
□ Imagens dos pratos carregam
□ Favicons (se houver) carregam

FORMULÁRIOS:
□ Campos redimensionam mobile
□ Envio funciona (check PHP)
□ Validação funciona
```

---

## 📞 Suporte

Se encontrar problemas:

1. **Verifique o console** (F12 > Console)
2. **Verifique Network** (F12 > Network) para 404s
3. **Limpe cache** (Ctrl+Shift+Delete)
4. **Hard refresh** (Ctrl+Shift+R)
5. **Reinicie WAMP** (se necessário)

---

**Tempo total de teste:** 15-20 minutos  
**Resultado esperado:** ✅ Tudo funciona perfeitamente

