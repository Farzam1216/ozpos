<template>
    <div class="container">
        <div v-if="isVisible" class="loader-overlay">
                <div class="loader"></div>
                <span class="text">Please Wait</span>
        </div>
         <div class="osahan-profile">
        <div class="d-none">
            <div class="bg-primary border-bottom p-3 d-flex align-items-center">
                <a class="toggle togglew toggle-2" href="#"><span></span></a>
                <h4 class="font-weight-bold m-0 text-white">Profile</h4>
            </div>
        </div>
        <!-- profile -->
        <div class="container position-relative">
            <div class="py-5 osahan-profile row">
                <div class="col-md-4 mb-3">
                    <div class="bg-white rounded shadow-sm sticky_sidebar overflow-hidden">
                        <a href="user-profile" class="">
                            <div class="d-flex align-items-center p-3">
                                <div class="left mr-3">
                                    <img alt="#" src="img/user1.jpg" class="rounded-circle">
                                </div>
                                <div class="right">
                                    <h6 class="mb-1 font-weight-bold" v-if="profileData != null">{{ profileData.data.name }} <i class="feather-check-circle text-success"></i></h6>
                                    <p class="text-muted m-0 small" v-if="profileData != null">{{ profileData.data.email }}</p>
                                </div>
                            </div>
                        </a>
                        <!-- <div class="osahan-credits d-flex align-items-center p-3 bg-light">
                            <p class="m-0">Accounts Credits</p>
                            <h5 class="m-0 ml-auto text-primary">$52.25</h5>
                        </div> -->
                        <!-- profile-details -->
                        <div class="bg-white profile-details">
                            <!-- <a href="faq" class="d-flex w-100 align-items-center border-bottom px-3 py-4">
                                <div class="left mr-3">
                                    <h6 class="font-weight-bold m-0 text-dark"><i class="feather-truck bg-danger text-white p-2 rounded-circle mr-2"></i> Delivery Support</h6>
                                </div>
                                <div class="right ml-auto">
                                    <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                                </div>
                            </a> -->
                            <a href="contact-us" class="d-flex w-100 align-items-center border-bottom px-3 py-4">
                                <div class="left mr-3">
                                    <h6 class="font-weight-bold m-0 text-dark"><i class="feather-phone bg-primary text-white p-2 rounded-circle mr-2"></i> Contact</h6>
                                </div>
                                <div class="right ml-auto">
                                    <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                                </div>
                            </a>
                            <!-- <a href="terms" class="d-flex w-100 align-items-center border-bottom px-3 py-4">
                                <div class="left mr-3">
                                    <h6 class="font-weight-bold m-0 text-dark"><i class="feather-info bg-success text-white p-2 rounded-circle mr-2"></i> Term of use</h6>
                                </div>
                                <div class="right ml-auto">
                                    <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                                </div>
                            </a> -->
                            <a href="privacy" class="d-flex w-100 align-items-center px-3 py-4">
                                <div class="left mr-3">
                                    <h6 class="font-weight-bold m-0 text-dark"><i class="feather-lock bg-warning text-white p-2 rounded-circle mr-2"></i> Privacy policy</h6>
                                </div>
                                <div class="right ml-auto">
                                    <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mb-3">
                    <div class="rounded shadow-sm p-4 bg-white">
                        <h5 class="mb-4">My account</h5>
                        <div id="edit_profile">
                            <div>
                                <form v-if="profileData != null" action="my_account.html">
                                    <div class="form-group">
                                        <label for="exampleInputName1">First Name</label>
                                        <input type="text" disabled class="form-control" id="exampleInputName1d" :value=" profileData.data.name ">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNumber1">Mobile Number</label>
                                        <input type="number" disabled class="form-control" id="exampleInputNumber1" :value="profileData.data.phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" disabled class="form-control" id="exampleInputEmail1" :value="profileData.data.email_id">
                                    </div>
                                    <!-- <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                                    </div> -->
                                </form>
                            </div>
                            <!-- <div class="additional">
                                <div class="change_password my-3">
                                    <a href="forgot-password" class="p-3 border rounded bg-white btn d-flex align-items-center">Change Password
                              <i class="feather-arrow-right ml-auto"></i></a>
                                </div>
                                <div class="deactivate_account">
                                    <a href="forgot-password" class="p-3 border rounded bg-white btn d-flex align-items-center">Deactivate Account
                              <i class="feather-arrow-right ml-auto"></i></a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
</template>
<script>
    import { data } from 'jquery'
    import VueSession from 'vue-session'
    Vue.use(VueSession)
    export default {
        mounted() {
            this.userID();
            var currentUrl = window.location.pathname;
        },
        data(){
            return{
                userId : null,
                isVisible:false,
                profileData :null,
            }
        },
        methods: {
            userID(){
                if(this.$session.exists()){
                    let sessionValues = this.$session.getAll();
                    this.userId = sessionValues.id;
                    this.userInfo();
                }
            },
            userInfo(){
                if(this.$session.exists()){
                    this.isVisible = true;
                    let sessionValues = this.$session.getAll();
                    this.userId = sessionValues.id;
                    axios.post('https://backend.ozfoodz.com.au/api/user-Info',{
                        user_id : sessionValues.id,
                    }).then((response) => {
                        this.profileData = response.data;
                        this.isVisible =false;
                    })
                    .catch((error) => {
                        console.error(error);
                        this.isVisible =false;
                    });
                }

            },
        }
    }
</script>
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


