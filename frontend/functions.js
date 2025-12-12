// Category nav function
const buttons = document.querySelectorAll('.cat-btn');
const categoryTitle = document.getElementById('current-category');
const foodCards = document.querySelectorAll('.food-card');

function filterCategory(category) {
    foodCards.forEach(card => {
        card.style.display = 'none';
        card.classList.remove('show');

        if (category === 'all' || card.classList.contains(category)) {
            card.style.display = 'block';
            setTimeout(() => card.classList.add('show'), 50);
        }
    });

    categoryTitle.textContent =
    category === 'all'
        ? 'All Menu'
        : category.replace('-', ' ').replace(/\b\w/g, c => c.toUpperCase());
}

buttons.forEach(btn => {
    btn.addEventListener('click', () => {
        buttons.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const category = btn.dataset.category;
        filterCategory(category);
    });
});

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