document.addEventListener("DOMContentLoaded", () => {
  const header = document.querySelector(".site-header");
  const burger = document.querySelector(".burger");
  const mobileMenu = document.getElementById("mobile-menu");
  const icon = burger.querySelector("i");

  const openMenu = () => {
    header.classList.add("is-open");
    mobileMenu.hidden = false;
    burger.setAttribute("aria-expanded", "true");
    icon.classList.remove("fa-bars");
    icon.classList.add("fa-xmark");
  };

  const closeMenu = () => {
    header.classList.remove("is-open");
    mobileMenu.hidden = true;
    burger.setAttribute("aria-expanded", "false");
    icon.classList.remove("fa-xmark");
    icon.classList.add("fa-bars");
  };

  burger.addEventListener("click", () => {
    header.classList.contains("is-open") ? closeMenu() : openMenu();
  });

  // Fermer si on clique sur un lien
  mobileMenu.addEventListener("click", (e) => {
    if (e.target.tagName === "A") {
      closeMenu();
    }
  });
});
