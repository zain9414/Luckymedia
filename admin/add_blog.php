<?php
require_once 'auth.php';
require_once '../db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex">

<!-- ========== SIDEBAR ========== -->
<?php include 'sidebar.php'; ?>

<!-- ========== MAIN CONTENT ========== -->
<div class="flex-1 p-10">

    <h2 class="text-2xl font-bold mb-6">✍️ Add Blog Post</h2>

    <form method="POST" enctype="multipart/form-data"
          class="bg-white p-6 rounded shadow w-full max-w-xl">

        <!-- TITLE -->
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Blog Title</label>
            <input type="text" name="title" required
                   class="w-full border p-2 rounded">
        </div>

        <!-- CONTENT -->
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Blog Content</label>
            <textarea name="content" rows="6" required
                      class="w-full border p-2 rounded"></textarea>
        </div>

        <!-- CATEGORY -->
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Category</label>
            <select name="category_id" required
                    class="w-full border p-2 rounded">
                <option value="">Select Category</option>
                <?php
                $cats = mysqli_query($conn, "SELECT * FROM categories ORDER BY name ASC");
                while ($c = mysqli_fetch_assoc($cats)) {
                ?>
                    <option value="<?= $c['id']; ?>">
                        <?= htmlspecialchars($c['name']); ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <!-- IMAGE -->
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Blog Image</label>
            <input type="file" name="image"
                   class="w-full border p-2 rounded">
        </div>

        <!-- BUTTON -->
        <button name="save"
                class="bg-red-600 text-white px-6 py-2 rounded
                       hover:bg-red-700 transition">
            Publish Blog
        </button>

    </form>

    <?php
    if (isset($_POST['save'])) {

        $title       = mysqli_real_escape_string($conn, $_POST['title']);
        $content     = mysqli_real_escape_string($conn, $_POST['content']);
        $category_id = (int) $_POST['category_id'];

        // IMAGE UPLOAD
        $img = "";
        if (!empty($_FILES['image']['name'])) {
            $img = time() . "_" . $_FILES['image']['name'];
            move_uploaded_file(
                $_FILES['image']['tmp_name'],
                "../assets/uploads/" . $img
            );
        }

        // INSERT QUERY
        $sql = "INSERT INTO blogs (title, content, image, category_id)
                VALUES ('$title', '$content', '$img', $category_id)";

        mysqli_query($conn, $sql) or die(mysqli_error($conn));

        echo "<p class='text-green-600 mt-4 font-semibold'>
                ✅ Blog Added Successfully
              </p>";
    }
    ?>

</div>

</body>
</html>
