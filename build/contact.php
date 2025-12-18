<?php include './header.php'; ?>

<!-- ================= CONTACT HERO ================= -->
<section class="bg-gray-900 text-white py-24 text-center">
    <h1 class="text-4xl font-bold mb-4">Contact Us</h1>
    <p class="text-gray-300 mb-8">We are happy to hear from you</p>

    <!-- OPEN POPUP BUTTON -->
    <button onclick="openModal()"
        class="bg-red-600 px-8 py-3 rounded text-white
               hover:bg-red-700 transition">
        Send Message
    </button>
</section>

<!-- ================= CONTACT INFO ================= -->
<section class="py-20 bg-gray-100 px-6">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-2xl font-bold mb-6 text-red-600">
            Get In Touch
        </h2>

        <p class="text-gray-600 mb-6">
            Feel free to contact us for any queries or feedback.
        </p>

        <p class="mb-3">📍 Main Road, Your City</p>
        <p class="mb-3">📞 +92 300 1234567</p>
        <p class="mb-3">📧 info@restaurant.com</p>
    </div>
</section>

<!-- ================= POPUP MODAL ================= -->
<div id="contactModal"
     class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50">

    <div class="bg-white w-full max-w-md rounded shadow-lg p-6
                relative animate-fadeIn">

        <!-- CLOSE BUTTON -->
        <button onclick="closeModal()"
                class="absolute top-3 right-3 text-gray-500 hover:text-black">
            ✕
        </button>

        <h2 class="text-2xl font-bold mb-4 text-center text-red-600">
            Contact Form
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
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
.animate-fadeIn {
    animation: fadeIn 0.4s ease-out;
}
</style>

<?php include './footer.php'; ?>
