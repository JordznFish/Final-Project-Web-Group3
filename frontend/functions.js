// show "All" on first load
window.addEventListener('DOMContentLoaded', () => {
    document.querySelector('.cat-btn[data-category="all"]').classList.add('active');
    filterCategory('all');
});

// Newsletter function
document.addEventListener("DOMContentLoaded", function() {
    const newsletterBtn = document.getElementById('newsletter-btn');
    const newsletterWindow = document.getElementById('newsletter');
    const closeBtn = document.querySelector('.modal-close');
    const subscribeBtn = document.getElementById('subscribe-btn');

    //  Show newsletter
    if (newsletterBtn) {
        newsletterBtn.addEventListener('click', () => {
            newsletterWindow.classList.add('show');
        });
    }

    //  Close newsletter by clicking 'x' button
    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            newsletterWindow.classList.remove('show');
        });
    }

    //  Close newsletter via subscribe button
    if (subscribeBtn) {
        subscribeBtn.addEventListener('click', () => {
            newsletterWindow.classList.remove('show');
        });
    }

    //  Close newsletter by clicking outside
    if (newsletterWindow) {
        window.addEventListener('click', (event) => {
            if (event.target === newsletterWindow) {
                newsletterWindow.classList.remove('show');
            }
        });
    }
});

// Navbar on small devices (smaller than 500px)
// Responsive Navbar Toggle
document.addEventListener("DOMContentLoaded", () => {
    const menuToggle = document.getElementById("menu-toggle");
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

  document.querySelectorAll(".add-btn").forEach(btn => {
    btn.addEventListener("click", () => {
      currentItem = {
        id: btn.dataset.id,
        name: btn.dataset.name,
        price: Number(btn.dataset.price),
        img: btn.dataset.img,
        desc: btn.dataset.desc
      };

      modalImg.src = currentItem.img;
      modalTitle.textContent = currentItem.name;
      modalDesc.textContent = currentItem.desc;

      qty = 1;
      qtyCount.textContent = qty;

      modal.classList.add("show");
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

