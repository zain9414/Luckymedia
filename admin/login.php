<?php
session_start();
require_once __DIR__ . '/../db.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded shadow w-96">

<h2 class="text-2xl font-bold mb-6 text-center text-red-600">
    Admin Login
</h2>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required
        class="w-full border p-2 mb-4 rounded">

    <input type="password" name="password" placeholder="Password" required
        class="w-full border p-2 mb-4 rounded">

    <button name="login"
        class="w-full bg-red-600 text-white py-2 rounded mb-4">
        Login
    </button>
</form>

<!-- 🔹 Registration Button -->
<p class="text-center text-gray-600 text-sm">
    New Admin?
    <a href="register.php"
       class="text-red-600 font-semibold hover:underline">
        Register Here
    </a>
</p>

<?php
if (isset($_POST['login'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);

   $query = "SELECT * FROM admins
          WHERE username='$username'
          AND password='$password'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        echo "<p class='text-red-600 mt-3 text-center'>
                Invalid Login
              </p>";
    }
}
?>

</div>
</body>
</html>
