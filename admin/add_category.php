<?php
require_once 'auth.php';
require_once '../db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex bg-gray-100">

<?php include 'sidebar.php'; ?>

<div class="flex-1 p-10">

<h2 class="text-2xl font-bold mb-6">Add Category</h2>

<form method="POST" class="bg-white p-6 rounded shadow w-full max-w-md">

    <input type="text" name="name" placeholder="Category Name" required
           class="w-full border p-2 mb-4 rounded">

    <button name="save"
            class="bg-red-600 text-white px-6 py-2 rounded">
        Save Category
    </button>
</form>

<?php
if (isset($_POST['save'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);

    mysqli_query($conn,
        "INSERT INTO categories (name) VALUES ('$name')"
    );

    echo "<p class='text-green-600 mt-4'>Category Added</p>";
}
?>

</div>
</body>
</html>
