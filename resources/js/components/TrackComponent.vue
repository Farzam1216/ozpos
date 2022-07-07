<template>
     <div class="osahan-map">
            <div v-if="isVisible" class="loader-overlay">
                <div class="loader"></div>
                <span class="text">Please Wait</span>
            </div>
        <!-- <div class="bg-primary">
            <div class="container">
                <div class="osahan-slider-map py-2">
                    <div class="osahan-slider-item">
                        <div class="text-white">
                            <div class="member-plan">Fast Food</div>
                        </div>
                    </div>
                    <div class="osahan-slider-item">
                        <div class="text-white">
                            <div class="member-plan">Desserts</div>
                        </div>
                    </div>
                    <div class="osahan-slider-item">
                        <div class="text-white">
                            <div class="member-plan">Dim Sum</div>
                        </div>
                    </div>
                    <div class="osahan-slider-item">
                        <div class="text-white">
                            <div class="member-plan">Breakfast</div>
                        </div>
                    </div>
                    <div class="osahan-slider-item">
                        <div class="text-white">
                            <div class="member-plan">Breakfast</div>
                        </div>
                    </div>
                    <div class="osahan-slider-item">
                        <div class="text-white">
                            <div class="member-plan">Dim Sum</div>
                        </div>
                    </div>
                    <div class="osahan-slider-item">
                        <div class="text-white">
                            <div class="member-plan">Breakfast</div>
                        </div>
                    </div>
                    <div class="osahan-slider-item">
                        <div class="text-white">
                            <div class="member-plan">Breakfast</div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <section v-if="isVisible == false" class="section bg-white osahan-track-order-page position-relative">
            <iframe class="position-absolute" :src="'https://www.google.com/maps/embed/v1/directions?key=AIzaSyBqh1mQPnqMSiOUlr-1_3p11XyOsPWRYHI&&origin='+driverAddress+'&destination=Amir Boys Hostle Comercial Markeet Rawalpindi+Pakistan&avoid=tolls|highways'" width="100%" height="676" frameborder="0"
            style="border:0" allowfullscreen></iframe>
            <!-- <div class="container pt-5 pb-5">
                <div class="row d-flex align-items-center">
                    <div class="col-md-6 text-center pb-4">
                        <div class="osahan-point mx-auto"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-white p-4 shadow-lg rounded mb-2">
                            <div class="mb-2"><small>Order #25102589748<a class="float-right font-weight-bold" href="#"><i class="feather-help-circle"></i> HELP</a></small></div>
                            <h6 class="mb-1 mt-1"><a href="restaurant.html" class="text-black">Spice Hut Restaurant
                           </a>
                            </h6>
                            <p class="text-gray mb-0"><i class="feather-clock"></i> 04:19 PM | 8 Items | $314</p>
                        </div>
                        <div class="bg-white p-4 shadow-lg rounded">
                            <div class="osahan-track-order-detail po">
                                <h5 class="mt-0 mb-3">Order Details</h5>
                                <div class="row">
                                    <div class="col-md-5">
                                        <small>FROM</small>
                                        <h6 class="mb-1 mt-1"><a href="restaurant.html" class="text-black"><i class="feather-shopping-cart"></i> Spice Hut Restaurant
                                    </a>
                                        </h6>
                                        <p class="text-gray mb-5">2036, NEW YORK</p>
                                        <small>DELIVER TO</small>
                                        <h6 class="mb-1 mt-1"><span class="text-black"><i class="feather-map-pin"></i> Other
                                    </span>
                                        </h6>
                                        <p class="text-gray mb-0">291, Jawaddi Kalan, Ludhiana, Punjab 141002, India
                                        </p>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="mb-2"><small><i class="feather-list"></i> 5 ITEMS</small></div>
                                        <p class="mb-2"><i class="feather-ui-press text-danger food-item">·</i> Chicken Tikka Sub 12" (30 cm) x 1 <span class="float-right text-secondary">$314</span></p>
                                        <p class="mb-2"><i class="feather-ui-press text-success food-item">·</i> Corn &amp; Peas Salad x 1 <span class="float-right text-secondary">$209</span></p>
                                        <p class="mb-2"><i class="feather-ui-press text-success food-item">·</i> Veg Seekh Sub 6" (15 cm) x 1 <span class="float-right text-secondary">$133</span></p>
                                        <p class="mb-2"><i class="feather-ui-press text-danger food-item">·</i> Chicken Tikka Sub 12" (30 cm) x 1 <span class="float-right text-secondary">$314</span></p>
                                        <hr>
                                        <p class="mb-0 font-weight-bold text-black">TOTAL BILL <span class="float-right text-secondary">$209</span></p>
                                        <p class="mb-0 text-info"><small>Paid via Credit/Debit card
                                    <span class="float-right text-danger">$620 OFF</span></small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-4 shadow-lg rounded mt-2">
                            <div class="row text-center">
                                <div class="col">
                                    <i class="feather-list h4 icofont-3x text-info"></i>
                                    <p class="mt-1 font-weight-bold text-dark mb-0">Order Received</p>
                                    <small class="text-info mb-0">NOW</small>
                                </div>
                                <div class="col">
                                    <i class="feather-check-circle h4 icofont-3x text-success"></i>
                                    <p class="mt-1 font-weight-bold text-dark mb-0">Order Confirmed</p>
                                    <small class="text-success mb-0">NEXT</small>
                                </div>
                                <div class="col">
                                    <i class="feather-truck h4 icofont-3x text-primary"></i>
                                    <p class="mt-1 font-weight-bold text-dark mb-0">Order Picked Up</p>
                                    <small class="text-primary mb-0">LATER (ET : 30min)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </section>
        <!-- slider -->
        <!-- <div class="container slider_restaurant py-5 border-top">
            <div class="trending-slider">
                <div class="osahan-slider-item px-1">
                    <div class="list-card bg-white h-100 d-flex align-items-center rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                            <a href="#">
                                <img alt="#" src="img/trending1.png" class="img-fluid item-img">
                            </a>
                        </div>
                        <div class="p-3 position-relative">
                            <div class="list-card-body">
                                <h6 class="mb-1"><a href="#" class="text-black">Dave's Bar-B-Que</a>
                                </h6>
                                <p class="text-gray mb-2">963 Madyson Drive Suite 679</p>
                                <p class="text-warning mb-0"><i class="feather-star"></i><i class="feather-star"></i><i class="feather-star"></i><i class="feather-star"></i><i class="feather-star"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="osahan-slider-item px-1">
                    <div class="list-card bg-white h-100 d-flex align-items-center rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                            <a href="#">
                                <img alt="#" src="img/trending2.png" class="img-fluid item-img">
                            </a>
                        </div>
                        <div class="p-3 position-relative">
                            <div class="list-card-body">
                                <h6 class="mb-1"><a href="#" class="text-black">Thai Famous Cuisine</a></h6>
                                <p class="text-gray mb-2">980 Syria Drive Suite 680</p>
                                <p class="text-warning mb-0"><i class="feather-star"></i><i class="feather-star"></i><i class="feather-star"></i><i class="feather-star"></i><i class="feather-star"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="osahan-slider-item px-1">
                    <div class="list-card bg-white h-100 d-flex align-items-center rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                            <a href="#">
                                <img alt="#" src="img/trending3.png" class="img-fluid item-img">
                            </a>
                        </div>
                        <div class="p-3 position-relative">
                            <div class="list-card-body">
                                <h6 class="mb-1"><a href="#" class="text-black">The osahan Restaurant
                              </a>
                                </h6>
                                <p class="text-gray mb-2">560 Africa Drive Suite 560</p>
                                <p class="text-warning mb-0"><i class="feather-star"></i><i class="feather-star"></i><i class="feather-star"></i><i class="feather-star"></i><i class="feather-star"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</template>

