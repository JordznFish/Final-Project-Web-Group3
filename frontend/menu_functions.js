// menu.js — ONLY for menu.php
document.addEventListener("DOMContentLoaded", () => {
  const modal = document.getElementById("food-modal");
  if (!modal) return;

  const modalImg = document.getElementById("modal-img");
  const modalTitle = document.getElementById("modal-title");
  const modalDesc = document.getElementById("modal-desc");
  const qtyCount = document.getElementById("qty-count");

  const btnPlus = document.getElementById("qty-plus");
  const btnMinus = document.getElementById("qty-minus");
  const btnAdd = document.getElementById("add-to-cart-btn");
  const btnClose = modal.querySelector(".close-modal");

  let currentItem = {};
  let qty = 1;

  function openModal(item) {
    currentItem = item;
    qty = 1;

    modalImg.src = item.img;
    modalTitle.textContent = item.name;
    modalDesc.textContent = item.desc;
    qtyCount.textContent = qty;

    modal.classList.add("show");
  }

  // Food card click
  document.querySelectorAll(".food-card").forEach(card => {
    card.addEventListener("click", (e) => {
      if (e.target.closest("button")) return;


      openModal({
        id: card.dataset.id,
        name: card.dataset.name,
        price: Number(card.dataset.price),
        img: card.dataset.img,
        desc: card.dataset.desc
      });
    });
  });

  // Plus button inside card
  document.querySelectorAll(".add-btn").forEach(btn => {
    btn.addEventListener("click", (e) => {
      e.stopPropagation();
      const card = btn.closest(".food-card");
      if (!card) return;

      openModal({
        id: card.dataset.id,
        name: card.dataset.name,
        price: Number(card.dataset.price),
        img: card.dataset.img,
        desc: card.dataset.desc
      });
    });
  });

  btnPlus.onclick = () => {
    qty++;
    qtyCount.textContent = qty;
  };

  btnMinus.onclick = () => {
    if (qty > 1) qty--;
    qtyCount.textContent = qty;
  };

  btnClose.onclick = () => modal.classList.remove("show");

  btnAdd.onclick = () => {
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
      .then(() => modal.classList.remove("show"));
  };
});
