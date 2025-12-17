// show "All" on first load
window.addEventListener("DOMContentLoaded", () => {
  document
    .querySelector('.cat-btn[data-category="all"]')
    .classList.add("active");
  filterCategory("all");
});

// Newsletter function
document.addEventListener("DOMContentLoaded", function () {
  const newsletterBtn = document.getElementById("newsletter-btn");
  const newsletterWindow = document.getElementById("newsletter");
  const closeBtn = document.querySelector(".modal-close");
  const subscribeBtn = document.getElementById("subscribe-btn");

  //  Show newsletter
  if (newsletterBtn) {
    newsletterBtn.addEventListener("click", () => {
      newsletterWindow.classList.add("show");
    });
  }

  //  Close newsletter by clicking 'x' button
  if (closeBtn) {
    closeBtn.addEventListener("click", () => {
      newsletterWindow.classList.remove("show");
    });
  }

  //  Close newsletter via subscribe button
  if (subscribeBtn) {
    subscribeBtn.addEventListener("click", () => {
      newsletterWindow.classList.remove("show");
    });
  }

  //  Close newsletter by clicking outside
  if (newsletterWindow) {
    window.addEventListener("click", (event) => {
      if (event.target === newsletterWindow) {
        newsletterWindow.classList.remove("show");
      }
    });
  }
});

// Navbar on small devices (smaller than 500px)
// Responsive Navbar Toggle
document.addEventListener("DOMContentLoaded", () => {
  const menuToggle = document.getElementById("menu-btn");
  const navbar = document.getElementById("navbar");
  const overlay = document.querySelector(".sidebar-overlay");

  if (menuToggle && navbar && overlay) {
    menuToggle.addEventListener("click", () => {
      navbar.classList.toggle("open");
      overlay.classList.toggle("active");
    });

    overlay.addEventListener("click", () => {
      navbar.classList.remove("open");
      overlay.classList.remove("active");
    });
  }
});

// Popping up window menu
            const modal = document.getElementById("food-modal");
            const modalImg = document.getElementById("modal-img");
            const modalTitle = document.getElementById("modal-title");
            const modalDesc = document.getElementById("modal-desc");
            const qtyCount = document.getElementById("qty-count");

            const hasModal = modal && modalImg && modalTitle && modalDesc && qtyCount;

            let currentItem = {};
            let qty = 1;

if (hasModal) {
  function openFoodModal(item) {
    currentItem = item;

    modalImg.src = item.img;
    modalTitle.textContent = item.name;
    modalDesc.textContent = item.desc;

    qty = 1;
    qtyCount.textContent = qty;

    modal.classList.add("show");
  }

  // Whole food card clickable
  document.querySelectorAll(".food-card").forEach(card => {
    card.addEventListener("click", (e) => {

      // prevent button inside card from double triggering
      if (e.target.closest("button")) return;

      const item = {
        id: card.dataset.id,
        name: card.dataset.name,
        price: Number(card.dataset.price),
        img: card.dataset.img,
        desc: card.dataset.desc
      };

      openFoodModal(item);
    });
  });

  // Keep add button working too (optional but recommended)
  document.querySelectorAll(".add-btn").forEach(btn => {
    btn.addEventListener("click", (e) => {
      e.stopPropagation();

      const card = btn.closest(".food-card");
      if (!card) return;

      const item = {
        id: card.dataset.id,
        name: card.dataset.name,
        price: Number(card.dataset.price),
        img: card.dataset.img,
        desc: card.dataset.desc
      };

      openFoodModal(item);
    });
  });

  document.querySelector(".close-modal").onclick = () =>
    modal.classList.remove("show");

  document.getElementById("qty-plus").onclick = () => {
    qty++;
    qtyCount.textContent = qty;
  };

  document.getElementById("qty-minus").onclick = () => {
    if (qty > 1) {
      qty--;
      qtyCount.textContent = qty;
    }
  };

  document.getElementById("add-to-cart-btn").onclick = () => {
    fetch("../backend/cart_api.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: new URLSearchParams({
        action: "add",
        id: currentItem.id,
        name: currentItem.name,
        price: currentItem.price,
        qty: qty,
        image: currentItem.img
      })
    })
    .then(res => res.json())
    .then(data => {
      updateCartBadge(data.cart);
      modal.classList.remove("show");
    });
  };
}

function updateCartBadge(cart) {
    const badge = document.getElementById("cart-count");
    if (!badge) return;

    let total = 0;
    for (let id in cart) {
        total += cart[id].qty;
    }

    badge.textContent = total;
    badge.style.display = total > 0 ? "inline-block" : "none";
}

//ADD and MINUS QTY
document.addEventListener("click", function (e) {

  if (!e.target.classList.contains("increase") &&
      !e.target.classList.contains("decrease")) return;

  const control = e.target.closest(".quantity-control");
  const id = control.dataset.id;
  const input = control.querySelector("input");

  let qty = parseInt(input.value);

  if (e.target.classList.contains("increase")) qty++;
  if (e.target.classList.contains("decrease") && qty > 1) qty--;

  fetch("../backend/cart_api.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: new URLSearchParams({
      action: "update",
      id: id,
      qty: qty
    })
  })
  .then(res => res.json())
  .then(data => {
    input.value = qty;

    // Optional: update subtotal if you add a hook later
    updateCartSummary(data.cart);
  });
});

// Clear cart
document.addEventListener("click", function (e) {

  if (e.target.classList.contains("remove-btn")) {
    const id = e.target.dataset.id;

    fetch("../backend/cart_api.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: new URLSearchParams({
        action: "remove",
        id: id
      })
    })
    .then(() => location.reload());
  }

  if (e.target.classList.contains("clear-cart-btn")) {
    if (!confirm("Clear cart?")) return;

    fetch("../backend/cart_api.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: new URLSearchParams({ action: "clear" })
    })
    .then(() => location.reload());
  }
});