<script>
import { initializeApp } from 'firebase/app';
import { getDatabase,ref,onValue } from "firebase/database";

const firebaseConfig = {
    apiKey: "AIzaSyCr8iiALRjdxKxk8CGdM10C8L4Q8yS7Ed4",
    authDomain: "mealup-af29b.firebaseapp.com",
    databaseURL: "https://mealup-af29b-default-rtdb.asia-southeast1.firebasedatabase.app",
    projectId: "mealup-af29b",
    storageBucket: "mealup-af29b.appspot.com",
    messagingSenderId: "502253922422",
    appId: "1:502253922422:web:80f34da78b18bce5701757",
    measurementId: "G-77FRR1X6L3"
};

const app = initializeApp(firebaseConfig);

// Get a reference to the database service
// const db = getDatabase(app);


// console.log (database);

    export default {
        created() {
            this.orderHistory();
            this.setData();
        },
        props: {
            user_address_prop:String,
        },
        data(){
            return{
                errors:[],
                trackData:'',
                address:'',
                driverLang:'',
                driverLat:'',
                driverAddress:'',
                isVisible:true,
            }
        },
        methods : {

            getFullAddress(){
                if(this.driverLat!=''){
                    axios.get('https://backend.ozfoodz.com.au/api/get-driver-address/'+this.driverLat+'/'+this.driverLang).then((response) => {
                        this.driverAddress = response.data.data
                        console.log( this.driverAddress );
                        this.isVisible = false;
                    })
                    .catch((error) => {
                        console.error(error);
                    });

                }

            },

            orderHistory(){
                 axios
                .get("https://backend.ozfoodz.com.au/api/track-order/380")
                .then((response) => {
                     this.trackData = response.data;
                            const db = getDatabase();
                            const lang = ref(db, 'drivers/42/driverLang');
                            onValue(lang, (snapshot) => {
                              this.driverLang= snapshot.val();
                               this.getFullAddress();
                            });
                            // lat
                            const lat = ref(db, 'drivers/42/driverLat');
                            onValue(lat, (snapshot) => {
                            this.driverLat= snapshot.val();
                            this.getFullAddress();
                            });


                })
                .catch((error) => {
                console.error(error);
                });
            },
            setData(){
                this.address = this.user_address_prop;
            }
        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style lang="scss">
    .loader-overlay {
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 999;
        cursor: pointer;
        span.text {
            display: inline-block;
            position: relative;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            color: #fff;
        }
        .loader {
            animation: loader-animate 1.5s linear infinite;
            clip: rect(0, 80px, 80px, 40px);
            height: 80px;
            width: 80px;
            position: absolute;
            left: calc(50% - 40px);
            top: calc(50% - 40px);
            &:after {
                animation: loader-animate-after 1.5s ease-in-out infinite;
                clip: rect(0, 80px, 80px, 40px);
                content: '';
                border-radius: 50%;
                height: 80px;
                width: 80px;
                position: absolute;
            }
        }
        @keyframes loader-animate {
            0% {
                transform: rotate(0deg)
            }
            100% {
                transform: rotate(220deg)
            }
        }
        @keyframes loader-animate-after {
            0% {
                box-shadow: inset #fff 0 0 0 17px;
                transform: rotate(-140deg);
            }
            50% {
                box-shadow: inset #fff 0 0 0 2px;
            }
            100% {
                box-shadow: inset #fff 0 0 0 17px;
                transform: rotate(140deg);
            }
        }
    }
</style>
