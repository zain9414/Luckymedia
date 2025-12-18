<?php
require_once 'auth.php';
require_once '../db.php';

/* ================= DELETE BLOG (MUST BE TOP) ================= */
if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];

    // Delete image if exists
    $img = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT image FROM blogs WHERE id = $id")
    );

    if ($img && !empty($img['image'])) {
        @unlink("../assets/uploads/" . $img['image']);
    }

    // Delete blog
    mysqli_query($conn, "DELETE FROM blogs WHERE id = $id");

    header("Location: blog_list.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blog List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex bg-gray-100">

<!-- ================= SIDEBAR ================= -->
<?php include 'sidebar.php'; ?>

<!-- ================= CONTENT ================= -->
<div class="flex-1 p-10">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Blog List</h2>

        <a href="add_blog.php"
           class="bg-red-600 text-white px-5 py-2 rounded hover:bg-red-700">
            ➕ Add Blog
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full bg-white rounded shadow">
            <tr class="bg-gray-200 text-left">
                <th class="p-3">Image</th>
                <th class="p-3">Title</th>
                <th class="p-3">Content</th>
                <th class="p-3">Action</th>
            </tr>

            <?php
            $result = mysqli_query($conn, "SELECT * FROM blogs ORDER BY id DESC");

            if (mysqli_num_rows($result) == 0) {
                echo "<tr>
                        <td colspan='4' class='p-4 text-center text-gray-600'>
                            No blog found
                        </td>
                      </tr>";
            }

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr class="border-t hover:bg-gray-50">

                <!-- IMAGE -->
                <td class="p-3">
                    <?php if (!empty($row['image'])) { ?>
                        <img src="../assets/uploads/<?= htmlspecialchars($row['image']); ?>"
                             class="h-16 w-20 object-cover rounded">
                    <?php } else { ?>
                        <span class="text-gray-400">No Image</span>
                    <?php } ?>
                </td>

                <!-- TITLE -->
                <td class="p-3 font-semibold">
                    <?= htmlspecialchars($row['title']); ?>
                </td>

                <!-- CONTENT -->
                <td class="p-3 text-gray-600">
                    <?= substr(strip_tags($row['content']), 0, 80); ?>...
                </td>

                <!-- ACTION -->
                <td class="p-3 space-x-3">
                    <a href="edit_blog.php?id=<?= $row['id']; ?>"
                       class="text-blue-600 hover:underline">
                        Edit
                    </a>
                    

                    <a href="?delete=<?= $row['id']; ?>"
                       onclick="return confirm('Delete this blog?')"
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
