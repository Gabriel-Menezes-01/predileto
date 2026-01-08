// Script para a página de cardápio

document.addEventListener("DOMContentLoaded", () => {
  // Carregar pratos de carne (primeiros 3)
  const carneContainer = document.getElementById("carneContainer");
  const primeirosCarnes = pratos.carne.slice(0, 3);
  primeirosCarnes.forEach(prato => {
    carneContainer.innerHTML += criarCardPrato(prato);
  });

  // Carregar pratos de massa (primeiros 3)
  const massaContainer = document.getElementById("massaContainer");
  const primeirosMassas = pratos.massa.slice(0, 3);
  primeirosMassas.forEach(prato => {
    massaContainer.innerHTML += criarCardPrato(prato);
  });

  // Carregar pratos de peixe (primeiros 3)
  const peixeContainer = document.getElementById("peixeContainer");
  const primeirosPeixes = pratos.peixe.slice(0, 3);
  primeirosPeixes.forEach(prato => {
    peixeContainer.innerHTML += criarCardPrato(prato);
  });
});
