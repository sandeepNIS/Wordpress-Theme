(function () {
  const header = document.getElementById("nmHeader");

  // Sticky header shrink on scroll
  function handleScroll() {
    if (!header) return;

    if (window.scrollY > 20) {
      header.classList.add("is-scrolled");
    } else {
      header.classList.remove("is-scrolled");
    }
  }

  window.addEventListener("scroll", handleScroll);
  handleScroll();

  // Mobile Drawer
  const toggleBtn = document.getElementById("nmMobileToggle");
  const drawer = document.getElementById("nmMobileDrawer");

  if (toggleBtn && drawer) {
    const closeEls = drawer.querySelectorAll("[data-nm-close]");
    const panel = drawer.querySelector(".nm-drawer-panel");

    function openDrawer() {
      drawer.classList.add("is-open");
      drawer.setAttribute("aria-hidden", "false");
      toggleBtn.setAttribute("aria-expanded", "true");
      document.documentElement.style.overflow = "hidden";
    }

    function closeDrawer() {
      drawer.classList.remove("is-open");
      drawer.setAttribute("aria-hidden", "true");
      toggleBtn.setAttribute("aria-expanded", "false");
      document.documentElement.style.overflow = "";
    }

    toggleBtn.addEventListener("click", openDrawer);
    closeEls.forEach((el) => el.addEventListener("click", closeDrawer));

    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && drawer.classList.contains("is-open"))
        closeDrawer();
    });

    panel && panel.addEventListener("click", (e) => e.stopPropagation());

    // Mobile submenu accordion
    const mobileMenu = drawer.querySelector(".nm-menu-mobile");
    if (mobileMenu) {
      const itemsWithChildren = mobileMenu.querySelectorAll(
        "li.menu-item-has-children",
      );

      itemsWithChildren.forEach((li) => {
        const link = li.querySelector(":scope > a");
        if (!link) return;

        const btn = document.createElement("button");
        btn.type = "button";
        btn.className = "nm-subtoggle";
        btn.setAttribute("aria-label", "Toggle submenu");
        btn.innerHTML = '<i class="fa-solid fa-chevron-down"></i>';

        link.appendChild(btn);

        btn.addEventListener("click", (e) => {
          e.preventDefault();
          e.stopPropagation();

          // Close other open submenus (accordion style)
          const siblings = li.parentElement.querySelectorAll(
            ":scope > li.menu-item-has-children",
          );
          siblings.forEach((sib) => {
            if (sib !== li) sib.classList.remove("is-open");
          });

          li.classList.toggle("is-open");
        });
      });
    }
  }

  // Mega menu detection on Desktop
  const desktopMenu = document.querySelector(".nm-menu");
  if (desktopMenu) {
    const topItems = desktopMenu.querySelectorAll(
      ":scope > li.menu-item-has-children",
    );

    topItems.forEach((li) => {
      const submenu = li.querySelector(":scope > ul");
      if (!submenu) return;

      const childCount = submenu.querySelectorAll(":scope > li").length;

      // If many submenu items -> mega menu
      if (childCount >= 7) {
        li.classList.add("nm-mega");
      }
    });
  }
})();

// Scroll to top button show/hide + smooth scroll
const scrollTopBtn = document.getElementById("nmScrollTop");

if (scrollTopBtn) {
  function toggleScrollTopBtn() {
    if (window.scrollY > 200) {
      scrollTopBtn.classList.add("is-visible");
    } else {
      scrollTopBtn.classList.remove("is-visible");
    }
  }

  window.addEventListener("scroll", toggleScrollTopBtn);
  toggleScrollTopBtn();

  scrollTopBtn.addEventListener("click", function (e) {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
}
