# Migração para Banco de Dados MySQL - Cardápio

## Passo a Passo

### 1. Criar o Banco de Dados
Abra o **phpMyAdmin** (geralmente em `http://localhost/phpmyadmin`) e execute:

```sql
CREATE DATABASE predileto CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 2. Executar o Script de Schema
- Copie o conteúdo de `database/schema.sql`
- Cole no phpMyAdmin > Console SQL
- Ou execute via terminal MySQL:

```bash
mysql -u root predileto < schema.sql
```

### 3. Configurar Credenciais (Se Necessário)
Edite `database/db_config.php` se suas credenciais MySQL forem diferentes:

```php
$db_host = 'localhost';
$db_user = 'root';      // seu usuário MySQL
$db_pass = '';          // sua senha MySQL
$db_name = 'predileto'; // nome do banco
```

### 4. Migrar Dados
Acesse no navegador:
```
http://localhost/predileto/database/migrate.php
```

Você verá a confirmação: `✓ Migração concluída! X pratos inseridos no banco de dados.`

## Testar a API

### Buscar todos os pratos:
```
http://localhost/predileto/public/api/get-cardapio.php
```

### Buscar apenas carnes:
```
http://localhost/predileto/public/api/get-cardapio.php?tipo=carne
```

### Buscar apenas massas:
```
http://localhost/predileto/public/api/get-cardapio.php?tipo=massa
```

## Resposta da API (JSON)
```json
[
  {
    "id": 1,
    "nome": "Picanha",
    "tipo": "carne",
    "imagem": "/predileto/public/assets/images/imgCardapio/picanha.jpg",
    "preco": 11.50,
    "rating": 5,
    "descricao": "Picanha suculenta e macia"
  },
  ...
]
```

## Próximos Passos

1. Substituir o `cardapio-data.js` para usar a API PHP
2. Criar painel de administração para gerenciar pratos
3. Implementar CRUD completo (Criar, Ler, Atualizar, Deletar)

## Estrutura da Tabela

| Campo | Tipo | Descrição |
|-------|------|-----------|
| id | INT | ID único |
| nome | VARCHAR(100) | Nome do prato |
| tipo | VARCHAR(50) | Categoria (carne, massa, etc) |
| imagem | VARCHAR(255) | Caminho da imagem |
| preco | DECIMAL(10,2) | Preço |
| rating | INT | Avaliação (1-5) |
| descricao | TEXT | Descrição |
| ativo | BOOLEAN | Se está visível no cardápio |
| created_at | TIMESTAMP | Data de criação |
| updated_at | TIMESTAMP | Última atualização |
