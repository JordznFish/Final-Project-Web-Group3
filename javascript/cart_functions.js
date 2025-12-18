//Global Vars
const DELIVERY_FEE = 2.5; 
const ACTIVE_COUPON_RATE = document.body.dataset.couponRate ? parseFloat(document.body.dataset.couponRate) : 0;

function updateCartSummary(cart) {
  let subtotal = 0;

  for (let id in cart) {
    subtotal += cart[id].price * cart[id].qty;
  }

  let discount = subtotal * ACTIVE_COUPON_RATE;
  let deliveryFee = subtotal > 0 ? DELIVERY_FEE : 0;
  let total = subtotal - discount + deliveryFee;

  document.getElementById("cart-subtotal").textContent = `NT$ ${subtotal.toFixed(2)}`;
  if (discount > 0) {
    document.getElementById("cart-discount").textContent = `- NT$ ${discount.toFixed(2)}`;
  }
  document.getElementById("cart-delivery").textContent = `NT$ ${deliveryFee.toFixed(2)}`;
  document.getElementById("cart-total").textContent = `NT$ ${total.toFixed(2)}`;
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

    // 🔹 UPDATE ITEM SUBTOTAL 
    const item = data.cart[id];
    const priceEl = document.querySelector(`.item-price[data-id="${id}"]`);

    if (priceEl) {
      const itemSubtotal = item.price * item.qty;
      priceEl.textContent = `NT$ ${itemSubtotal.toFixed(2)}`;
    }

    // update subtotal if you add a hook later
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

// APPLY COUPON
document.querySelector(".apply-btn")?.addEventListener("click", () => {
  const input = document.querySelector(".coupon-box input");
  const code = input.value.trim();

  if (!code) {
    alert("Please enter a coupon code");
    return;
  }

  fetch("../backend/cart_api.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: new URLSearchParams({
      action: "apply_coupon",
      code: code
    })
  })
    .then(res => res.json())
    .then(data => {
      if (data.status === "success") {
        location.reload(); // keep PHP + JS in sync
      } else {
        alert("Invalid coupon code");
      }
    });
});