<template>
    <div class="">
        <div v-if="isVisible" class="loader-overlay">
            <div class="loader"></div>
            <span class="text" style="font-size:smaller;">Please Wait</span>
        </div>
        <div class="osahan-signup login-page">
            <video loop autoplay muted id="vid">
                <source src="img/bg.mp4" type="video/mp4">
                <source src="img/bg.mp4" type="video/ogg">
                Your browser does not support the video tag.
            </video>
            <div class="d-flex align-items-center justify-content-center flex-column vh-100">
                <div class="px-5 col-md-6 ml-auto">
                    <div class="px-5 col-10 mx-auto">
                        <h2 class="text-dark my-0">Hello There.</h2>
                        <p class="text-50">Sign up to continue</p>
                        <!-- <form class="mt-5 mb-4" > -->
                            <div class="form-group">
                                <label for="exampleInputName1" class="text-dark">Name</label>
                                <input type="text" placeholder="Enter Name" v-model="name" class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNumber1" class="text-dark">Email</label>
                                <input type="email" placeholder="Enter Email"  v-model="email" class="form-control" id="exampleInputNumber1" aria-describedby="numberHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNumber1" class="text-dark">Phone Code</label>
                                <input type="number" placeholder="Enter Phone Code"  v-model="phoneCode" class="form-control" id="exampleInputNumber1" aria-describedby="numberHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNumber1" class="text-dark">Mobile Number</label>
                                <input type="number" placeholder="Enter Mobile Number"  v-model="number" class="form-control" id="exampleInputNumber1" aria-describedby="numberHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="text-dark">Password</label>
                                <input type="password" placeholder="Enter Password"  v-model="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="col-md-12">
                                <p v-if="loginErrors.length">
                                <b class="text-danger">Please correct the following errors:</b>
                                    <ul >
                                        <li class="text-danger" v-for="loginErrors in loginErrors" :key="loginErrors.id">{{ loginErrors }}</li>
                                    </ul>
                                </p>
                            </div>
                            <button @click="signups()" class="btn btn-primary btn-lg btn-block">
                            SIGN UP
                            </button>
                            <!-- <div class="py-2">
                                <button class="btn btn-facebook btn-lg btn-block"><i class="feather-facebook"></i> Connect with Facebook</button>
                            </div> -->
                        <!-- </form> -->
                    </div>
                    <div class="new-acc d-flex align-items-center justify-content-center">
                        <a href="user-login">
                            <p class="text-center m-0">Already an account? Sign in</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                name:null,
                email:null,
                password:null,
                number:null,
                phoneCode:null,
                loginErrors:[],
                isVisible:false,
            };
        },
         methods: {
            signups() {
                    this.isVisible =true;
        axios.post('https://backend.ozfoodz.com.au/api/user_register_vuejs',{
            email_id : this.loginEmail,
            password : this.loginPassword,
            provider : "LOCAL",
                }).then( (response) => {
                if (response.status == 200) {
                    this.isVisible =false;
                    this.loginErrors = [];
                    if(response.data.success == false){
                        this.isVisible =false;
                        if(response.data.data.name){
                            this.loginErrors.push(response.data.data.name);
                        };
                        if(response.data.data.email){
                            this.loginErrors.push(response.data.data.email);
                        }
                        if(response.data.data.password){
                            this.loginErrors.push(response.data.data.password);
                        };
                        if(response.data.data.phone_code){
                            this.loginErrors.push(response.data.data.phone_code);
                        }
                        if(response.data.data.phone){
                            this.loginErrors.push(response.data.data.phone);
                        };
                    }else{
                        this.$session.start()
                        this.$session.set('token', response.data.data.token)
                        this.$session.set('id', response.data.data.id)
                        this.isVisible =false;
                        this.LoginStatus = false;
                        this.loginID =response.data.data.id;
                        this.loginUserName = response.data.data.name;
                        this.reloadPage();
                    };
                }else {
                    this.isVisible =false;
                    console.warn(response.data);
                }
                }).catch( (error)=> {
                   this.isVisible =false;
                    this.loginErrors = [];

                        if(response.data.data.email){
                            this.loginErrors.push(response.data.data.email_id);
                        }
                        if(response.data.data.password){
                            this.loginErrors.push(response.data.data.password);
                        };
                     this.isVisible =false;
            })
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
