<template>
    <div class="container">
        <div class="osahan-checkout">
        <div class="d-none">
            <div class="bg-primary border-bottom p-3 d-flex align-items-center">
                <a class="toggle togglew toggle-2" href="#"><span></span></a>
                <h4 class="font-weight-bold m-0 text-white">Checkout</h4>
            </div>
        </div>
        <!-- checkout -->
        <div class="container position-relative">
            <div class="py-5 row">
                <div class="col-md-8 mb-3">
                    <div>
                    <div class="accordion mb-3 rounded shadow-sm bg-white overflow-hidden" id="accordionExample">
                            <div class="osahan-card bg-white border-bottom overflow-hidden">
                                <div class="osahan-card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="d-flex p-3 align-items-center btn btn-link w-100" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                 <i class="feather-globe mr-3"></i> Login or Signup
                                 <i class="feather-chevron-down ml-auto"></i>
                                 </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="osahan-card-body border-top p-3">
                                        <form>
                                            <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                                <label class="btn btn-outline-secondary active">
                                                <input @click="login = true , signup=false" type="radio" name="options" id="option1" checked> Login
                                                </label>
                                                <label class="btn btn-outline-secondary">
                                                <input @click="login = false , signup=true" type="radio" name="options" id="option2"> Signup
                                                </label>
                                            </div>
                                            <hr>
                                            <div v-show="signup" class="form-row">
                                                <div class="col-md-12 form-group mb-0">
                                                   <form class="">

                                                        <div class="form-row">
                                                        <div class="col-md-12">
                                                            <p v-if="signupErrors.length">
                                                            <b class="text-danger">Please correct the following errors:</b>
                                                                <ul >
                                                                    <li class="text-danger" v-for="signupErrors in signupErrors" :key="signupErrors.id">{{ signupErrors }}</li>
                                                                </ul>
                                                            </p>
                                                        </div>
                                                            <div class="col-md-6 form-group">
                                                                <label class="form-label">Name</label>
                                                                <input placeholder="Enter Name..." v-model="name" type="text" class="form-control">
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                                <label class="form-label">Email</label>
                                                                <input placeholder="Enter Email..." v-model="email" type="email" class="form-control">
                                                            </div>
                                                            <!-- <div class="col-md-6 form-group">
                                                                <label class="form-label">Phone Code</label>
                                                                <input placeholder="Enter Phone Code..." type="number" class="form-control">
                                                            </div> -->
                                                            <div class="col-md-6 form-group">
                                                                <label class="form-label">Mobile  Number</label>
                                                                <input placeholder="Enter Mobile  Number..." v-model="mobileNumber" type="number" class="form-control">
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                                <label class="form-label">Password</label>
                                                                <input placeholder="Enter Password..." v-model="password" type="password" class="form-control">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <a class="btn btn-primary" @click="signup()"  href="#">Sign up</a>
                                                            </div>

                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                            <div v-show="login" v-if="LoginStatus == true" class="form-row">
                                                <div class="col-md-12 form-group mb-0">
                                                    <form class="">
                                                        <div class="form-row">
                                                        <div class="col-md-12">
                                                            <p v-if="loginErrors.length">
                                                            <b class="text-danger">Please correct the following errors:</b>
                                                                <ul >
                                                                    <li class="text-danger" v-for="loginErrors in loginErrors" :key="loginErrors.id">{{ loginErrors }}</li>
                                                                </ul>
                                                            </p>
                                                        </div>
                                                            <div class="col-md-6 form-group">
                                                                <label class="form-label">Email</label>
                                                                <input placeholder="Enter Email..." v-model="loginEmail" type="email" class="form-control">
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                                <label class="form-label">Password</label>
                                                                <input placeholder="Enter Password..." v-model="loginPassword" type="password" class="form-control">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <a class="btn btn-primary" @click="userlogin()" href="#">Login</a>
                                                            </div>

                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="osahan-cart-item mb-3 rounded shadow-sm bg-white overflow-hidden">
                            <div class="osahan-cart-item-profile bg-white p-3">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 font-weight-bold">Delivery Address</h6>
                                    <div class="row">
                                        <div class="custom-control col-lg-6 custom-radio mb-3 position-relative border-custom-radio">
                                            <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" checked>
                                            <label class="custom-control-label w-100" for="customRadioInline1">
                                       <div>
                                          <div class="p-3 bg-white rounded shadow-sm w-100">
                                             <div class="d-flex align-items-center mb-2">
                                                <h6 class="mb-0">Home</h6>
                                                <p class="mb-0 badge badge-success ml-auto"><i class="icofont-check-circled"></i> Default</p>
                                             </div>
                                             <p class="small text-muted m-0">1001 Veterans Blvd</p>
                                             <p class="small text-muted m-0">Redwood City, CA 94063</p>
                                          </div>
                                          <a href="#"  data-toggle="modal" data-target="#exampleModal" class="btn btn-block btn-light border-top">Edit</a>
                                       </div>
                                    </label>
                                        </div>
                                        <div class="custom-control col-lg-6 custom-radio position-relative border-custom-radio">
                                            <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                                            <label class="custom-control-label w-100" for="customRadioInline2">
                                       <div>
                                          <div class="p-3 rounded bg-white shadow-sm w-100">
                                             <div class="d-flex align-items-center mb-2">
                                                <h6 class="mb-0">Work</h6>
                                                <p class="mb-0 badge badge-light ml-auto"><i class="icofont-check-circled"></i> Select</p>
                                             </div>
                                             <p class="small text-muted m-0">Model Town, Ludhiana</p>
                                             <p class="small text-muted m-0">Punjab 141002, India</p>
                                          </div>
                                          <a href="#"  data-toggle="modal" data-target="#exampleModal" class="btn btn-block btn-light border-top">Edit</a>
                                       </div>
                                    </label>
                                        </div>
                                    </div>
                                    <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#exampleModal"> ADD NEW ADDRESS </a>
                                </div>
                            </div>
                        </div>
                        <div class="accordion mb-3 rounded shadow-sm bg-white overflow-hidden" id="accordionExample">
                            <div class="osahan-card bg-white border-bottom overflow-hidden">
                                <div class="osahan-card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="d-flex p-3 align-items-center btn btn-link w-100" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                 <i class="feather-credit-card mr-3"></i> Credit/Debit Card
                                 <i class="feather-chevron-down ml-auto"></i>
                                 </button>
                                    </h2>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="osahan-card-body border-top p-3">
                                        <h6 class="m-0">Add new card</h6>
                                        <p class="small">WE ACCEPT <span class="osahan-card ml-2 font-weight-bold">( Master Card / Visa Card / Rupay )</span></p>
                                        <form>
                                            <div class="form-row">
                                                <div class="col-md-12 form-group">
                                                    <label class="form-label font-weight-bold small">Card number</label>
                                                    <div class="input-group">
                                                        <input placeholder="Card number" type="number" class="form-control">
                                                        <div class="input-group-append"><button type="button" class="btn btn-outline-secondary"><i class="feather-credit-card"></i></button></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 form-group"><label class="form-label font-weight-bold small">Valid through(MM/YY)</label><input placeholder="Enter Valid through(MM/YY)" type="number" class="form-control"></div>
                                                <div class="col-md-4 form-group"><label class="form-label font-weight-bold small">CVV</label><input placeholder="Enter CVV Number" type="number" class="form-control"></div>
                                                <div class="col-md-12 form-group"><label class="form-label font-weight-bold small">Name on card</label><input placeholder="Enter Card number" type="text" class="form-control"></div>
                                                <div class="col-md-12 form-group mb-0">
                                                    <div class="custom-control custom-checkbox"><input type="checkbox" id="custom-checkbox1" class="custom-control-input"><label title="" type="checkbox" for="custom-checkbox1" class="custom-control-label small pt-1">Securely save this card for a faster checkout next time.</label></div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="osahan-card bg-white overflow-hidden">
                                <div class="osahan-card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="d-flex p-3 align-items-center btn btn-link w-100" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                 <i class="feather-dollar-sign mr-3"></i> Cash on Delivery
                                 <i class="feather-chevron-down ml-auto"></i>
                                 </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body border-top">
                                        <h6 class="mb-3 mt-0 mb-3 font-weight-bold">Cash</h6>
                                        <p class="m-0">Please keep exact change handy to help us serve you better</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="osahan-cart-item rounded rounded shadow-sm overflow-hidden bg-white sticky_sidebar">
                        <div class="d-flex border-bottom osahan-cart-item-profile bg-white p-3">
                            <img alt="osahan" v-bind:src=" vendor.data.vendor.image" style="width:50px;" class="mr-1 rounded-circle img-fluid">
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 font-weight-bold">{{vendor.data.vendor.name}}</h6>
                                <p class="mb-0 small text-muted"><i class="feather-map-pin"></i> {{vendor.data.vendor.address}}</p>
                            </div>
                        </div>
                        <div v-if="cartData != null" class="bg-white border-bottom py-2">
                            <div  v-for="cartData in cartData.data.cart" :key="cartData.id" class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                                <div class="media align-items-center">
                                    <div class="mr-2 text-danger" style="margin-bottom: 15px;">&middot;</div>
                                    <div class="media-body">
                                        <h6 class="mb-1">{{cartData.menu_name}}</h6>
                                        <p class="text-gray mb-0 ml-2 text-muted small">${{cartData.unit_price}}</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="count-number float-right"><button type="button" class="btn-sm left dec btn btn-outline-secondary" @click="minusQuantity(cartData.id)"> <i class="feather-minus"></i> </button><input class="count-number-input"  type="text" readonly="" :value="cartData.quantity"><button type="button" class="btn-sm right inc btn btn-outline-secondary" @click="addQuantity(cartData.id)"> <i class="feather-plus"></i> </button></span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-3 py-3 border-bottom clearfix">
                            <div class="input-group-sm mb-2 input-group">
                                <input placeholder="Enter promo code" type="text" class="form-control">
                                <div class="input-group-append"><button type="button" class="btn btn-primary"><i class="feather-percent"></i> APPLY</button></div>
                            </div>
                            <div class="mb-0 input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="feather-message-square"></i></span></div>
                                <textarea placeholder="Any suggestions? We will pass it on..." aria-label="With textarea" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="bg-white p-3 clearfix border-bottom">
                            <p class="mb-1">Item Total <span class="float-right text-dark">${{total}}</span></p>
                            <!-- <p class="mb-1">Restaurant Charges <span class="float-right text-dark">$62.8</span></p> -->
                            <!-- <p class="mb-1">Delivery Fee<span class="text-info ml-1"><i class="feather-info"></i></span><span class="float-right text-dark">$10</span></p> -->
                            <p class="mb-1 text-success">Total Discount<span class="float-right text-success">$0</span></p>
                            <hr>
                            <h6 class="font-weight-bold mb-0">TO PAY <span class="float-right">${{total}}</span></h6>
                        </div>
                        <div class="p-3">
                            <p v-if="errors.length">
                            <b class="text-danger">Please correct the following errors:</b>
                                <ul >
                                    <li class="text-danger" v-for="error in errors" :key="error.id">{{ error }}</li>
                                </ul>
                            </p>
                            <!-- <a class="btn btn-success btn-block btn-lg" href="successful">PAY ${{total}}<i class="feather-arrow-right"></i></a> -->
                            <a class="btn btn-success btn-block btn-lg" @click="payment()">PAY ${{total}}<i class="feather-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Delivery Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form class="">
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <label class="form-label">Delivery Area</label>
                                <div class="input-group">
                                    <input placeholder="Delivery Area" type="text" class="form-control">
                                    <div class="input-group-append"><button type="button" class="btn btn-outline-secondary"><i class="feather-map-pin"></i></button></div>
                                </div>
                            </div>
                            <div class="col-md-12 form-group"><label class="form-label">Complete Address</label><input placeholder="Complete Address e.g. house number, street name, landmark" type="text" class="form-control"></div>
                            <div class="col-md-12 form-group"><label class="form-label">Delivery Instructions</label><input placeholder="Delivery Instructions e.g. Opposite Gold Souk Mall" type="text" class="form-control"></div>
                            <div class="mb-0 col-md-12 form-group">
                                <label class="form-label">Nickname</label>
                                <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                    <label class="btn btn-outline-secondary active">
                              <input type="radio" name="options" id="option12" checked> Home
                              </label>
                                    <label class="btn btn-outline-secondary">
                              <input type="radio" name="options" id="option22"> Work
                              </label>
                                    <label class="btn btn-outline-secondary">
                              <input type="radio" name="options" id="option32"> Other
                              </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer p-0 border-0">
                    <div class="col-6 m-0 p-0">
                        <button type="button" class="btn border-top btn-lg btn-block" data-dismiss="modal">Close</button>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <button type="button" class="btn btn-primary btn-lg btn-block">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
