<?php 
include './header.php'; 
require_once '../db.php'; 
?>

<!-- ================= HERO SECTION ================= -->
<section class="relative h-[80vh] flex items-center justify-center text-center text-white">

    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="assets/img/drinks-glasses-new-year-eve-celebration_23-2150901946.avif"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/60"></div>
    </div>

    <!-- Hero Content -->
    <div class="relative z-10" data-aos="zoom-in">
        <h1 class="text-4xl md:text-6xl font-bold mb-4">
            Welcome to Our Restaurant
        </h1>
        <p class="text-lg mb-6">
            Fresh • Tasty • Quality Food
        </p>

        <a href="menu.php"
           class="bg-red-600 px-8 py-3 rounded text-white
                  transition hover:bg-red-700">
            View Menu
        </a>
    </div>

</section>

<!-- ================= SECTION 2: 4 INFO CARDS ================= -->
<section class="py-16 bg-gray-100">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-6 px-6">

        <div class="bg-white p-6 rounded shadow text-center" data-aos="fade-up">
            <h3 class="text-xl font-bold mb-2">Fresh Food</h3>
            <p class="text-gray-600">Daily fresh ingredients</p>
        </div>

        <div class="bg-white p-6 rounded shadow text-center" data-aos="fade-up" data-aos-delay="100">
            <h3 class="text-xl font-bold mb-2">Fast Service</h3>
            <p class="text-gray-600">Quick & friendly staff</p>
        </div>

        <div class="bg-white p-6 rounded shadow text-center" data-aos="fade-up" data-aos-delay="200">
            <h3 class="text-xl font-bold mb-2">Best Chefs</h3>
            <p class="text-gray-600">Professional cooks</p>
        </div>

        <div class="bg-white p-6 rounded shadow text-center" data-aos="fade-up" data-aos-delay="300">
            <h3 class="text-xl font-bold mb-2">Online Order</h3>
            <p class="text-gray-600">Easy & fast ordering</p>
        </div>

    </div>
</section>

<!-- ================= SECTION 3: ABOUT ================= -->
<section class="py-20 bg-white text-center px-6" data-aos="fade-up">
    <h2 class="text-3xl font-bold mb-6">About Our Restaurant</h2>
    <p class="max-w-3xl mx-auto text-gray-600 leading-7">
        We provide high quality food with excellent service.
        Our restaurant is known for taste, hygiene and customer satisfaction.
    </p>
</section>

<!-- ================= SECTION 4: MENU PREVIEW ================= -->
<section class="py-16 bg-gray-100">
    <h2 class="text-3xl font-bold text-center mb-10" data-aos="fade-up">
        Popular Menu
    </h2>

    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 px-6">

        <?php
        $menu = mysqli_query($conn, "SELECT * FROM menu LIMIT 3");
        while ($row = mysqli_fetch_assoc($menu)) {
        ?>
        <a href="menu_detail.php?id=<?= $row['id']; ?>"
           class="bg-white rounded shadow p-4 text-center
                  transition-transform duration-300 hover:-translate-y-1"
           data-aos="fade-up">

            <img src="../assets/uploads/<?= $row['image']; ?>"
                 class="h-48 w-full object-cover rounded mb-4">

            <h3 class="text-xl font-semibold"><?= $row['name']; ?></h3>
            <p class="text-red-600 font-bold mt-2">
                Rs <?= $row['price']; ?>
            </p>
        </a>
        <?php } ?>

    </div>
</section>

<!-- ================= SECTION 5: CONTACT ================= -->
<section class="py-16 bg-gray-900 text-white text-center" data-aos="fade-up">
    <h2 class="text-3xl font-bold mb-4">Contact Us</h2>
    <p>📍 Main Road, Your City</p>
    <p>📞 +92 300 1234567</p>
    <p>📧 info@restaurant.com</p>
</section>

<?php include './footer.php'; ?>
