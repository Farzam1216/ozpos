<template>
    <nav id="main-nav">
    <ul class="second-nav">
        <li><a href="/"><i class="feather-home mr-2"></i> Homepage</a></li>
        <li v-if="userId != null"><a href="/user-profile"><i class="feather-users mr-2"></i>Profile</a></li>

        <li v-if="userId != null"><a :href="'/my-order/'+userId"><i class="feather-list mr-2"></i> My Orders</a></li>
        <!-- <li><a href="/contact-us"><i class="feather-phone mr-2"></i>Contact Us</a></li> -->
        <li v-if="userId != null">
           <a href="/logouts" ><i class="feather-log-out mr-2"></i>Logout</a>
        </li>
        <li v-if="userId == null">
           <a href="/user-login" ><i class="feather-log-in mr-2"></i>Log In</a>
        </li>
        <li v-if="userId == null">
           <a href="/user-register" ><i class="feather-user-plus mr-2"></i>Sign Up</a>
        </li>

        <!-- <li>
            <a href="#"><i class="feather-edit-2 mr-2"></i> Authentication</a>
            <ul>
                <li><a href="#">Login</a></li>
                <li><a href="#">Register</a></li>
                <li><a href="#">Forgot Password</a></li>
                <li><a href="#">Verification</a></li>
            </ul>
        </li> -->
        <!-- <li><a href="#"><i class="feather-heart mr-2"></i> Favorites</a></li>
        <li><a href="#"><i class="feather-trending-up mr-2"></i> Trending</a></li> -->
        <!-- <li><a href="most_popular.html"><i class="feather-award mr-2"></i> Most Popular</a></li>
        <li><a href="restaurant.html"><i class="feather-paperclip mr-2"></i> Restaurant Detail</a></li> -->
        <!-- <li><a href="#"><i class="feather-list mr-2"></i> Checkout</a></li>
        <li><a href="#"><i class="feather-check-circle mr-2"></i> Successful</a></li>
        <li><a href="#"><i class="feather-map-pin mr-2"></i> Live Map</a></li> -->
        <!-- <li>
            <a href="#"><i class="feather-user mr-2"></i> Profile</a>
            <ul>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Terms of use</a></li>
                <li><a href="#">Privacy & Policy</a></li>
            </ul>
        </li> -->
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
            <a href="#">
                <p class="h5 m-0"><i class="feather-phone"></i></p>
                Help
            </a>
        </li>
    </ul>
</nav>
</template>

<script>
import { data } from 'jquery'
    import VueSession from 'vue-session'
    Vue.use(VueSession)
    export default {
        mounted() {
            this.userID();
            var currentUrl = window.location.pathname;
            // console.log(currentUrl);
            // if(   currentUrl == '/'  ){
            //     this.userLogout();
            // }
        },
        data(){
            return{
                userId : null,
            }
        },
        methods: {
            userID(){
                if(this.$session.exists()){
                    let sessionValues = this.$session.getAll();
                    this.userId = sessionValues.id;
                }
            },
            userLogout(){
                this.$session.destroy()
                this.userId = null;
            },
            logouts: function () {
                alert('123')
                this.$session.destroy()
            }
        }
    }
</script>
