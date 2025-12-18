<?php include './header.php'; ?>

<!-- ================= HERO SLIDER ================= -->
<section class="relative h-[60vh] overflow-hidden flex items-center justify-center text-white text-center">

    <!-- SLIDER IMAGES -->
    <div class="absolute inset-0">

        <img src="assets\img\top-view-fast-food-mix-mozzarella-sticks-club-sandwich-hamburger-mushroom-pizza-caesar-shrimp-salad-french-fries-ketchup-mayo-cheese-sauces-table_141793-3998.avif"
             class="slide absolute inset-0 w-full h-full object-cover opacity-100 transition-opacity duration-1000">

        <img src="assets\img\drinks-glasses-new-year-eve-celebration_23-2150901946.avif"
             class="slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000">

        <img src="assets\img\Fastfood-ambiance-1024x536.webp"
             class="slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000">

        <!-- DARK OVERLAY -->
        <div class="absolute inset-0 bg-black/60"></div>
    </div>

    <!-- TEXT -->
    <div class="relative z-10">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">
            About Our Restaurant
        </h1>
        <p class="text-lg">
            Quality Food • Best Service • Happy Customers
        </p>
    </div>

</section>

<!-- ================= ABOUT CONTENT ================= -->
<section class="py-20 bg-white px-6">
    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10 items-center">

        <!-- TEXT -->
        <div>
            <h2 class="text-3xl font-bold mb-4 text-red-600">
                Our Story
            </h2>

            <p class="text-gray-600 leading-7 mb-4">
                Our restaurant was founded with a passion for delivering
                delicious food made from fresh ingredients. We believe
                in quality, hygiene, and excellent customer service.
            </p>

            <p class="text-gray-600 leading-7">
                From traditional recipes to modern flavors, our chefs
                prepare each dish with care and love to give you the
                best dining experience.
            </p>
        </div>

        <!-- IMAGE -->
        <div>
            <img src="assets\img\istockphoto-638731944-612x612.jpg"
                 class="rounded shadow-lg w-full">
        </div>

    </div>
</section>

<!-- ================= WHY CHOOSE US ================= -->
<section class="py-20 bg-gray-100 px-6">
    <h2 class="text-3xl font-bold text-center mb-12">
        Why Choose Us
    </h2>

    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-6">

        <div class="bg-white p-6 rounded shadow text-center
                    transition hover:-translate-y-1 hover:shadow-lg">
            <h3 class="font-bold text-xl mb-2">Fresh Ingredients</h3>
            <p class="text-gray-600">Only fresh & quality food</p>
        </div>

        <div class="bg-white p-6 rounded shadow text-center
                    transition hover:-translate-y-1 hover:shadow-lg">
            <h3 class="font-bold text-xl mb-2">Expert Chefs</h3>
            <p class="text-gray-600">Professional cooking team</p>
        </div>

        <div class="bg-white p-6 rounded shadow text-center
                    transition hover:-translate-y-1 hover:shadow-lg">
            <h3 class="font-bold text-xl mb-2">Fast Service</h3>
            <p class="text-gray-600">Quick & friendly service</p>
        </div>

        <div class="bg-white p-6 rounded shadow text-center
                    transition hover:-translate-y-1 hover:shadow-lg">
            <h3 class="font-bold text-xl mb-2">Happy Customers</h3>
            <p class="text-gray-600">Customer satisfaction first</p>
        </div>

    </div>
</section>

<!-- ================= TEAM ================= -->
<section class="py-20 bg-white px-6">
    <h2 class="text-3xl font-bold text-center mb-12">
        Our Team
    </h2>

    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">

        <div class="text-center">
            <img src="../assets/img/chef1.jpg"
                 class="w-40 h-40 mx-auto rounded-full object-cover mb-4">
            <h3 class="font-bold">Head Chef</h3>
            <p class="text-gray-600">Master of flavors</p>
        </div>

        <div class="text-center">
            <img src="../assets/img/chef2.jpg"
                 class="w-40 h-40 mx-auto rounded-full object-cover mb-4">
            <h3 class="font-bold">Sous Chef</h3>
            <p class="text-gray-600">Creative dishes</p>
        </div>

        <div class="text-center">
            <img src="../assets/img/chef3.jpg"
                 class="w-40 h-40 mx-auto rounded-full object-cover mb-4">
            <h3 class="font-bold">Manager</h3>
            <p class="text-gray-600">Customer care expert</p>
        </div>

    </div>
</section>

<!-- ================= CTA ================= -->
<section class="py-16 bg-red-600 text-white text-center">
    <h2 class="text-3xl font-bold mb-4">
        Ready to Taste the Best Food?
    </h2>

    <a href="menu.php"
       class="inline-block bg-white text-red-600 px-8 py-3 rounded
              font-semibold hover:bg-gray-200 transition">
        View Menu
    </a>
</section>


<?php include './footer.php'; ?>




<script>
let slides = document.querySelectorAll('.slide');
let index = 0;

setInterval(() => {
    slides[index].classList.remove('opacity-100');
    slides[index].classList.add('opacity-0');

    index = (index + 1) % slides.length;

    slides[index].classList.remove('opacity-0');
    slides[index].classList.add('opacity-100');
}, 3000);
</script>
