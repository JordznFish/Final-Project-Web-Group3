<?php
session_start();
$cart = $_SESSION['cart'] ?? [];
$subtotal = 0;

$COUPONS = [
  'KIDS1111' => 0.11
];


$discount = 0;
$couponCode = null;

foreach ($cart as $id => $item) {
  $subtotal += $item['price'] * $item['qty'];
}

$DELIVERY_FEE = 2.5;
$deliveryFee = $subtotal > 0 ? $DELIVERY_FEE : 0;

if (isset($_SESSION['coupon'])) {
  $couponCode = $_SESSION['coupon']['code'];
  $discountRate = $_SESSION['coupon']['rate'];
  $discount = $subtotal * $discountRate;
}

$total = $subtotal - $discount + $deliveryFee;
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Cart</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fascinate&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Quintessential&family=Schoolbell&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/global.css" />
    <link rel="stylesheet" href="../css/cart.css" />
  </head>

  <body data-coupon-rate="<?= isset($_SESSION['coupon']) ? $_SESSION['coupon']['rate'] : 0 ?>">
    <div class="background-wrapper">
      <div class="align">
        <header class="cart-header">
          <a href="index.php" class="back-btn">← Back to Menu</a>
          <h1>🛒 My Cart</h1>
        </header>

        <div id="rope"></div>

        <div id="Sub-title">
          <h2>Your Items</h2>
        </div>

        <main class="cart-page-content">
          <div class="cart-layout">
            <!-- Cart Items -->
            <section class="cart-items-section">
              <div class="cart-items-box">
                <?php if (empty($cart)): ?>
                  <p>Your cart is empty</p>
                <?php else: ?>
                  <?php foreach ($cart as $id => $item): ?>
                    <div class="cart-item">

                      <img src="../img/<?= htmlspecialchars($item['image']) ?>" 
                          alt="<?= htmlspecialchars($item['name']) ?>" />

                      <div class="item-info">
                        <h3><?= htmlspecialchars($item['name']) ?></h3>

                        <p><?= htmlspecialchars($item['desc'] ?? '') ?></p>

                        <div class="quantity-control" data-id="<?= $id ?>">
                          <button class="decrease">-</button>
                          <input type="number" value="<?= $item['qty'] ?>" min="1" readonly />
                          <button class="increase">+</button>
                        </div>

                        <div class="item-bottom">
                          <span class="item-price" data-id="<?= $id ?>">
                            NT$ <?= number_format($item['price'] * $item['qty'], 2) ?>
                          </span>
                          <button class="remove-btn" data-id="<?= $id ?>">Remove</button>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
            </section>

            <!-- Coupon + Summary -->
            <aside class="cart-sidebar">
              <div class="coupon-box">
                <h3>Coupons</h3>
                <input type="text" placeholder="Enter coupon code" />
                <button class="apply-btn">Apply</button>
              </div>

              <div class="cart-summary">
                <h3>Your Order</h3>
                <div class="summary-item">
                  <span>Subtotal</span>
                  <span id="cart-subtotal">NT$ <?= number_format($subtotal, 2) ?></span>
                </div>

                <?php if ($subtotal > 0): ?>
                  <div class="summary-item">
                    <span>Delivery Fee</span>
                    <span id="cart-delivery">NT$ <?= number_format($deliveryFee, 2) ?></span>
                  </div>
                <?php endif; ?>

                <?php if ($discount > 0): ?>
                  <div class="summary-item" id="coupon-row">
                    <span>
                      Coupon (<?= htmlspecialchars($couponCode) ?>)
                    </span>
                    <span id="cart-discount">
                      - NT$ <?= number_format($discount, 2) ?>
                    </span>
                  </div>
                <?php endif; ?>

                <div class="summary-item total">
                  <strong>Total Payable</strong>
                  <strong id="cart-total">NT$ <?= number_format($total, 2) ?></strong>
                </div>

                <button class="checkout-btn">Proceed to Payment</button>
                <button class="clear-cart-btn">Clear Cart</button>
              </div>
            </aside>
          </div>
        </main>
      </div>

      <footer id="site-footer"style="background-image: url('../img/background/footerzz.png');
              background-size: 100% 100%;
              background-position: center;
              background-repeat: no-repeat;
              text-align: center;
              position: relative;
              padding: 60px 20px;">

                    <h2>Thank you for visiting!</h2>
                    <p>Follow us on social media:</p>
        
                    <div class="social-links">
                    <a href="https://www.facebook.com" target="_blank">
                        <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook" class="social-icon">
                    </a>
                    <a href="https://www.instagram.com" target="_blank">
                        <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" alt="Instagram" class="social-icon">
                    </a>
                    <a href="https://www.twitter.com" target="_blank">
                        <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter" class="social-icon">
                    </a>
                    </div>

                    <p class="copyright">© 2025 CrossingEats. All rights reserved.</p>
                </footer>
    </div>

    <!-- -->
    <script src="../javascript/cart_functions.js"></script>
  </body>
</html>
