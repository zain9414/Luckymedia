<?php
session_start();
require_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: cart.php");
    exit;
}

if (empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit;
}

$name    = mysqli_real_escape_string($conn, $_POST['name']);
$phone   = mysqli_real_escape_string($conn, $_POST['phone']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$total   = (int) $_POST['total_amount'];

/* ===== INSERT ORDER ===== */
mysqli_query($conn, "
    INSERT INTO orders (customer_name, phone, address, total_amount)
    VALUES ('$name', '$phone', '$address', $total)
");

$order_id = mysqli_insert_id($conn);

/* ===== INSERT ORDER ITEMS ===== */
foreach ($_SESSION['cart'] as $item) {

    $menu_id = $item['id'];
    $name    = mysqli_real_escape_string($conn, $item['name']);
    $price   = $item['price'];
    $qty     = $item['qty'];

    mysqli_query($conn, "
        INSERT INTO order_items (order_id, menu_id, item_name, price, quantity)
        VALUES ($order_id, $menu_id, '$name', $price, $qty)
    ");
}

/* ===== CLEAR CART ===== */
unset($_SESSION['cart']);

/* ===== SUCCESS ===== */
header("Location: order_success.php");
exit;
