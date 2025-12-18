<?php
require_once __DIR__ . '/../db.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded shadow w-96">

<h2 class="text-2xl font-bold mb-6 text-center text-red-600">
    Admin Registration
</h2>

<form method="POST">

    <input type="text" name="username" placeholder="Username" required
        class="w-full border p-2 mb-4 rounded">

    <input type="password" name="password" placeholder="Password" required
        class="w-full border p-2 mb-4 rounded">

    <input type="password" name="confirm" placeholder="Confirm Password" required
        class="w-full border p-2 mb-4 rounded">

    <button name="register"
        class="w-full bg-green-600 text-white py-2 rounded">
        Register
    </button>
</form>

<?php
if (isset($_POST['register'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $confirm  = $_POST['confirm'];

    // 🔴 Password match check
    if ($password !== $confirm) {
        echo "<p class='text-red-600 mt-3 text-center'>
                Passwords do not match
              </p>";
        exit;
    }

    // 🔐 Hash password (same as login)
    $hash = md5($password);

    // 🔍 Check duplicate username
    $check = mysqli_query($conn,
        "SELECT * FROM admins WHERE username='$username'"
    );

    if (mysqli_num_rows($check) > 0) {
        echo "<p class='text-red-600 mt-3 text-center'>
                Username already exists
              </p>";
    } else {

        $insert = mysqli_query($conn,
            "INSERT INTO admins (username, password)
             VALUES ('$username', '$hash')"
        );

        if ($insert) {
            echo "<p class='text-green-600 mt-3 text-center'>
                    Registration Successful
                  </p>";
        } else {
            echo "<p class='text-red-600 mt-3 text-center'>
                    Database Error
                  </p>";
        }
    }
}
?>

<p class="text-center mt-4">
    <a href="login.php" class="text-blue-600 underline">
        Go to Login
    </a>
</p>

</div>
</body>
</html>
