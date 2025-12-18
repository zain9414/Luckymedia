<?php
require_once 'auth.php';
require_once __DIR__ . '/../db.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex bg-gray-100">

<!-- Sidebar -->
<?php include 'sidebar.php'; ?>

<!-- Right Side -->
<div class="flex-1">

    <!-- Topbar -->
    <?php include 'topbar.php'; ?>

    <!-- Page Content -->
    <div class="p-10">

        <h2 class="text-2xl font-bold mb-6">Add Menu Item</h2>

        <form method="POST" enctype="multipart/form-data"
              class="bg-white p-6 rounded shadow w-96">

            <input type="text" name="name" placeholder="Item Name" required
                   class="w-full border p-2 mb-4 rounded">

            <input type="number" name="price" placeholder="Price" required
                   class="w-full border p-2 mb-4 rounded">

            <input type="file" name="image" required
                   class="w-full mb-4">
               <select name="category_id" required
        class="w-full border p-2 mb-3 rounded">
    <option value="">Select Food Category</option>

    <?php
    $cats = mysqli_query($conn, "SELECT * FROM categories");
    while ($c = mysqli_fetch_assoc($cats)) {
    ?>
        <option value="<?= $c['id']; ?>">
            <?= $c['name']; ?>
        </option>
    <?php } ?>

</select>

            <button type="submit" name="save"
                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                Save Menu
            </button>
        </form>

        <?php
        if (isset($_POST['save'])) {

            $name  = mysqli_real_escape_string($conn, $_POST['name']);
            $price = mysqli_real_escape_string($conn, $_POST['price']);

            $img_name = basename($_FILES['image']['name']);
            $tmp_name = $_FILES['image']['tmp_name'];

            $upload_dir = __DIR__ . '/../assets/uploads/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            if (move_uploaded_file($tmp_name, $upload_dir . $img_name)) {

                mysqli_query($conn,
                    "INSERT INTO menu (name, price, image)
                     VALUES ('$name', '$price', '$img_name')"
                );

                echo "<p class='text-green-600 mt-4'>Menu Added Successfully</p>";
            } else {
                echo "<p class='text-red-600 mt-4'>Image Upload Failed</p>";
            }
        }
        ?>

    </div>
</div>

</body>
</html>
