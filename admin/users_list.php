<?php
require_once 'auth.php';
require_once __DIR__ . '/../db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admins List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex bg-gray-100">

<!-- Sidebar -->
<?php include 'sidebar.php'; ?>

<div class="flex-1">

    <!-- Topbar -->
    <?php include 'topbar.php'; ?>

    <div class="p-8">

        <h2 class="text-2xl font-bold mb-6">Admins / Users</h2>

        <table class="w-full bg-white rounded shadow overflow-hidden">
            <tr class="bg-gray-200">
                <th class="p-3 text-left">#</th>
                <th class="p-3 text-left">Username</th>
                <th class="p-3 text-left">Action</th>
            </tr>

            <?php
            $result = mysqli_query($conn, "SELECT * FROM admins ORDER BY id DESC");
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr class="border-t">
                <td class="p-3"><?= $i++; ?></td>
                <td class="p-3"><?= htmlspecialchars($row['username']); ?></td>
                <td class="p-3">
                    <a href="?delete=<?= $row['id']; ?>"
                       onclick="return confirm('Are you sure to delete this user?')"
                       class="text-red-600 hover:underline">
                        Delete
                    </a>
                </td>
            </tr>
            <?php } ?>
        </table>

        <?php
        if (isset($_GET['delete'])) {
            $id = (int)$_GET['delete'];

            // Prevent self-delete (optional safety)
            $check = mysqli_query($conn,
                "SELECT * FROM admins WHERE id=$id"
            );
            $user = mysqli_fetch_assoc($check);

            if ($user && $user['username'] !== $_SESSION['admin']) {
                mysqli_query($conn, "DELETE FROM admins WHERE id=$id");
                header("Location: users_list.php");
                exit;
            } else {
                echo "<p class='text-red-600 mt-4'>
                        You cannot delete yourself!
                      </p>";
            }
        }
        ?>

    </div>
</div>

</body>
</html>
