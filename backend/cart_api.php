<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$action = $_POST['action'] ?? '';

/* ===== ADD ===== */
if ($action === 'add') {
    $id = (int)$_POST['id'];
    $name = $_POST['name'];
    $price = (float)$_POST['price'];
    $qty = (int)$_POST['qty'];
    $image = $_POST['image'] ?? '';

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['qty'] += $qty;
    } else {
        $_SESSION['cart'][$id] = [
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'qty' => $qty,
            'image' => $image
        ];
    }

    echo json_encode(['status' => 'success', 'cart' => $_SESSION['cart']]);
    exit;
}

/* ===== REMOVE ONE ITEM ===== */
if ($action === 'remove') {
    $id = (int)$_POST['id'];

    if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
    }

    echo json_encode(['status' => 'success', 'cart' => $_SESSION['cart']]);
    exit;
}

/* ===== CLEAR CART ===== */
if ($action === 'clear') {
    $_SESSION['cart'] = [];

    echo json_encode(['status' => 'success', 'cart' => []]);
    exit;
}

/* ===== FALLBACK ===== */
echo json_encode(['status' => 'invalid_action']);
