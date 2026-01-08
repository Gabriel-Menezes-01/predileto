// Detecta o caminho correto para assets baseado na URL da página
// Se a variável foi definida no HTML (do PHP), usa ela. Caso contrário, detecta automaticamente.
let assetBasePath;

if (typeof window.ASSET_BASE_PATH !== 'undefined') {
    // Usa a variável global definida no HTML pelo PHP
    assetBasePath = window.ASSET_BASE_PATH;
} else {
    // Fallback: detecta baseado na URL
    const isLocalhost = window.location.hostname.includes('localhost') || window.location.hostname.includes('127.0.0.1');
    
    if (isLocalhost) {
        // Em localhost
        assetBasePath = window.location.pathname.includes('/pages/') ? '../assets' : './assets';
    } else {
        // Em produção: detecta se está em /public/pages/ ou /pages/
        if (window.location.pathname.includes('/public/pages/')) {
            assetBasePath = '../assets';
        } else if (window.location.pathname.includes('/pages/')) {
            assetBasePath = '../assets';
        } else {
            // Na raiz (/inicio.php ou /index.php)
            assetBasePath = './assets';
        }
    }
}

// Dados dos pratos por categoria
const pratos = {
  carne: [
    {
      id: 1,
      nome: "Picanha",
      preco: 11.50,
      rating: 5,
      categoria: "carne",
      imagem: `${assetBasePath}/images/imgCardapio/picanha.jpg`,
      descricao: "Picanha suculenta e macia"
    },
    {
      id: 2,
      nome: "Bitoque de Vaca",
      preco: 9.50,
      rating: 5,
      categoria: "carne",
      imagem: `${assetBasePath}/images/imgCardapio/bitoqueCarne.jpeg`,
      descricao: "Bife de vaca suculento"
    },
    {
      id: 3,
      nome: "Bitoque de Frango",
      preco: 9.50,
      rating: 5,
      categoria: "carne",
      imagem: `${assetBasePath}/images/imgCardapio/bitoqueFrango.png`,
      descricao: "Peito de frango suculento"
    },
    {
      id: 4,
      nome: "Bife Vazia",
      preco: 11.00,
      rating: 5,
      categoria: "carne",
      imagem: `${assetBasePath}/images/imgCardapio/bifeVazia.png`,
      descricao: "Bife vazio suculento"
    },
    {
      id: 5,
      nome: "Maminha",
      preco: 9.50,
      rating: 5,
      categoria: "carne",
      imagem: `${assetBasePath}/images/imgCardapio/picanha.jpg`,
      descricao: "Maminha suculenta e macia"
    },
    {
      id: 6,
      nome: "Chapa Mista 2 Pessoas",
      preco: 20.00,
      rating: 5,
      categoria: "carne",
      imagem: `${assetBasePath}/images/imgCardapio/MassaDeCarne.jpg`,
      descricao: "Chapa com variedade de carnes para 2 pessoas"
    }
  ],
  massa: [
    {
      id: 7,
      nome: "Massa de Carne",
      preco: 7.90,
      rating: 5,
      categoria: "massa",
      imagem: `${assetBasePath}/images/imgCardapio/bitoqueFrango.png`,
      descricao: "Espaguete à bolonhesa tradicional"
    },
    {
      id: 8,
      nome: "Massa de Camarão",
      preco: 8.00,
      rating: 5,
      categoria: "massa",
      imagem: `${assetBasePath}/images/imgCardapio/picanha.jpg`,
      descricao: "Fettuccine com molho de camarão"
    },
    {
      id: 9,
      nome: "Massa de Frango",
      preco: 8.50,
      rating: 5,
      categoria: "massa",
      imagem: `${assetBasePath}/images/imgCardapio/MassaDeCarne.jpg`,
      descricao: "Penne ao molho branco com frango"
    }],
      peixe: [
    {
      id: 10,
      nome: "Salmão Grelhado",
      preco: 12.00,
      rating: 5,
      categoria: "peixe",
      imagem: `${assetBasePath}/images/imgCardapio/salmao.jpg`,
      descricao: "Salmão fresco grelhado com ervas"
    },
    {
      id: 11,
      nome: "Dourada",
      preco: 11.00,
      rating: 5,
      categoria: "peixe",
      imagem: `${assetBasePath}/images/imgCardapio/salmao.jpg`,
      descricao: "Dourada grelhada com limão"
    },
    {
      id: 12,
      nome: "Robalo",
      preco: 11.00,
      rating: 5,
      categoria: "peixe",
      imagem: `${assetBasePath}/images/imgCardapio/salmao.jpg`,
      descricao: "Robalo fresco ao sal"
    },
    {
      id: 13,
      nome: "Filetes de Peixe",
      preco: 10.00,
      rating: 5,
      categoria: "peixe",
      imagem: `${assetBasePath}/images/imgCardapio/salmao.jpg`,
      descricao: "Filetes de peixe empanados e fritos"
    },
    {
      id: 14,
      nome: "Bacalhau à Brás",
      preco: 12.00,
      rating: 5,
      categoria: "peixe",
      imagem: `${assetBasePath}/images/imgCardapio/MassaDeCamarao.jpg`,
      descricao: "Bacalhau desfiado com batata palha e ovos"
    }
  ]
};

// Função para gerar estrelas
function gerarEstrelas(rating) {
  let html = '';
  for (let i = 0; i < rating; i++) {
    html += '<i class="bi bi-star-fill"></i>';
  }
  return html;
}

// Função para formatar preço
function formatarPreco(preco) {
  return new Intl.NumberFormat('pt-PT', {
    style: 'currency',
    currency: 'EUR'
  }).format(preco);
}

// Função para criar um card de prato
function criarCardPrato(prato) {
  return `
    <div class="card-prato">
      <div class="imagem-prato" data-nome="${prato.nome}">
        <img src="${prato.imagem}" alt="${prato.nome}">
      </div>
      <div class="info-prato">
        <h3>${prato.nome}</h3>
        <p class="descricao">${prato.descricao}</p>
        <div class="preco-rating">
          <span class="preco">${formatarPreco(prato.preco)}</span>
        </div>
        <div class="rating-btn">
          <div class="rating">
            ${gerarEstrelas(prato.rating)}
          </div>
        </div>
      </div>
    </div>
  `;
}
