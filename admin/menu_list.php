<?php
require_once 'auth.php';
require_once __DIR__ . '/../db.php';

/* ========= DELETE (MUST BE TOP) ========= */
if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];

    // (optional) delete image
    $img = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT image FROM menu WHERE id = $id")
    );

    if (!empty($img['image'])) {
        @unlink("../assets/uploads/" . $img['image']);
    }

    mysqli_query($conn, "DELETE FROM menu WHERE id = $id");

    header("Location: menu_list.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Menu List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex bg-gray-100">

<?php include 'sidebar.php'; ?>

<div class="flex-1 p-10">

<h2 class="text-2xl font-bold mb-6">Menu List</h2>

<div class="overflow-x-auto">
<table class="w-full bg-white rounded shadow">

<tr class="bg-gray-200 text-left">
    <th class="p-3">Image</th>
    <th class="p-3">Name</th>
    <th class="p-3">Price</th>
    <th class="p-3">Action</th>
</tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM menu");
while ($row = mysqli_fetch_assoc($result)) {
?>
<tr class="border-t hover:bg-gray-50">

    <td class="p-3">
        <img src="../assets/uploads/<?= htmlspecialchars($row['image']); ?>"
             class="h-16 w-16 object-cover rounded">
    </td>

    <td class="p-3 font-semibold">
        <?= htmlspecialchars($row['name']); ?>
    </td>

    <td class="p-3 text-red-600 font-bold">
        Rs <?= htmlspecialchars($row['price']); ?>
    </td>

    <td class="p-3 space-x-4">
        <a href="edit_menu.php?id=<?= $row['id']; ?>"
           class="text-blue-600 hover:underline">
            Edit
        </a>

        <a href="?delete=<?= $row['id']; ?>"
           onclick="return confirm('Delete this item?')"
           class="text-red-600 hover:underline">
            Delete
        </a>
    </td>
</tr>
<?php } ?>

</table>
</div>

</div>
</body>
</html>