export default {
  mounted() {
    this.setdata();
    this.cartDataa();
    this.getVendorDetails();
  },
  props: {
    cart_prop: String,
  },
  data() {
    return {
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
    // Signup
     signup:false,
     name:'',
     email:'',
     mobileNumber:'',
     password:'',

    };
  },
  methods: {
    setdata() {
      this.cartID = this.cart_prop;
    },
    cartDataa() {
      axios
        .get("http://ozpos.geekss.com.au/api/cartData/" + this.cartID)
        .then((response) => {
          this.cartData = response.data;
          this.total = 0.0;
          this.cartData.data.cart.forEach((cartData) => {
            this.total = this.total + cartData.price;
          });
          console.log(response.data);
        })
        .catch((error) => {
          console.error(error);
        });
    },
    addQuantity(cart_id) {
      axios
        .get("http://ozpos.geekss.com.au/api/addQuantity/" + cart_id)
        .then((response) => {
          this.cartDataa();
        })
        .catch((error) => {
          console.error(error);
        });
    },

    minusQuantity(cart_id) {
      axios
        .get("http://ozpos.geekss.com.au/api/minusQuantity/" + cart_id)
        .then((response) => {
          this.cartDataa();
        })
        .catch((error) => {
          console.error(error);
        });
    },
    getVendorDetails() {
      axios
        .get("http://ozpos.geekss.com.au/api/single_vendor/5")
        .then((response) => {
          this.vendor = response.data;
          this.vendor_id = response.data.data.vendor.id;
        })
        .catch((error) => {
          console.error(error);
        });
    },
    userlogin(){
        axios.post('http://ozpos.geekss.com.au/api/user_login',{
            email_id : this.loginEmail,
            password : this.loginPassword,
            provider : "LOCAL",
                }).then( (response) => {
                if (response.status == 200) {
                    this.loginErrors = [];
                    if(response.data.success == false){
                        this.loginErrors.push(response.data.message);
                        swal({
                            title: "Login UnSuccessfull!",
                            text: response.data.message,
                            icon: "error",
                            buttons: true,
                            timer: 3000
                        })
                    }else{
                        this.LoginStatus = false;
                        swal({
                            title: "Login Successfull!",
                            text: response.data.message,
                            icon: "success",
                            buttons: true,
                            timer: 3000
                        })
                    }
                    ;
                }else {
                    console.warn(response.data);
                }
                }).catch( (error)=> {
                    console.log( error.response.data.errors )
                    this.loginErrors = [];

                        if(error.response.data.errors.email_id){
                            this.loginErrors.push(error.response.data.errors.email_id);
                        }
                        if(error.response.data.errors.password){
                            this.loginErrors.push(error.response.data.errors.password);
                        };

            })
    },
    usersignup(){

    },
    payment() {
      this.errors = [];
      if ( this.LoginStatus == true) {
        this.errors.push("Please Login or Sign up.");
      }
      if (!this.userAddress) {
        this.errors.push("Please Add Delivery Address.");
      }
      if (!this.paymentMethod) {
        this.errors.push("Please Select Payment Method.");
      }
    },
  },
};
</script>
