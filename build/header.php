<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Restaurant</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<!-- ================= NAVBAR ================= -->
<nav class="bg-red-600 p-4 text-white flex justify-between items-center">
    <h1 class="text-xl font-bold">My Restaurant</h1>

    <div class="space-x-5 text-sm md:text-base">
        <a href="index.php" class="hover:underline">Home</a>
        <a href="menu.php" class="hover:underline">Menu</a>
        <a href="about.php" class="hover:underline">About</a>

        <!-- BLOG PAGE -->
        <a href="blog.php" class="hover:underline">
            Blog
        </a>

        <!-- CONTACT POPUP -->
        <a href="javascript:void(0)"
           onclick="openModal()"
           class="hover:underline cursor-pointer">
            Contact
        </a>
    </div>
</nav>

<!-- ================= CONTACT MODAL ================= -->
<div id="contactModal"
     class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50">

    <div class="bg-white w-full max-w-md rounded shadow-lg p-6 relative animate-fadeIn">

        <!-- CLOSE BUTTON -->
        <button onclick="closeModal()"
                class="absolute top-3 right-3 text-gray-500 hover:text-black">
            ✕
        </button>

        <h2 class="text-2xl font-bold mb-4 text-center text-red-600">
            Contact Us
        </h2>

        <form class="space-y-4">

            <input type="text" placeholder="Your Name" required
                   class="w-full border p-2 rounded">

            <input type="email" placeholder="Your Email" required
                   class="w-full border p-2 rounded">

            <textarea placeholder="Your Message" rows="4" required
                      class="w-full border p-2 rounded"></textarea>

            <button
                class="w-full bg-red-600 text-white py-2 rounded
                       hover:bg-red-700 transition">
                Send Message
            </button>

        </form>
    </div>
</div>

<!-- ================= JS ================= -->
<script>
function openModal() {
    document.getElementById('contactModal').classList.remove('hidden');
    document.getElementById('contactModal').classList.add('flex');
}

function closeModal() {
    document.getElementById('contactModal').classList.add('hidden');
    document.getElementById('contactModal').classList.remove('flex');
}
</script>

<!-- ================= ANIMATION ================= -->
<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fadeIn {
    animation: fadeIn 0.4s ease-out;
}
</style>
