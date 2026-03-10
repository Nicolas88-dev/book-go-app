document.addEventListener("DOMContentLoaded", () => {
  const header = document.querySelector(".site-header");
  const burger = document.querySelector(".burger");
  const mobileMenu = document.getElementById("mobile-menu");

  if (header && burger && mobileMenu) {
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

    mobileMenu.addEventListener("click", (e) => {
      if (e.target.tagName === "A") {
        closeMenu();
      }
    });
  }

  const dateInput = document.getElementById("reservation_date");
  const timeSelect = document.getElementById("reservation_time");
  const serviceIdInput = document.querySelector("input[name='service_id']");

  if (dateInput && timeSelect && serviceIdInput) {
    dateInput.addEventListener("change", function () {
      const selectedDate = this.value;
      const serviceId = serviceIdInput.value;

      fetch(
        `api/get-booked-slots.php?date=${selectedDate}&service_id=${serviceId}`,
      )
        .then((response) => response.json())
        .then((bookedSlots) => {
          const options = timeSelect.querySelectorAll("option");

          options.forEach((option) => {
            if (!option.value) return;

            if (bookedSlots.includes(option.value + ":00")) {
              option.disabled = true;
              option.textContent = option.value + " (réservé)";

              if (option.selected) {
                timeSelect.value = "";
              }
            } else {
              option.disabled = false;
              option.textContent = option.value;
            }
          });
        })
        .catch((error) => {
          console.error(
            "Erreur lors du chargement des créneaux réservés :",
            error,
          );
        });
    });
  }
});
