// Script para a página de cardápio

document.addEventListener("DOMContentLoaded", () => {
  // Carregar pratos de carne (primeiros 3)
  const carneContainer = document.getElementById("carneContainer");
  const primeirosCarnes = pratos.carne.slice(0, 3);
  primeirosCarnes.forEach(prato => {
    carneContainer.innerHTML += criarCardPrato(prato);
  });

  // Carregar pratos de frango (primeiros 3)
  const frangoContainer = document.getElementById("frangoContainer");
  const primeirosFrangos = pratos.frango.slice(0, 3);
  primeirosFrangos.forEach(prato => {
    frangoContainer.innerHTML += criarCardPrato(prato);
  });

  // Carregar pratos de peixe (primeiros 3)
  const peixeContainer = document.getElementById("peixeContainer");
  const primeirosPeixes = pratos.peixe.slice(0, 3);
  primeirosPeixes.forEach(prato => {
    peixeContainer.innerHTML += criarCardPrato(prato);
  });

  // Adicionar eventos aos botões "Pedir Agora"
  document.querySelectorAll(".btn-order").forEach(btn => {
    btn.addEventListener("click", (e) => {
      alert("Prato adicionado ao pedido!");
      // Aqui você pode adicionar lógica de carrinho se desejar
    });
  });
});
