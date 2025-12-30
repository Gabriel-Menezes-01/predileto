// Dados dos pratos por categoria
const pratos = {
  carne: [
    {
      id: 1,
      nome: "Picanha Grelhada",
      preco: 45.00,
      rating: 5,
      categoria: "carne",
      imagem: "../../predileto/images/dishes/carne1.jpg",
      descricao: "Suculenta picanha grelhada na brasa"
    },
    {
      id: 2,
      nome: "Costela Barbecue",
      preco: 48.00,
      rating: 5,
      categoria: "carne",
      imagem: "../../predileto/images/dishes/carne2.jpg",
      descricao: "Costela macia ao molho barbecue"
    },
    {
      id: 3,
      nome: "Espetim de Carne",
      preco: 38.00,
      rating: 5,
      categoria: "carne",
      imagem: "../../predileto/images/dishes/carne3.jpg",
      descricao: "Espetim grelhado com tempero especial"
    },
    {
      id: 4,
      nome: "Bife Ancho",
      preco: 52.00,
      rating: 5,
      categoria: "carne",
      imagem: "../../predileto/images/dishes/carne4.jpg",
      descricao: "Bife ancho maturado e grelhado"
    },
    {
      id: 5,
      nome: "Alcatra Grelhada",
      preco: 42.00,
      rating: 5,
      categoria: "carne",
      imagem: "../../predileto/images/dishes/carne5.jpg",
      descricao: "Alcatra suculenta grelhada"
    },
    {
      id: 6,
      nome: "Carne Seca na Brasa",
      preco: 35.00,
      rating: 5,
      categoria: "carne",
      imagem: "../../predileto/images/dishes/carne6.jpg",
      descricao: "Carne seca grelhada com manteiga de alho"
    }
  ],
  frango: [
    {
      id: 7,
      nome: "Frango Grelhado",
      preco: 28.00,
      rating: 5,
      categoria: "frango",
      imagem: "../../predileto/images/dishes/frango1.jpg",
      descricao: "Frango grelhado macio e temperado"
    },
    {
      id: 8,
      nome: "Asas de Frango Barbecue",
      preco: 25.00,
      rating: 5,
      categoria: "frango",
      imagem: "../../predileto/images/dishes/frango2.jpg",
      descricao: "Asas crocantes ao molho barbecue"
    },
    {
      id: 9,
      nome: "Peito de Frango Recheado",
      preco: 32.00,
      rating: 5,
      categoria: "frango",
      imagem: "../../predileto/images/dishes/frango3.jpg",
      descricao: "Peito recheado com queijo e bacon"
    },
    {
      id: 10,
      nome: "Frango com Limão Siciliano",
      preco: 30.00,
      rating: 5,
      categoria: "frango",
      imagem: "../../predileto/images/dishes/frango4.jpg",
      descricao: "Frango grelhado com molho de limão"
    },
    {
      id: 11,
      nome: "Coxa e Sobrecoxa Grelhada",
      preco: 22.00,
      rating: 5,
      categoria: "frango",
      imagem: "../../predileto/images/dishes/frango5.jpg",
      descricao: "Coxa e sobrecoxa suculentas"
    },
    {
      id: 12,
      nome: "Frango à Parmegiana",
      preco: 35.00,
      rating: 5,
      categoria: "frango",
      imagem: "../../predileto/images/dishes/frango6.jpg",
      descricao: "Frango à milanesa com queijo derretido"
    }
  ],
  peixe: [
    {
      id: 13,
      nome: "Salmão Grelhado",
      preco: 55.00,
      rating: 5,
      categoria: "peixe",
      imagem: "../../predileto/images/dishes/peixe1.jpg",
      descricao: "Salmão fresco grelhado na brasa"
    },
    {
      id: 14,
      nome: "Filé de Tilápia",
      preco: 32.00,
      rating: 5,
      categoria: "peixe",
      imagem: "../../predileto/images/dishes/peixe2.jpg",
      descricao: "Filé de tilápia crocante"
    },
    {
      id: 15,
      nome: "Polvo à Lagareiro",
      preco: 48.00,
      rating: 5,
      categoria: "peixe",
      imagem: "../../predileto/images/dishes/peixe3.jpg",
      descricao: "Polvo macio com batata-doce"
    },
    {
      id: 16,
      nome: "Moqueca de Peixe",
      preco: 38.00,
      rating: 5,
      categoria: "peixe",
      imagem: "../../predileto/images/dishes/peixe4.jpg",
      descricao: "Moqueca baiana tradicional"
    },
    {
      id: 17,
      nome: "Robalo Grelhado",
      preco: 52.00,
      rating: 5,
      categoria: "peixe",
      imagem: "../../predileto/images/dishes/peixe5.jpg",
      descricao: "Robalo fresco ao sal"
    },
    {
      id: 18,
      nome: "Camarão na Manteiga",
      preco: 45.00,
      rating: 5,
      categoria: "peixe",
      imagem: "../../predileto/images/dishes/peixe6.jpg",
      descricao: "Camarão fresco na manteiga de alho"
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
  return new Intl.NumberFormat('pt-BR', {
    style: 'currency',
    currency: 'BRL'
  }).format(preco);
}

// Função para criar um card de prato
function criarCardPrato(prato) {
  return `
    <div class="card-prato">
      <div class="imagem-prato">
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
          <button class="btn-order">Pedir Agora</button>
        </div>
      </div>
    </div>
  `;
}
