<?php
require_once 'auth.php';
require_once '../db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Categories</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex bg-gray-100">

<?php include 'sidebar.php'; ?>

<div class="flex-1 p-10">

<h2 class="text-2xl font-bold mb-6">Categories</h2>

<table class="w-full bg-white rounded shadow">
<tr class="bg-gray-200">
    <th class="p-3">ID</th>
    <th class="p-3">Name</th>
    <th class="p-3">Action</th>
</tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM categories");

while ($row = mysqli_fetch_assoc($result)) {
?>
<tr class="border-t hover:bg-gray-50">
    <td class="p-3"><?= $row['id']; ?></td>
    <td class="p-3"><?= $row['name']; ?></td>
    <td class="p-3">
        <a href="?delete=<?= $row['id']; ?>"
           onclick="return confirm('Delete category?')"
           class="text-red-600">
            Delete
        </a>
    </td>
</tr>
<?php } ?>
</table>

<?php
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    mysqli_query($conn, "DELETE FROM categories WHERE id=$id");
    header("Location: category_list.php");
    exit;
}
?>

</div>
</body>
</html>
