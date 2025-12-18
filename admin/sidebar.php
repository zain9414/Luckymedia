<?php
$current = basename($_SERVER['PHP_SELF']);

function active($page) {
    global $current;
    return $current === $page ? 'bg-white/10 border-l-4 border-blue-400' : '';
}
?>

<div class="w-64 min-h-screen p-5 text-white
            bg-gradient-to-b
            from-slate-950 via-indigo-950 to-purple-950
            shadow-xl shadow-indigo-500/20">

    <h2 class="text-2xl font-bold mb-8 text-center
               bg-gradient-to-r from-blue-400 to-purple-500
               bg-clip-text text-transparent">
        Admin Panel
    </h2>

    <ul class="space-y-3 text-sm">

        <!-- DASHBOARD -->
        <li>
            <a href="dashboard.php"
               class="block p-2 rounded hover:bg-blue-500/20 <?= active('dashboard.php') ?>">
                📊 Dashboard
            </a>
        </li>

        <!-- MENU -->
        <li class="pt-3 text-green-400 uppercase text-xs">
            Menu
        </li>

        <li>
            <a href="add_menu.php"
               class="block p-2 rounded hover:bg-green-500/20 <?= active('add_menu.php') ?>">
                ➕ Add Menu
            </a>
        </li>

        <li>
            <a href="menu_list.php"
               class="block p-2 rounded hover:bg-green-500/20 <?= active('menu_list.php') ?>">
                📋 Menu List
            </a>
        </li>

        <!-- BLOG -->
        <li class="pt-3 text-purple-400 uppercase text-xs">
            Blog
        </li>

        <li>
            <a href="add_blog.php"
               class="block p-2 rounded hover:bg-purple-500/20 <?= active('add_blog.php') ?>">
                ✍️ Add Blog
            </a>
        </li>

        <li>
            <a href="blog_list.php"
               class="block p-2 rounded hover:bg-purple-500/20 <?= active('blog_list.php') ?>">
                📰 Blog List
            </a>
        </li>

        <!-- ORDERS -->
        <li class="pt-3 text-cyan-400 uppercase text-xs">
            Orders
        </li>

        <li>
            <a href="orders.php"
               class="block p-2 rounded hover:bg-cyan-500/20 <?= active('orders.php') ?>">
                📦 Orders List
            </a>
        </li>

        <!-- CATEGORY -->
        <li class="pt-3 text-amber-400 uppercase text-xs">
            Category
        </li>

        <li>
            <a href="add_category.php"
               class="block p-2 rounded hover:bg-amber-500/20 <?= active('add_category.php') ?>">
                🗂 Add Category
            </a>
        </li>

        <li>
            <a href="category_list.php"
               class="block p-2 rounded hover:bg-amber-500/20 <?= active('category_list.php') ?>">
                📂 Category List
            </a>
        </li>

        <!-- LOGOUT -->
        <li class="pt-4">
            <a href="logout.php"
               class="block p-2 rounded hover:bg-red-500/30 <?= active('logout.php') ?>">
                🚪 Logout
            </a>
        </li>

    </ul>
</div>

<style>
@keyframes slideIn {
    from { transform: translateX(-20px); opacity: 0; }
    to   { transform: translateX(0); opacity: 1; }
}
</style>
