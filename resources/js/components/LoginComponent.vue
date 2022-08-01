<template>
    <div class="">
        <div v-if="isVisible" class="loader-overlay">
            <div class="loader"></div>
            <span class="text" style="font-size:smaller;">Please Wait</span>
        </div>
        <div class="login-page vh-100">
        <video loop autoplay muted id="vid">
            <source src="img/bg.mp4" type="video/mp4">
            <source src="img/bg.mp4" type="video/ogg">
            Your browser does not support the video tag.
         </video>
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="px-5 col-md-6 ml-auto">
                <div class="px-5 col-10 mx-auto">
                    <h2 class="text-dark my-0">Welcome Back</h2>
                    <p class="text-50">Sign in to continue</p>
                    <!-- <form class="mt-5 mb-4"> -->
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-dark">Email</label>
                            <input type="email" v-model="loginEmail" placeholder="Enter Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-dark">Password</label>
                            <input type="password" v-model="loginPassword" placeholder="Enter Password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="col-md-12">
                            <p v-if="loginErrors.length">
                            <b class="text-danger">Please correct the following errors:</b>
                                <ul >
                                    <li class="text-danger" v-for="loginErrors in loginErrors" :key="loginErrors.id">{{ loginErrors }}</li>
                                </ul>
                            </p>
                        </div>
                        <button @click="userlogin()" class="btn btn-primary btn-lg btn-block">SIGN IN</button>
                        <div class="py-2">
                            <button class="btn btn-lg btn-facebook btn-block"><i class="feather-facebook"></i> Connect with Facebook</button>
                        </div>
                    <!-- </form> -->
                    <a href="forgot-password" class="text-decoration-none">
                        <p class="text-center">Forgot your password?</p>
                    </a>
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="user-register">
                            <p class="text-center m-0">Don't have an account? Sign up</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>


<script>
import {gmapApi} from 'vue2-google-maps'
 import VueGoogleAutocomplete from "vue-google-autocomplete";
 import facebookLogin from 'facebook-login-vuejs';
 import GoogleLogin from 'vue-google-login';
export default {
    computed: {
			google: gmapApi,
        },
  mounted() {

                if(this.$session.exists()){
                    let sessionValues = this.$session.getAll();
                    this.loginID = sessionValues.id;
                    this.LoginStatus = false;
                }
  },
  data() {
    return {
        params: {
                    client_id: "204982008455-k8oi8lc62fkqmf39rtgk6kd5gajuvo61.apps.googleusercontent.com",
                    // client_secret:"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",
                },
                // only needed if you want to render the button with the google ui
                renderParams: {
                    width: 250,
                    height: 50,
                    longtitle: true
                },
      promo:null,
      promoErrors:[],
      address: "",
      currentPlace:null,
      errors: [],
      loginErrors:[],
      signupErrors:[],
      cartID: null,
      cartData: "",
      vendor: "",
      vendor_id: "",
      total: "",
      paymentMethod: null,
      userAddress: null,
    //   login
      login:true,
      loginEmail:'',
      loginPassword:'',
      LoginStatus:true,
      loginID:'',
      loginUserName:'',
    // Signup
      signup:false,
      name:'',
      email:'',
      mobileNumber:'',
      password:'',
    // delivery adress
      deliveryAdress:'',
      deliveryType:'',
      existingAddress:'',
      cashOnDelivery:false,
      credit:false,
    // payment
      cardNumber:'',
      cvv:'',
      month:'',
      year:'',
      cardName:'',
    //   date
        date:'',
        time:'',
        submitBtn:true,
        orderBtn:false,
        isVisible:false,
        coordinates:null,
         markers: [],
         mapPostitions:'',
         lat:'',
         long:'',
         fullAddress:'',
         pickup:false,
         delivery:true,
         method:'',
         addressLat:'',
         addressLang:'',
         address_id:'',
         cartSession:'',
         disocuntPercentage :null,
         disconutAmount :null,
         calculateDiscount:null,
    };
  },
   components: {facebookLogin, GoogleLogin },
  methods: {
    reloadPage() {
      window.location.href = '/';
    },
    userlogin(){
        this.isVisible =true;
        axios.post('https://backend.ozfoodz.com.au/api/user_login',{
            email_id : this.loginEmail,
            password : this.loginPassword,
            provider : "LOCAL",
                }).then( (response) => {
                if (response.status == 200) {
                    this.isVisible =false;
                    this.loginErrors = [];
                    if(response.data.success == false){
                        this.isVisible =false;
                        this.loginErrors.push(response.data.message);

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

                        if(error.response.data.errors.email_id){
                            this.loginErrors.push(error.response.data.errors.email_id);
                        }
                        if(error.response.data.errors.password){
                            this.loginErrors.push(error.response.data.errors.password);
                        };
                     this.isVisible =false;
            })
    },
    usersignup(){
    },
    facebooklogin(){
       axios
        .get("https://backend.ozfoodz.com.au/api/auth/facebook")
        .then((response) => {
        })
        .catch((error) => {
          console.error(error);
        });
    },
    googlelogin(){
        axios
        .get("https://backend.ozfoodz.com.au/api/auth/google")
        .then((response) => {
            console.log(response);
        })
        .catch((error) => {
          console.log(error.message);
        });
    },
     onSuccess(googleUser) {
        console.log('success apis');
            console.log(googleUser);

            // This only gets the user information: id, name, imageUrl and email
            console.log(googleUser.getBasicProfile());
        },
        onFailure(googleUser){
            console.log('failure apis');
        console.log(googleUser);
        },
        getUserData(facebook){
            console.log(facebook);
        }
},
};
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

