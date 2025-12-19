<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$action = $_POST['action'] ?? '';

/* ADD */
if ($action === 'add') {
    $id = (int)$_POST['id'];
    $name = $_POST['name'];
    $price = (float)$_POST['price'];
    $qty = (int)$_POST['qty'];
    $image = $_POST['image'] ?? '';
    $desc = $_POST['desc'] ?? '';

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['qty'] += $qty;
    } else {
        $_SESSION['cart'][$id] = [
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'qty' => $qty,
            'image' => $image,
            'desc' => $desc
        ];
    }

    echo json_encode(['status' => 'success', 'cart' => $_SESSION['cart']]);
    exit;
}

/* REMOVE ONE ITEM */
if ($action === 'remove') {
    $id = (int)$_POST['id'];

    if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
    }

    echo json_encode(['status' => 'success', 'cart' => $_SESSION['cart']]);
    exit;
}

/* CLEAR CART */
if ($action === 'clear') {
    $_SESSION['cart'] = [];
    unset($_SESSION['coupon']);

    echo json_encode(['status' => 'success', 'cart' => []]);
    exit;
}

// update qty 
if ($action === 'update') {
    $id = $_POST['id'];
    $qty = max(1, intval($_POST['qty']));

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['qty'] = $qty;
    }

    echo json_encode([
        'status' => 'success',
        'cart' => $_SESSION['cart']
    ]);
    exit;
}

/* APPLY PROMO COUPON */
if ($action === 'apply_coupon') {
    $code = strtoupper(trim($_POST['code'] ?? ''));

    $COUPONS = [
        'KIDS11' => 0.11
    ];

    if (isset($COUPONS[$code])) {
        $_SESSION['coupon'] = [
            'code' => $code,
            'rate' => $COUPONS[$code]
        ];

        echo json_encode([
            'status' => 'success'
        ]);
    } 
    else {
        unset($_SESSION['coupon']);

        echo json_encode([
            'status' => 'invalid'
        ]);
    }
    exit;
}


/* FALLBACK */
echo json_encode(['status' => 'invalid_action']);
