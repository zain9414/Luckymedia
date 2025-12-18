<?php
require_once __DIR__ . '/../db.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get ID
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch old data
$result = mysqli_query($conn, "SELECT * FROM menu WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Menu item not found");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

<h2 class="text-2xl font-bold mb-4">Edit Menu Item</h2>

<form method="POST" enctype="multipart/form-data"
      class="bg-white p-6 rounded shadow w-96">

    <input type="text" name="name"
           value="<?= $data['name']; ?>" required
           class="w-full border p-2 mb-3">

    <input type="number" name="price"
           value="<?= $data['price']; ?>" required
           class="w-full border p-2 mb-3">

    <img src="../assets/uploads/<?= $data['image']; ?>"
         class="h-20 mb-3 rounded">

    <input type="file" name="image"
           class="w-full mb-3">

    <button name="update"
        class="bg-blue-600 text-white px-4 py-2 rounded">
        Update
    </button>
</form>

<?php
if (isset($_POST['update'])) {

    $name  = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    // Check if new image uploaded
    if (!empty($_FILES['image']['name'])) {

        $img_name = basename($_FILES['image']['name']);
        $tmp_name = $_FILES['image']['tmp_name'];

        $upload_dir  = __DIR__ . '/../assets/uploads/';
        $upload_path = $upload_dir . $img_name;

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        move_uploaded_file($tmp_name, $upload_path);

        // Update with image
        mysqli_query($conn,
            "UPDATE menu SET
             name='$name',
             price='$price',
             image='$img_name'
             WHERE id=$id"
        );

    } else {
        // Update without image
        mysqli_query($conn,
            "UPDATE menu SET
             name='$name',
             price='$price'
             WHERE id=$id"
        );
    }

    header("Location: menu_list.php");
    exit;
}
?>

</body>
</html>
