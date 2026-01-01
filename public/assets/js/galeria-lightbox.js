document.addEventListener("DOMContentLoaded", () => {
  const gallery = document.querySelector(".lightbox-gallery");
  if (!gallery) return;

  const overlay = document.createElement("div");
  overlay.className = "lightbox-overlay";
  overlay.innerHTML = `
    <div class="lightbox-content">
      <button class="lightbox-close" aria-label="Fechar">×</button>
      <img class="lightbox-image" src="" alt="Imagem ampliada" />
    </div>
  `;
  document.body.appendChild(overlay);

  const lightboxImg = overlay.querySelector(".lightbox-image");
  const btnClose = overlay.querySelector(".lightbox-close");

  const openLightbox = (src, alt) => {
    lightboxImg.src = src;
    lightboxImg.alt = alt || "Imagem ampliada";
    overlay.classList.add("open");
    document.body.style.overflow = "hidden";
  };

  const closeLightbox = () => {
    overlay.classList.remove("open");
    document.body.style.overflow = "";
    // Limpa src para evitar downloads desnecessários depois
    setTimeout(() => (lightboxImg.src = ""), 200);
  };

  gallery.addEventListener("click", (e) => {
    const target = e.target.closest("img");
    if (!target) return;
    const src = target.dataset.full || target.src;
    openLightbox(src, target.alt);
  });

  btnClose.addEventListener("click", closeLightbox);
  overlay.addEventListener("click", (e) => {
    if (e.target === overlay) closeLightbox();
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && overlay.classList.contains("open")) {
      closeLightbox();
    }
  });
});
