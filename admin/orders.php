<?php
require_once 'auth.php';
require_once '../db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Orders</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex bg-gray-100">

<?php include 'sidebar.php'; ?>

<div class="flex-1 p-10">

<h2 class="text-3xl font-bold mb-6">📦 Orders</h2>

<table class="w-full bg-white shadow rounded">
<tr class="bg-gray-200">
    <th class="p-3">Order ID</th>
    <th class="p-3">Customer</th>
    <th class="p-3">Phone</th>
    <th class="p-3">Total</th>
    <th class="p-3">Date</th>
    <th class="p-3">Action</th>
</tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM orders ORDER BY id DESC");

if (mysqli_num_rows($result) == 0) {
    echo "<tr><td colspan='6' class='p-4 text-center'>No orders found</td></tr>";
}

while ($row = mysqli_fetch_assoc($result)) {
?>
<tr class="border-t hover:bg-gray-50">
    <td class="p-3 font-semibold">#<?= $row['id']; ?></td>
    <td class="p-3"><?= htmlspecialchars($row['customer_name']); ?></td>
    <td class="p-3"><?= htmlspecialchars($row['phone']); ?></td>
    <td class="p-3 font-bold text-red-600">Rs <?= $row['total_amount']; ?></td>
    <td class="p-3"><?= $row['order_date']; ?></td>
    <td class="p-3">
        <a href="order_detail.php?id=<?= $row['id']; ?>"
           class="text-blue-600 hover:underline">
           View
        </a>
    </td>
</tr>
<?php } ?>

</table>

</div>
</body>
</html>

