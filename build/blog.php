<?php
require_once '../db.php';
include __DIR__ . '/header.php';

/* ================= FETCH CATEGORIES ================= */
$categories = mysqli_query($conn, "SELECT * FROM categories ORDER BY name ASC");
?>

<!-- HERO -->
<section class="relative h-[60vh] overflow-hidden flex items-center justify-center text-white text-center">

    <!-- SLIDER IMAGES -->
    <div class="absolute inset-0">

        <img src="assets\img\top-view-fast-food-mix-mozzarella-sticks-club-sandwich-hamburger-mushroom-pizza-caesar-shrimp-salad-french-fries-ketchup-mayo-cheese-sauces-table_141793-3998.avif"
             class="slide absolute inset-0 w-full h-full object-cover opacity-100 transition-opacity duration-1000">

        <img src="assets\img\drinks-glasses-new-year-eve-celebration_23-2150901946.avif"
             class="slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000">

        <img src="assets\img\Fastfood-ambiance-1024x536.webp"
             class="slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000">

        <!-- DARK OVERLAY -->
        <div class="absolute inset-0 bg-black/60"></div>
    </div>

    <!-- TEXT -->
    <div class="relative z-10">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">
            Our Blog
        </h1>
        <p class="text-lg">
            Quality Food • Best Service • Happy Customers
        </p>
    </div>

</section>

<section class="py-16 bg-gray-100 px-6">
<div class="max-w-7xl mx-auto grid md:grid-cols-4 gap-8">

<!-- ================= CATEGORY SIDEBAR ================= -->
<aside class="md:col-span-1">
    <div class="bg-gray-900 text-white rounded-xl p-5 sticky top-24">
        <h3 class="text-lg font-bold mb-4">Categories</h3>
        <ul class="space-y-2">
            <li>
                <a href="blog.php" class="block px-3 py-2 hover:bg-white/10 rounded">
                    All Blogs
                </a>
            </li>

            <?php while ($cat = mysqli_fetch_assoc($categories)) { ?>
                <li>
                    <a href="blog.php?category=<?= (int)$cat['id']; ?>"
                       class="block px-3 py-2 hover:bg-purple-500/20 rounded">
                        <?= htmlspecialchars($cat['name']); ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</aside>

<!-- ================= BLOG POSTS ================= -->
<div class="md:col-span-3 grid md:grid-cols-2 gap-8">

<?php
$where = "";
if (!empty($_GET['category'])) {
    $cat_id = (int) $_GET['category'];
    $where = "WHERE category_id = $cat_id";
}

$sql = "SELECT * FROM blogs $where ORDER BY id DESC";
$blogs = mysqli_query($conn, $sql);

if (!$blogs) {
    die("Query Error: " . mysqli_error($conn));
}

if (mysqli_num_rows($blogs) == 0) {
    echo "<p class='text-gray-600'>No blogs found</p>";
}

while ($row = mysqli_fetch_assoc($blogs)) {
?>
<a href="./blog_detail.php?name=<?php echo $row['title']; ?>"
   class="bg-white rounded-xl shadow hover:-translate-y-2 transition block">

<?php if (!empty($row['image'])) { ?>
    <img src="../assets/uploads/<?= htmlspecialchars($row['image']); ?>"
         class="h-48 w-full object-cover rounded-t-xl">
<?php } ?>

<div class="p-5">
    <h3 class="text-xl font-bold mb-2">
        <?= htmlspecialchars($row['title']); ?>
    </h3>

    <p class="text-gray-600 mb-4">
        <?= substr(strip_tags($row['content']), 0, 120); ?>...
    </p>

    <span class="text-red-600 font-semibold">Read More →</span>
</div>
</a>
<?php } ?>

</div>
</div>
</section>

<?php include __DIR__ . '/footer.php'; ?>



<script>
let slides = document.querySelectorAll('.slide');
let index = 0;

setInterval(() => {
    slides[index].classList.remove('opacity-100');
    slides[index].classList.add('opacity-0');

    index = (index + 1) % slides.length;

    slides[index].classList.remove('opacity-0');
    slides[index].classList.add('opacity-100');
}, 3000);
</script>