document.addEventListener("DOMContentLoaded", () => {
  const mobileNav = document.querySelector(".nav-mobile");
  const menuToggle = document.querySelector(".menu-toggle");
  const mobileLinks = document.querySelectorAll(".nav-mobile ul li a");
  const desktopLinks = document.querySelectorAll(".nav-desktop ul li a");

  const getLinkKey = (href) => {
    try {
      const clean = (href || "").split("#")[0].split("?")[0];
      const parts = clean.split("/").filter(Boolean);
      return parts[parts.length - 1] || clean;
    } catch {
      return href || "";
    }
  };

  const currentKeyFromLocation = () => {
    const path = window.location.pathname;
    const parts = path.split("/").filter(Boolean);
    return parts[parts.length - 1] || "index.php";
  };

  const applyActiveByKey = (key) => {
    const all = [...mobileLinks, ...desktopLinks];
    all.forEach((link) => link.classList.remove("active"));
    all.forEach((link) => {
      const lk = getLinkKey(link.getAttribute("href"));
      if (lk === key) link.classList.add("active");
    });
  };

  const handleLinkClick = (link) => {
    const key = getLinkKey(link.getAttribute("href"));
    localStorage.setItem("navActiveKey", key);
    applyActiveByKey(key);
    if (window.innerWidth <= 968 && mobileNav && menuToggle) {
      mobileNav.classList.remove("active");
      menuToggle.classList.remove("active");
    }
  };

  [...mobileLinks, ...desktopLinks].forEach((link) => {
    link.addEventListener("click", () => handleLinkClick(link));
  });

  // Toggle do menu mobile
  if (menuToggle) {
    menuToggle.addEventListener("click", () => {
      if (mobileNav) mobileNav.classList.toggle("active");
      menuToggle.classList.toggle("active");
    });
  }

  // Define ativo com base na página atual ou último clique
  const currentKey = currentKeyFromLocation();
  const storedKey = localStorage.getItem("navActiveKey");
  const hasCurrent = [...mobileLinks, ...desktopLinks]
    .some((l) => getLinkKey(l.getAttribute("href")) === currentKey);
  const candidateKey = hasCurrent ? currentKey : (storedKey || currentKey);
  applyActiveByKey(candidateKey);

  // Fecha o menu ao redimensionar para desktop
  window.addEventListener("resize", () => {
    if (window.innerWidth > 968) {
      if (mobileNav) mobileNav.classList.remove("active");
      menuToggle.classList.remove("active");
    }
  });
});

