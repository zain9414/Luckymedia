<?php
session_start();
include './header.php';

$cart = $_SESSION['cart'] ?? [];
?>

<div class="max-w-5xl mx-auto mt-24 px-6">

<h2 class="text-3xl font-bold mb-8 text-center">🛒 Your Cart</h2>

<?php if (empty($cart)) { ?>

    <p class="text-center text-gray-500">Your cart is empty</p>

<?php } else { ?>

<!-- ================= CART TABLE ================= -->
<table class="w-full bg-white shadow rounded mb-10">
<tr class="bg-gray-200">
    <th class="p-3 text-left">Item</th>
    <th class="p-3">Price</th>
    <th class="p-3">Qty</th>
    <th class="p-3">Total</th>
</tr>

<?php
$grandTotal = 0;
foreach ($cart as $item) {
    $total = $item['price'] * $item['qty'];
    $grandTotal += $total;
?>
<tr class="border-t">
    <td class="p-3 flex items-center gap-4">
        <img src="../assets/uploads/<?= htmlspecialchars($item['image']); ?>"
             class="h-16 w-16 object-cover rounded">
        <?= htmlspecialchars($item['name']); ?>
    </td>

    <td class="p-3 text-center">Rs <?= $item['price']; ?></td>
    <td class="p-3 text-center"><?= $item['qty']; ?></td>
    <td class="p-3 text-center font-bold">Rs <?= $total; ?></td>
</tr>
<?php } ?>

<tr class="bg-gray-100 font-bold">
    <td colspan="3" class="p-3 text-right">Grand Total</td>
    <td class="p-3 text-center text-red-600">
        Rs <?= $grandTotal; ?>
    </td>
</tr>
</table>

<!-- ================= USER DETAILS FORM ================= -->
<div class="bg-white p-6 rounded shadow">

<h3 class="text-2xl font-bold mb-6 text-center">📋 Customer Details</h3>

<form method="POST" action="checkout.php" class="space-y-4">

    <input type="hidden" name="total_amount" value="<?= $grandTotal; ?>">

    <div>
        <label class="font-semibold">Full Name</label>
        <input type="text" name="name" required
               class="w-full border p-3 rounded mt-1">
    </div>

    <div>
        <label class="font-semibold">Phone Number</label>
        <input type="text" name="phone" required
               class="w-full border p-3 rounded mt-1">
    </div>

    <div>
        <label class="font-semibold">Delivery Address</label>
        <textarea name="address" rows="3" required
                  class="w-full border p-3 rounded mt-1"></textarea>
    </div>

    <button type="submit"
        class="w-full bg-red-600 text-white py-3 rounded
               hover:bg-red-700 transition font-semibold text-lg">
        ✅ Place Order
    </button>

</form>

</div>

<?php } ?>

</div>

<?php include './footer.php'; ?>
