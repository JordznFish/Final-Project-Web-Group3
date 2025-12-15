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

            let currentItem = {};
            let qty = 1;

// Open modal
    document.querySelectorAll(".add-btn").forEach(btn => {
        btn.addEventListener("click", () => {
        currentItem = {
        name: btn.dataset.name,
        price: Number(btn.dataset.price.replace(/[^\d.]/g, "")),
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

 // Close
        document.querySelector(".close-modal").onclick = () =>
        modal.classList.remove("show");

// Qty control
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

// Add to cart
        document.getElementById("add-to-cart-btn").onclick = () => {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];

        const existing = cart.find(i => i.name === currentItem.name);

        if (existing) {
            existing.qty += qty;
            if (existing.qty < 1) existing.qty = 1;
        } else {
            cart.push({ ...currentItem, qty });
        }

        localStorage.setItem("cart", JSON.stringify(cart));
        updateCartBadge();
        modal.classList.remove("show");
        };

        

        function updateCartBadge() {
        const badge = document.getElementById("cart-count");
        if (!badge) return;

        const cart = JSON.parse(localStorage.getItem("cart")) || [];
        const totalQty = cart.reduce((sum, item) => sum + (item.qty || 0), 0);

        badge.textContent = totalQty;

        // optional: hide when 0
        badge.style.display = totalQty > 0 ? "inline-block" : "none";
        }

        // refresh on load
        document.addEventListener("DOMContentLoaded", updateCartBadge);

