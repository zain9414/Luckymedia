<div class="bg-white shadow px-6 py-4 flex justify-between items-center">
    <h1 class="text-xl font-bold text-gray-700">
        Restaurant Admin
    </h1>

    <div class="flex items-center space-x-4">
        <span class="text-gray-600">
            👤 <?= $_SESSION['admin']; ?>
        </span>

        <a href="logout.php"
   class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
   Logout
</a>
    </div>
</div>
