function updateCartSummary(cart) {
  let subtotal = 0;

  for (let id in cart) {
    subtotal += cart[id].price * cart[id].qty;
  }

  const el = document.getElementById("cart-subtotal");
  if (el) {
    el.textContent = `NT$ ${subtotal.toFixed(2)}`;
  }
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
