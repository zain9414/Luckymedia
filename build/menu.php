<?php
include './header.php';
require_once '../db.php';
?>

<div class="max-w-6xl mx-auto mt-24 px-6">

    <h2 class="text-4xl font-bold text-center mb-12 text-red-600">
        Our Menu
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

        <?php
        $result = mysqli_query($conn, "SELECT * FROM menu");

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <a href="menu_detail.php?id=<?= $row['id']; ?>"
   class="bg-white rounded p-4 text-center
          transform transition-all duration-300
          shadow-[0_10px_25px_rgba(0,0,0,0.25)]
          hover:-translate-y-2
          hover:shadow-[0_20px_40px_rgba(0,0,0,0.35)]">

    <img src="../assets/uploads/<?= $row['image']; ?>"
         class="h-48 w-full object-cover rounded mb-4">

    <h3 class="text-xl font-bold mb-2">
        <?= $row['name']; ?>
    </h3>

    <p class="text-red-600 font-semibold">
        Rs <?= $row['price']; ?>
    </p>
</a>
        <?php } ?>

    </div>
</div>

<?php include './footer.php'; ?>
