<?php

require_once '../db.php';
include './header.php';

if (!isset($_GET['name'])) {
    echo "<p class='text-center mt-20 text-red-600'>Blog not found</p>";
    include 'footer.php';
    exit;
}

$id = $_GET['name'];

$result = mysqli_query($conn, "SELECT * FROM blogs WHERE title = '$id' ");

if (!$result || mysqli_num_rows($result) == 0) {
    echo "<p class='text-center mt-20 text-red-600'>Blog not found</p>";
    include 'footer.php';
    exit;
}

$row = mysqli_fetch_assoc($result);

$imagePath = "../assets/uploads/" . $row['image'];
if (empty($row['image']) || !file_exists($imagePath)) {
    $imagePath = "https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=1500&q=80";
}
?>

<div class="pt-20"></div>

<div class="relative h-72 flex items-center justify-center text-white text-center">
    <div class="absolute inset-0 bg-cover bg-center"
         style="background-image:url('<?= $imagePath ?>')"></div>
    <div class="absolute inset-0 bg-black/60"></div>

    <h1 class="relative z-10 text-4xl font-bold px-4">
        <?= htmlspecialchars($row['title']) ?>
    </h1>
</div>

<section class="py-16 px-6 bg-gray-100">
<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">

    <img src="<?= $imagePath ?>"
         class="w-full h-72 object-cover rounded mb-6">

    <p class="text-gray-700 leading-7 text-lg">
        <?= nl2br(htmlspecialchars($row['content'])) ?>
    </p>

    <a href="blog.php"
       class="inline-block mt-6 text-red-600 font-semibold hover:underline">
        ← Back to Blog
    </a>

</div>
</section>

<?php include 'footer.php'; ?>
