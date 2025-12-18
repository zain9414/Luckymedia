<?php
session_start();

require_once '../db.php';
include './header.php';

/* ===== ID CHECK ===== */
if (!isset($_GET['id'])) {
    header("Location: menu.php");
    exit;
}

$id = (int) $_GET['id'];

/* ===== FETCH MENU ITEM ===== */
$result = mysqli_query($conn, "SELECT * FROM menu WHERE id = $id");

if (!$result || mysqli_num_rows($result) == 0) {
    echo "<p class='text-center mt-20 text-red-600'>Menu item not found</p>";
    include './footer.php';
    exit;
}

$row = mysqli_fetch_assoc($result);

/* ===== ADD TO CART LOGIC ===== */
if (isset($_POST['add_to_cart'])) {

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Item already in cart → increase qty
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['qty'] += 1;
    } 
    // New item
    else {
        $_SESSION['cart'][$id] = [
            'id'    => $row['id'],
            'name'  => $row['name'],
            'price' => $row['price'],
            'image' => $row['image'],
            'qty'   => 1
        ];
    }

    header("Location: cart.php");
    exit;
}
?>

<!-- ================= PAGE ================= -->
<div class="max-w-4xl mx-auto mt-24 px-6">

<div class="bg-white rounded-xl p-6 grid md:grid-cols-2 gap-8
            shadow-[0_15px_35px_rgba(0,0,0,0.25)]
            hover:shadow-[0_25px_50px_rgba(0,0,0,0.35)]
            transition">

    <!-- IMAGE -->
    <img src="../assets/uploads/<?= htmlspecialchars($row['image']); ?>"
         class="w-full h-80 object-cover rounded-lg">

    <!-- DETAILS -->
    <div>
        <h1 class="text-3xl font-bold mb-4">
            <?= htmlspecialchars($row['name']); ?>
        </h1>

        <p class="text-red-600 text-2xl font-bold mb-6">
            Rs <?= $row['price']; ?>
        </p>

        <p class="text-gray-600 leading-7 mb-8">
            Fresh ingredients, chef special recipe and premium taste.
            Order now and enjoy restaurant-quality food.
        </p>

        <!-- ADD TO CART -->
        <form method="POST" class="space-y-4">

            <button type="submit" name="add_to_cart"
                class="w-full bg-red-600 text-white py-3 rounded-lg
                       hover:bg-red-700 transition font-semibold text-lg">
                🛒 Add to Cart
            </button>

            <a href="menu.php"
               class="block text-center bg-gray-200 py-2 rounded-lg
                      hover:bg-gray-300 transition">
                ← Back to Menu
            </a>

        </form>
    </div>

</div>

</div>

<?php include './footer.php'; ?>
