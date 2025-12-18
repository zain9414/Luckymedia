<?php
require_once 'auth.php';
require_once '../db.php';

if (!isset($_GET['id'])) {
    header("Location: orders.php");
    exit;
}

$id = (int)$_GET['id'];

/* ===== FETCH ORDER ===== */
$order = mysqli_query($conn, "SELECT * FROM orders WHERE id=$id");

if (mysqli_num_rows($order) == 0) {
    echo "Order not found";
    exit;
}

$order = mysqli_fetch_assoc($order);

/* ===== FETCH ITEMS ===== */
$items = mysqli_query($conn, "SELECT * FROM order_items WHERE order_id=$id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order #<?= $id; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex bg-gray-100">

<?php include 'sidebar.php'; ?>

<div class="flex-1 p-10">

<h2 class="text-3xl font-bold mb-6">
    📦 Order #<?= $order['id']; ?>
</h2>

<!-- CUSTOMER INFO -->
<div class="bg-white p-6 rounded shadow mb-8">
    <p><strong>Name:</strong> <?= htmlspecialchars($order['customer_name']); ?></p>
    <p><strong>Phone:</strong> <?= htmlspecialchars($order['phone']); ?></p>
    <p><strong>Address:</strong> <?= nl2br(htmlspecialchars($order['address'])); ?></p>
    <p class="mt-3 font-bold text-red-600">
        Total: Rs <?= $order['total_amount']; ?>
    </p>
</div>

<!-- ITEMS -->
<table class="w-full bg-white shadow rounded">
<tr class="bg-gray-200">
    <th class="p-3 text-left">Item</th>
    <th class="p-3">Price</th>
    <th class="p-3">Qty</th>
    <th class="p-3">Total</th>
</tr>

<?php while ($item = mysqli_fetch_assoc($items)) { ?>
<tr class="border-t">
    <td class="p-3"><?= htmlspecialchars($item['item_name']); ?></td>
    <td class="p-3 text-center">Rs <?= $item['price']; ?></td>
    <td class="p-3 text-center"><?= $item['quantity']; ?></td>
    <td class="p-3 text-center font-bold">
        Rs <?= $item['price'] * $item['quantity']; ?>
    </td>
</tr>
<?php } ?>

</table>

<a href="orders.php"
   class="inline-block mt-6 bg-gray-800 text-white px-6 py-2 rounded">
   ← Back to Orders
</a>

</div>
</body>
</html>
