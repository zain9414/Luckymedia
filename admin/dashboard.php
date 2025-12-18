<?php
require_once 'auth.php';
require_once __DIR__ . '/../db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex bg-gray-100">

<!-- Sidebar -->
<?php include 'sidebar.php'; ?>

<!-- Right Side -->
<div class="flex-1">

    <!-- Topbar -->
    <?php include 'topbar.php'; ?>

    <!-- Dashboard Content -->
    <div class="p-8">

        <h1 class="text-3xl font-bold mb-6">Dashboard</h1>

       
      <!-- Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

    <!-- Total Menu Items -->
    <div class="bg-white p-6 rounded shadow">
        <h3 class="text-gray-500">Total Menu Items</h3>
        <p class="text-3xl font-bold">
            <?php
            $q = mysqli_query($conn, "SELECT COUNT(*) total FROM menu");
            echo mysqli_fetch_assoc($q)['total'];
            ?>
        </p>
    </div>

    <!-- Total Admin Users -->
    <div class="bg-white p-6 rounded shadow">
        <h3 class="text-gray-500">Total Users</h3>
        <p class="text-3xl font-bold">
            <?php
            $q = mysqli_query($conn, "SELECT COUNT(*) total FROM admins");
            echo mysqli_fetch_assoc($q)['total'];
            ?>
        </p>
    </div>

    <!-- Orders -->
    <div class="bg-white p-6 rounded shadow">
        <h3 class="text-gray-500">Orders</h3>
        <p class="text-3xl font-bold">
            <?php
            $q = mysqli_query($conn, "SELECT COUNT(*) AS total FROM orders");
            echo mysqli_fetch_assoc($q)['total'];
            ?>
        </p>
    </div>

    <!-- Revenue -->
    <div class="bg-white p-6 rounded shadow">
        <h3 class="text-gray-500">Revenue</h3>
        <p class="text-3xl font-bold text-red-600">
            Rs
            <?php
            $q = mysqli_query($conn, "SELECT SUM(total_amount) AS revenue FROM orders");
            $data = mysqli_fetch_assoc($q);
            echo $data['revenue'] ?? 0;
            ?>
        </p>
    </div>

</div>



        <!-- Welcome Box -->
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-bold">
                Welcome, <?= $_SESSION['admin']; ?> 👋
            </h2>
            <p class="text-gray-600 mt-2">
                Manage your restaurant from this dashboard.
            </p>
        </div>

    </div>
</div>

</body>
</html>
