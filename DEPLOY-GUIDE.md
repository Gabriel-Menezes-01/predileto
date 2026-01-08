# Guia de Deploy - Predileto Restaurant Website

## Problemas Corrigidos ✅

### 1. Caminhos de Assets (CSS/JS/Imagens)
- ❌ **Antes:** Caminhos relativos (`../assets/`, `./assets/`) quebravam em produção
- ✅ **Agora:** Sistema de detecção automática de ambiente (localhost vs produção)
- Usa caminhos absolutos `/assets/` em produção
- Mantém caminhos relativos em desenvolvimento local

### 2. Links Internos
- ❌ **Antes:** Links como `href="./pages/cardapio.php"` quebravam
- ✅ **Agora:** Usa variável `$rootPath` dinamicamente
- Exemplo: `href="<?= $rootPath ?>/pages/cardapio.php"`

### 3. Imagens do Cardápio (JavaScript)
- ❌ **Antes:** Paths hardcoded `"../assets/images/..."`
- ✅ **Agora:** Detecção automática via `assetBasePath` no JavaScript
- Funciona tanto na página inicial quanto nas páginas internas

### 4. Formulários de Reserva
- ✅ Já usa Formspree (https://formspree.io/f/xjgkabka)
- Funciona independente do servidor

## Estrutura de Upload para Produção

### Opção 1: Upload Direto para Raiz do Domínio
Se o domínio `predileto.kesug.com` aponta diretamente para a raiz:

```
/public_html/ (ou /www/ ou /htdocs/)
├── .htaccess
├── index.php
└── public/
    ├── inicio.php
    ├── assets/
    │   ├── css/
    │   ├── images/
    │   └── js/
    ├── components/
    │   ├── header.php
    │   └── footer.php
    └── pages/
        ├── cardapio.php
        ├── contato.php
        ├── reserva.php
        ├── sobreNos.php
        ├── todos-os-pratos.php
        └── galeria-completa.php
```

### Opção 2: Subpasta (se necessário)
Se o site estiver em uma subpasta:

1. Ajuste o `.htaccess`:
```apache
RewriteBase /predileto/
```

2. Ajuste o `index.php`:
```php
$assetBase = $isProduction ? '/predileto/assets' : '/predileto/public/assets';
$rootPath  = $isProduction ? '/predileto' : '/predileto/public';
```

## Passo a Passo do Deploy

### 1. Prepare os Arquivos
```bash
# No seu computador local
cd d:\WAMP\www\predileto
```

### 2. Verifique Permissões Necessárias
Após upload, configure permissões via FTP/cPanel:
- Diretórios: 755
- Arquivos PHP: 644
- Arquivos `.htaccess`: 644

### 3. Configure o Domínio
No painel de hospedagem (cPanel/Plesk):
- Aponte o domínio para a pasta onde fez upload
- Certifique-se que o `index.php` está na raiz do domínio

### 4. Teste Pós-Deploy
Acesse estas URLs para verificar:

✅ **Homepage:** https://predileto.kesug.com/
- Deve carregar `index.php` → `public/inicio.php`
- Imagens devem aparecer

✅ **Cardápio:** https://predileto.kesug.com/pages/cardapio.php
- Imagens dos pratos devem carregar
- Links "Ver todos os pratos" devem funcionar

✅ **Reserva:** https://predileto.kesug.com/pages/reserva.php
- Formulário deve enviar via Formspree
- Redirecionamento após envio deve funcionar

✅ **Contato:** https://predileto.kesug.com/pages/contato.php
- Formulário de contato funcional

### 5. Verificação de Imagens
Teste especificamente se as imagens carregam:
- Logo no header
- Imagens da galeria
- Imagens dos pratos do cardápio
- Imagens do hero section

## Troubleshooting

### Problema: Imagens não aparecem
**Solução:**
1. Verifique se a pasta `/assets/images/` foi enviada completamente
2. Confirme permissões (755 para pastas, 644 para arquivos)
3. Teste URL direta: `https://predileto.kesug.com/assets/images/logo/LogoPredileto.svg`

### Problema: CSS não carrega
**Solução:**
1. Verifique se `/assets/css/` existe
2. Teste URL: `https://predileto.kesug.com/assets/css/header.css`
3. Limpe cache do navegador (Ctrl+Shift+R)

### Problema: "Page Not Found" nas páginas internas
**Solução:**
1. Verifique se `.htaccess` foi enviado (arquivos começando com ponto são ocultos)
2. Confirme que `mod_rewrite` está ativo no servidor Apache
3. Teste acesso direto: `https://predileto.kesug.com/public/pages/cardapio.php`

### Problema: Formulários não enviam
**Solução:**
1. Os formulários usam Formspree - não dependem do servidor
2. Verifique se o endpoint está correto: `https://formspree.io/f/xjgkabka`
3. Teste em modo anônimo/incógnito do navegador

### Problema: Links quebrados no menu
**Solução:**
1. Inspecione o código-fonte HTML (Ctrl+U)
2. Verifique se os links começam com `/pages/` (produção) ou `../pages/` (local)
3. Confirme que a detecção de ambiente está funcionando

## Verificação da Detecção de Ambiente

Para confirmar que o site detectou corretamente o ambiente, adicione temporariamente ao topo do `index.php`:

```php
<?php
$isProduction = !isset($_SERVER['SERVER_NAME']) || strpos($_SERVER['SERVER_NAME'], 'localhost') === false;
echo "Ambiente: " . ($isProduction ? "PRODUÇÃO" : "DESENVOLVIMENTO");
echo "<br>Server Name: " . $_SERVER['SERVER_NAME'];
// Remova após verificar
?>
```

## Configurações Opcionais

### Ativar HTTPS (Recomendado)
Descomente no `.htaccess`:
```apache
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

### Remover extensão .php das URLs
Descomente no `.htaccess`:
```apache
RewriteCond %{REQUEST_FILENAME}.php -f
RewriteRule ^(.*)$ $1.php [L]
```

## Contato para Suporte

Se encontrar problemas após seguir este guia:
1. Verifique os logs de erro do servidor (geralmente em cPanel → Error Log)
2. Teste cada funcionalidade individualmente
3. Compare o comportamento local vs produção

## Checklist Final ✅

Antes de considerar o deploy completo:

- [ ] Homepage carrega corretamente
- [ ] Todas as imagens aparecem
- [ ] Menu de navegação funciona
- [ ] Página de cardápio mostra os pratos com imagens
- [ ] Formulário de reserva envia com sucesso
- [ ] Formulário de contato funciona
- [ ] Links internos não dão erro 404
- [ ] CSS está aplicado corretamente
- [ ] Site é responsivo no mobile
- [ ] Menu hambúrguer funciona no mobile

---

**Última atualização:** 05/01/2026
**Versão das correções:** 2.0 (Sistema de detecção automática de ambiente)
