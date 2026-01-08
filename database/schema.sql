-- Tabela de Cardápio
CREATE TABLE IF NOT EXISTS cardapio (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    imagem VARCHAR(255) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    rating INT DEFAULT 5,
    descricao TEXT,
    ativo BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Índices para melhor performance
CREATE INDEX idx_tipo ON cardapio(tipo);
CREATE INDEX idx_ativo ON cardapio(ativo);

-- Dados iniciais (migrados do arquivo JavaScript)
INSERT INTO cardapio (id, nome, tipo, imagem, preco, rating, descricao) VALUES
-- Carnes
(1, 'Picanha', 'carne', '/predileto/public/assets/images/imgCardapio/picanha.jpg', 11.50, 5, 'Picanha suculenta e macia'),
(2, 'Bitoque de Vaca', 'carne', '/predileto/public/assets/images/imgCardapio/bitoqueCarne.jpeg', 9.50, 5, 'Bife de vaca suculento'),
(3, 'Bitoque de Frango', 'carne', '/predileto/public/assets/images/imgCardapio/bitoqueFrango.png', 9.50, 5, 'Peito de frango suculento'),
(4, 'Bife Vazia', 'carne', '/predileto/public/assets/images/imgCardapio/bifeVazia.png', 11.00, 5, 'Bife vazio suculento'),
(5, 'Maminha', 'carne', '/predileto/public/assets/images/imgCardapio/picanha.jpg', 9.50, 5, 'Maminha suculenta e macia'),
(6, 'Chapa Mista 2 Pessoas', 'carne', '/predileto/public/assets/images/imgCardapio/MassaDeCarne.jpg', 20.00, 5, 'Chapa com variedade de carnes para 2 pessoas'),
-- Massas
(7, 'Massa de Carne', 'massa', '/predileto/public/assets/images/imgCardapio/bitoqueFrango.png', 7.90, 5, 'Espaguete à bolonhesa tradicional'),
(8, 'Massa de Camarão', 'massa', '/predileto/public/assets/images/imgCardapio/bitoqueFrango.png', 8.00, 5, 'Espaguete com camarão ao molho de tomate');
