<template>
    <nav id="main-nav">
    <ul class="second-nav">
        <li><a href="/"><i class="feather-home mr-2"></i> Homepage</a></li>
        <li><a href="#"><i class="feather-list mr-2"></i> My Orders</a></li>
        <li>
            <a href="#"><i class="feather-edit-2 mr-2"></i> Authentication</a>
            <ul>
                <li><a href="#">Login</a></li>
                <li><a href="#">Register</a></li>
                <li><a href="#">Forgot Password</a></li>
                <li><a href="#">Verification</a></li>
                <!-- <li><a href="location">Location</a></li> -->
            </ul>
        </li>
        <li><a href="#"><i class="feather-heart mr-2"></i> Favorites</a></li>
        <li><a href="#"><i class="feather-trending-up mr-2"></i> Trending</a></li>
        <!-- <li><a href="most_popular.html"><i class="feather-award mr-2"></i> Most Popular</a></li>
        <li><a href="restaurant.html"><i class="feather-paperclip mr-2"></i> Restaurant Detail</a></li> -->
        <li><a href="#"><i class="feather-list mr-2"></i> Checkout</a></li>
        <li><a href="#"><i class="feather-check-circle mr-2"></i> Successful</a></li>
        <li><a href="#"><i class="feather-map-pin mr-2"></i> Live Map</a></li>
        <li>
            <a href="#"><i class="feather-user mr-2"></i> Profile</a>
            <ul>
                <li><a href="#">Profile</a></li>
                <!-- <li><a href="favorites.html">Delivery support</a></li> -->
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Terms of use</a></li>
                <li><a href="#">Privacy & Policy</a></li>
            </ul>
        </li>
    </ul>
    <ul class="bottom-nav">
        <li class="email">
            <a class="text-danger" href="/">
                <p class="h5 m-0"><i class="feather-home text-danger"></i></p>
                Home
            </a>
        </li>
        <li class="github">
            <a href="#">
                <p class="h5 m-0"><i class="feather-message-circle"></i></p>
                FAQ
            </a>
        </li>
        <li class="ko-fi">
            <a href="contact-us">
                <p class="h5 m-0"><i class="feather-phone"></i></p>
                Help
            </a>
        </li>
    </ul>
</nav>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
