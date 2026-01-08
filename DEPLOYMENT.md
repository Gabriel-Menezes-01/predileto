# Guia de Deployment - Predileto

## Problema Identificado

O site estava com bugs em produção porque:
1. Os caminhos de assets (`/assets` vs `/public/assets`) estavam incorretos
2. A detecção de produção vs desenvolvimento tinha lógica inconsistente
3. Caminhos relativos (`../assets`) não funcionavam em produção

## Solução Implementada

Criamos um arquivo centralizado de configuração (`config.php`) que:
- Detecta automaticamente se é desenvolvimento ou produção
- Define os caminhos corretos de forma consistente
- É reutilizado em todos os arquivos PHP

## Configuração para Produção

### Se o domínio aponta para a RAIZ (www/):

O arquivo `config.php` está correto:

```php
$assetBase = '/public/assets';  // Assets estão em /public/assets
$rootPath = '/public';           // Páginas raiz estão em /public
```

### Se o domínio aponta para a pasta PUBLIC:

Você precisa editar `config.php` e trocar:

```php
// Produção:
$assetBase = '/assets';          // Assets estão em /assets (na raiz do site)
$rootPath = '';                   // Páginas estão na raiz
```

## Testando em Produção

1. Acesse `https://prediletonegri.com/`
   - As imagens devem aparecer
   - Links devem funcionar

2. Acesse `https://prediletonegri.com/public/pages/reserva.php`
   - O formulário de reserva deve carregar
   - Deve ser possível fazer reservas

3. Verifique o console do navegador (F12) para erros 404

## Próximos Passos

Se ainda houver erros:
1. Abra o DevTools do navegador (F12)
2. Vá para a aba "Network" 
3. Recarregue a página
4. Procure por requisições com status 404 (vermelho)
5. Copie a URL que está dando erro
6. Envie para que possamos ajustar o `config.php`

## Estrutura Esperada em Produção

```
prediletonegri.com/
├── public/
│   ├── assets/
│   │   ├── css/
│   │   ├── js/
│   │   └── images/
│   ├── components/
│   ├── pages/
│   └── inicio.php
├── config.php
└── index.php
```
