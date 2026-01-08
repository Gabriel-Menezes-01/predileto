// Script para a página de todos os pratos

document.addEventListener("DOMContentLoaded", () => {
  const searchInput = document.getElementById("searchInput");
  const filterBtns = document.querySelectorAll(".filter-btn");
  const todosCardsContainer = document.getElementById("todosCardsContainer");

  let filtroAtivo = "todos";
  let textoBusca = "";

  // Função para renderizar cards
  function renderizarCards() {
    todosCardsContainer.innerHTML = "";

    // Combinar todos os pratos
    let pratosFiltrados = [];
    if (filtroAtivo === "todos") {
      pratosFiltrados = [...pratos.carne, ...pratos.massa, ...pratos.peixe];
    } else {
      pratosFiltrados = pratos[filtroAtivo] || [];
    }

    // Aplicar filtro de busca
    if (textoBusca.trim() !== "") {
      pratosFiltrados = pratosFiltrados.filter(prato =>
        prato.nome.toLowerCase().includes(textoBusca.toLowerCase())
      );
    }

    // Renderizar cards
    if (pratosFiltrados.length === 0) {
      todosCardsContainer.innerHTML = '<p style="grid-column: 1/-1; text-align: center; padding: 40px; color: #999;">Nenhum prato encontrado</p>';
    } else {
      pratosFiltrados.forEach(prato => {
        todosCardsContainer.innerHTML += criarCardPrato(prato);
      });
    }
  }

  // Event listeners dos filtros
  filterBtns.forEach(btn => {
    btn.addEventListener("click", () => {
      filterBtns.forEach(b => b.classList.remove("active"));
      btn.classList.add("active");
      filtroAtivo = btn.getAttribute("data-filter");
      renderizarCards();
    });
  });

  // Event listener do search
  searchInput.addEventListener("input", (e) => {
    textoBusca = e.target.value;
    renderizarCards();
  });

  // Renderizar cards iniciais
  renderizarCards();
});
