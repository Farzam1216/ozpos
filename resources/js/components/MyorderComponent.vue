<template>
    <div class="container">
        <div v-if="isVisible" class="loader-overlay">
                <div class="loader"></div>
                <span class="text">Please Wait</span>
        </div>
        <div class="d-none">
        <div class="bg-primary border-bottom p-3 d-flex align-items-center">
            <a class="toggle togglew toggle-2" href="#"><span></span></a>
            <h4 class="font-weight-bold m-0 text-white">My Order</h4>
        </div>
    </div>
    <section class="py-4 osahan-main-body">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <ul class="nav nav-tabsa custom-tabsa border-0 flex-column bg-white rounded overflow-hidden shadow-sm p-2 c-t-order" id="myTab" role="tablist">
                        <li class="nav-item border-top" role="presentation">
                            <a class="nav-link border-0 text-dark py-3 active" @click="allOrders()" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="true">
                                <i class="feather-truck mr-2 text-danger mb-0"></i> All Orders</a>
                        </li>
                        <li class="nav-item border-top" role="presentation">
                            <a class="nav-link border-0 text-dark py-3" @click="approvess()" id="canceled-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="canceled" aria-selected="false">
                                <i class="feather-truck mr-2 text-danger mb-0"></i> Approved</a>
                        </li>
                        <li class="nav-item border-top" role="presentation">
                            <a class="nav-link border-0 text-dark py-3" @click="pendings()" id="canceled-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="canceled" aria-selected="false">
                                <i class="feather-truck mr-2 text-danger mb-0"></i> Pending</a>
                        </li>

                        <li class="nav-item border-top" role="presentation">
                            <a class="nav-link border-0 text-dark py-3" @click="preparings()"  id="progress-tab" data-toggle="tab" href="#preparing" role="tab" aria-controls="progress" aria-selected="false">
                                <i class="feather-clock mr-2 text-warning mb-0"></i> Preparing Food</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link border-0 text-dark py-3 " @click="completeds()" id="completeds-tab" data-toggle="tab" href="#completeds" role="tab" aria-controls="completeds" aria-selected="true">
                                <i class="feather-check mr-2 text-success mb-0"></i> Completed</a>
                        </li>
                        <li class="nav-item border-top" role="presentation">
                            <a class="nav-link border-0 text-dark py-3" @click="readys()" id="progress-tab" data-toggle="tab" href="#ready" role="tab" aria-controls="progress" aria-selected="false">
                                <i class="feather-watch mr-2 text-success mb-0"></i> Ready To Pickup</a>
                        </li>
                        <li class="nav-item border-top" role="presentation">
                            <a class="nav-link border-0 text-dark py-3" @click="picked()" id="progress-tab" data-toggle="tab" href="#picked" role="tab" aria-controls="progress" aria-selected="false">
                                <i class="feather-watch mr-2 text-success mb-0"></i> Picked By Driver</a>
                        </li>
                        <li class="nav-item border-top" role="presentation">
                            <a class="nav-link border-0 text-dark py-3" @click="delivereds()" id="canceled-tab" data-toggle="tab" href="#deliver" role="tab" aria-controls="canceled" aria-selected="false">
                                <i class="feather-send mr-2 text-danger mb-0"></i> Delivered</a>
                        </li>
                        <li class="nav-item border-top" role="presentation">
                            <a class="nav-link border-0 text-dark py-3" @click="cancels()" id="canceled-tab" data-toggle="tab" href="#canceled" role="tab" aria-controls="canceled" aria-selected="false">
                                <i class="feather-x-circle mr-2 text-danger mb-0"></i> Canceled</a>
                        </li>
                        <li class="nav-item border-top" role="presentation">
                            <a class="nav-link border-0 text-dark py-3" @click="rejects()" id="canceled-tab" data-toggle="tab" href="#rejects" role="tab" aria-controls="canceled" aria-selected="false">
                                <i class="feather-x mr-2 text-danger mb-0"></i> Reject</a>
                        </li>

                    </ul>
                </div>
                <div class="tab-content col-md-9" id="myTabContent">
                    <div v-for="orderData in orderData.data" :key='orderData.id' class="tab-pane fade show active" id="completed" role="tabpanel" aria-labelledby="completed-tab">


                        <div  v-if="orderData.order_status == 'PENDING' && pending == true"  class="order-body">
                            <div class="pb-3">
                                <div class="p-3 rounded shadow-sm bg-white">
                                    <div class="d-flex border-bottom pb-3">
                                        <div class="text-muted mr-3">
                                            <img alt="#" :src="orderData.vendor.image" class="img-fluid order_img rounded">
                                        </div>
                                        <div>
                                            <p class="mb-0 font-weight-bold"><a href="#" class="text-dark">{{orderData.vendor.name}}</a></p>
                                            <p class="mb-0">{{orderData.vendor.address}}</p>
                                            <p>ORDER {{orderData.order_id}}</p>
                                            <!-- <p class="mb-0 small"><a href="#">View Details</a></p> -->
                                        </div>
                                        <div class="ml-auto">
                                            <p class="bg-success text-white py-1 px-2 rounded small mb-1">{{orderData.order_status}}</p>
                                            <p class="small font-weight-bold text-center"><i class="feather-clock"></i> {{orderData.time}} {{orderData.date}}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex pt-3">
                                        <div class="small">
                                            <p v-for="items in orderData.orderItems" :key="items.id" class="text- font-weight-bold mb-0">{{ items.item_name }} x {{items.qty}}</p>
                                        </div>
                                        <div class="text-muted m-0 ml-auto mr-3 small"><br>
                                            <!-- <span class="text-dark font-weight-bold">${{orderData.sub_total}}</span> -->
                                        </div>
                                        <div class="text-right">
                                            <a href="" class="btn btn-primary px-3">Total Payment</a>
                                            <a href="" class="btn btn-outline-primary px-3">${{orderData.sub_total}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  v-if="orderData.order_status == 'PREPARING FOOD' && preparing == true" class="order-body">
                            <div class="pb-3">
                                <div class="p-3 rounded shadow-sm bg-white">
                                    <div class="d-flex border-bottom pb-3">
                                        <div class="text-muted mr-3">
                                            <img alt="#" :src="orderData.vendor.image" class="img-fluid order_img rounded">
                                        </div>
                                        <div>
                                            <p class="mb-0 font-weight-bold"><a href="#" class="text-dark">{{orderData.vendor.name}}</a></p>
                                            <p class="mb-0">{{orderData.vendor.address}}</p>
                                            <p>ORDER {{orderData.order_id}}</p>
                                            <!-- <p class="mb-0 small"><a href="#">View Details</a></p> -->
                                        </div>
                                        <div class="ml-auto">
                                            <p class="bg-success text-white py-1 px-2 rounded small mb-1">{{orderData.order_status}}</p>
                                            <p class="small font-weight-bold text-center"><i class="feather-clock"></i> {{orderData.time}} {{orderData.date}}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex pt-3">
                                        <div class="small">
                                            <p v-for="items in orderData.orderItems" :key="items.id" class="text- font-weight-bold mb-0">{{ items.item_name }} x {{items.qty}}</p>
                                        </div>
                                        <div class="text-muted m-0 ml-auto mr-3 small"><br>
                                            <!-- <span class="text-dark font-weight-bold">${{orderData.sub_total}}</span> -->
                                        </div>
                                        <div class="text-right">
                                            <a href="" class="btn btn-primary px-3">Total Payment</a>
                                            <a href="" class="btn btn-outline-primary px-3">${{orderData.sub_total}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  v-if="orderData.order_status == 'COMPLETE' && completed == true" class="order-body">
                            <div class="pb-3">
                                <div class="p-3 rounded shadow-sm bg-white">
                                    <div class="d-flex border-bottom pb-3">
                                        <div class="text-muted mr-3">
                                            <img alt="#" :src="orderData.vendor.image" class="img-fluid order_img rounded">
                                        </div>
                                        <div>
                                            <p class="mb-0 font-weight-bold"><a href="#" class="text-dark">{{orderData.vendor.name}}</a></p>
                                            <p class="mb-0">{{orderData.vendor.address}}</p>
                                            <p>ORDER {{orderData.order_id}}</p>
                                            <!-- <p class="mb-0 small"><a href="#">View Details</a></p> -->
                                        </div>
                                        <div class="ml-auto">
                                            <p class="bg-success text-white py-1 px-2 rounded small mb-1">{{orderData.order_status}}</p>
                                            <p class="small font-weight-bold text-center"><i class="feather-clock"></i> {{orderData.time}} {{orderData.date}}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex pt-3">
                                        <div class="small">
                                            <p v-for="items in orderData.orderItems" :key="items.id" class="text- font-weight-bold mb-0">{{ items.item_name }} x {{items.qty}}</p>
                                        </div>
                                        <div class="text-muted m-0 ml-auto mr-3 small"><br>
                                            <!-- <span class="text-dark font-weight-bold">${{orderData.sub_total}}</span> -->
                                        </div>
                                        <div class="text-right">
                                            <a href="" class="btn btn-primary px-3">Total Payment</a>
                                            <a href="" class="btn btn-outline-primary px-3">${{orderData.sub_total}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  v-if="orderData.order_status == 'DELIVERED' && deliver == true" class="order-body">
                            <div class="pb-3">
                                <div class="p-3 rounded shadow-sm bg-white">
                                    <div class="d-flex border-bottom pb-3">
                                        <div class="text-muted mr-3">
                                            <img alt="#" :src="orderData.vendor.image" class="img-fluid order_img rounded">
                                        </div>
                                        <div>
                                            <p class="mb-0 font-weight-bold"><a href="#" class="text-dark">{{orderData.vendor.name}}</a></p>
                                            <p class="mb-0">{{orderData.vendor.address}}</p>
                                            <p>ORDER {{orderData.order_id}}</p>
                                            <!-- <p class="mb-0 small"><a href="#">View Details</a></p> -->
                                        </div>
                                        <div class="ml-auto">
                                            <p class="bg-success text-white py-1 px-2 rounded small mb-1">{{orderData.order_status}}</p>
                                            <p class="small font-weight-bold text-center"><i class="feather-clock"></i> {{orderData.time}} {{orderData.date}}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex pt-3">
                                        <div class="small">
                                            <p v-for="items in orderData.orderItems" :key="items.id" class="text- font-weight-bold mb-0">{{ items.item_name }} x {{items.qty}}</p>
                                        </div>
                                        <div class="text-muted m-0 ml-auto mr-3 small"><br>
                                            <!-- <span class="text-dark font-weight-bold">${{orderData.sub_total}}</span> -->
                                        </div>
                                        <div class="text-right">
                                            <a href="" class="btn btn-primary px-3">Total Payment</a>
                                            <a href="" class="btn btn-outline-primary px-3">${{orderData.sub_total}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  v-if="orderData.order_status == 'READY TO PICKUP' && ready == true" class="order-body">
                            <div class="pb-3">
                                <div class="p-3 rounded shadow-sm bg-white">
                                    <div class="d-flex border-bottom pb-3">
                                        <div class="text-muted mr-3">
                                            <img alt="#" :src="orderData.vendor.image" class="img-fluid order_img rounded">
                                        </div>
                                        <div>
                                            <p class="mb-0 font-weight-bold"><a href="#" class="text-dark">{{orderData.vendor.name}}</a></p>
                                            <p class="mb-0">{{orderData.vendor.address}}</p>
                                            <p>ORDER {{orderData.order_id}}</p>
                                            <!-- <p class="mb-0 small"><a href="#">View Details</a></p> -->
                                        </div>
                                        <div class="ml-auto">
                                            <p class="bg-success text-white py-1 px-2 rounded small mb-1">{{orderData.order_status}}</p>
                                            <p class="small font-weight-bold text-center"><i class="feather-clock"></i> {{orderData.time}} {{orderData.date}}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex pt-3">
                                        <div class="small">
                                            <p v-for="items in orderData.orderItems" :key="items.id" class="text- font-weight-bold mb-0">{{ items.item_name }} x {{items.qty}}</p>
                                        </div>
                                        <div class="text-muted m-0 ml-auto mr-3 small"><br>
                                            <!-- <span class="text-dark font-weight-bold">${{orderData.sub_total}}</span> -->
                                        </div>
                                        <div class="text-right">
                                            <a href="" class="btn btn-primary px-3">Total Payment</a>
                                            <a href="" class="btn btn-outline-primary px-3">${{orderData.sub_total}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  v-if="orderData.order_status == 'CANCEL' && cancel == true" class="order-body">
                            <div class="pb-3">
                                <div class="p-3 rounded shadow-sm bg-white">
                                    <div class="d-flex border-bottom pb-3">
                                        <div class="text-muted mr-3">
                                            <img alt="#" :src="orderData.vendor.image" class="img-fluid order_img rounded">
                                        </div>
                                        <div>
                                            <p class="mb-0 font-weight-bold"><a href="#" class="text-dark">{{orderData.vendor.name}}</a></p>
                                            <p class="mb-0">{{orderData.vendor.address}}</p>
                                            <p>ORDER {{orderData.order_id}}</p>
                                            <!-- <p class="mb-0 small"><a href="#">View Details</a></p> -->
                                        </div>
                                        <div class="ml-auto">
                                            <p class="bg-success text-white py-1 px-2 rounded small mb-1">{{orderData.order_status}}</p>
                                            <p class="small font-weight-bold text-center"><i class="feather-clock"></i> {{orderData.time}} {{orderData.date}}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex pt-3">
                                        <div class="small">
                                            <p v-for="items in orderData.orderItems" :key="items.id" class="text- font-weight-bold mb-0">{{ items.item_name }} x {{items.qty}}</p>
                                        </div>
                                        <div class="text-muted m-0 ml-auto mr-3 small"><br>
                                            <!-- <span class="text-dark font-weight-bold">${{orderData.sub_total}}</span> -->
                                        </div>
                                        <div class="text-right">
                                            <a href="" class="btn btn-primary px-3">Total Payment</a>
                                            <a href="" class="btn btn-outline-primary px-3">${{orderData.sub_total}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  v-if="orderData.order_status == 'REJECT' && reject == true" class="order-body">
                            <div class="pb-3">
                                <div class="p-3 rounded shadow-sm bg-white">
                                    <div class="d-flex border-bottom pb-3">
                                        <div class="text-muted mr-3">
                                            <img alt="#" :src="orderData.vendor.image" class="img-fluid order_img rounded">
                                        </div>
                                        <div>
                                            <p class="mb-0 font-weight-bold"><a href="#" class="text-dark">{{orderData.vendor.name}}</a></p>
                                            <p class="mb-0">{{orderData.vendor.address}}</p>
                                            <p>ORDER {{orderData.order_id}}</p>
                                            <!-- <p class="mb-0 small"><a href="#">View Details</a></p> -->
                                        </div>
                                        <div class="ml-auto">
                                            <p class="bg-success text-white py-1 px-2 rounded small mb-1">{{orderData.order_status}}</p>
                                            <p class="small font-weight-bold text-center"><i class="feather-clock"></i> {{orderData.time}} {{orderData.date}}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex pt-3">
                                        <div class="small">
                                            <p v-for="items in orderData.orderItems" :key="items.id" class="text- font-weight-bold mb-0">{{ items.item_name }} x {{items.qty}}</p>
                                        </div>
                                        <div class="text-muted m-0 ml-auto mr-3 small"><br>
                                            <!-- <span class="text-dark font-weight-bold">${{orderData.sub_total}}</span> -->
                                        </div>
                                        <div class="text-right">
                                            <a href="" class="btn btn-primary px-3">Total Payment</a>
                                            <a href="" class="btn btn-outline-primary px-3">${{orderData.sub_total}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  v-if="orderData.order_status == 'PICKUP' && pickedByDriver == true" class="order-body">
                            <div class="pb-3">
                                <div class="p-3 rounded shadow-sm bg-white">
                                    <div class="d-flex border-bottom pb-3">
                                        <div class="text-muted mr-3">
                                            <img alt="#" :src="orderData.vendor.image" class="img-fluid order_img rounded">
                                        </div>
                                        <div>
                                            <p class="mb-0 font-weight-bold"><a href="#" class="text-dark">{{orderData.vendor.name}}</a></p>
                                            <p class="mb-0">{{orderData.vendor.address}}</p>
                                            <p>ORDER {{orderData.order_id}}</p>
                                            <!-- <p class="mb-0 small"><a href="#">View Details</a></p> -->
                                        </div>
                                        <div class="ml-auto">
                                            <p class="bg-success text-white py-1 px-2 rounded small mb-1">{{orderData.order_status}}</p>
                                            <p class="small font-weight-bold text-center"><i class="feather-clock"></i> {{orderData.time}} {{orderData.date}}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex pt-3">
                                        <div class="small">
                                            <p v-for="items in orderData.orderItems" :key="items.id" class="text- font-weight-bold mb-0">{{ items.item_name }} x {{items.qty}}</p>
                                        </div>
                                        <div class="text-muted m-0 ml-auto mr-3 small">Total Payment<br>
                                            <span class="text-dark font-weight-bold">${{orderData.sub_total}}</span>
                                        </div>
                                        <div class="text-right">
                                            <a :href="'/track/' + orderData.id" class="btn btn-primary px-3">Track On Map</a>
                                            <!-- <a href="contact-us.html" class="btn btn-outline-primary px-3">Help</a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  v-if=" all == true" class="order-body">
                            <div class="pb-3">
                                <div class="p-3 rounded shadow-sm bg-white">
                                    <div class="d-flex border-bottom pb-3">
                                        <div class="text-muted mr-3">
                                            <img alt="#" :src="orderData.vendor.image" class="img-fluid order_img rounded">
                                        </div>
                                        <div>
                                            <p class="mb-0 font-weight-bold"><a href="#" class="text-dark">{{orderData.vendor.name}}</a></p>
                                            <p class="mb-0">{{orderData.vendor.address}}</p>
                                            <p>ORDER {{orderData.order_id}}</p>
                                            <!-- <p class="mb-0 small"><a href="#">View Details</a></p> -->
                                        </div>
                                        <div class="ml-auto">
                                            <p class="bg-success text-white py-1 px-2 rounded small mb-1">{{orderData.order_status}}</p>
                                            <p class="small font-weight-bold text-center"><i class="feather-clock"></i> {{orderData.time}} {{orderData.date}}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex pt-3">
                                        <div class="small">
                                            <p v-for="items in orderData.orderItems" :key="items.id" class="text- font-weight-bold mb-0">{{ items.item_name }} x {{items.qty}}</p>
                                        </div>
                                        <div class="text-muted m-0 ml-auto mr-3 small">Total Payment<br>
                                            <span class="text-dark font-weight-bold">${{orderData.sub_total}}</span>
                                        </div>
                                        <div class="text-right">
                                            <a href="" class="btn btn-primary px-3">Total Payment</a>
                                            <a href="" class="btn btn-outline-primary px-3">${{orderData.sub_total}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  v-if="orderData.order_status == 'APPROVE' && approves == true" class="order-body">
                            <div class="pb-3">
                                <div class="p-3 rounded shadow-sm bg-white">
                                    <div class="d-flex border-bottom pb-3">
                                        <div class="text-muted mr-3">
                                            <img alt="#" :src="orderData.vendor.image" class="img-fluid order_img rounded">
                                        </div>
                                        <div>
                                            <p class="mb-0 font-weight-bold"><a href="#" class="text-dark">{{orderData.vendor.name}}</a></p>
                                            <p class="mb-0">{{orderData.vendor.address}}</p>
                                            <p>ORDER {{orderData.order_id}}</p>
                                            <!-- <p class="mb-0 small"><a href="#">View Details</a></p> -->
                                        </div>
                                        <div class="ml-auto">
                                            <p class="bg-success text-white py-1 px-2 rounded small mb-1">{{orderData.order_status}}</p>
                                            <p class="small font-weight-bold text-center"><i class="feather-clock"></i> {{orderData.time}} {{orderData.date}}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex pt-3">
                                        <div class="small">
                                            <p v-for="items in orderData.orderItems" :key="items.id" class="text- font-weight-bold mb-0">{{ items.item_name }} x {{items.qty}}</p>
                                        </div>
                                        <div class="text-muted m-0 ml-auto mr-3 small"><br>
                                            <!-- <span class="text-dark font-weight-bold">${{orderData.sub_total}}</span> -->
                                        </div>
                                        <div class="text-right">
                                            <a href="" class="btn btn-primary px-3">Total Payment</a>
                                            <a href="" class="btn btn-outline-primary px-3">${{orderData.sub_total}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.setdata();
            this.orderHistory();
            this.cartDataa();
            this.getVendorDetails();
        },
        props: {
            cart_prop: String,
            order_prop:String,
        },
        data(){
            return{
               cartID: null,
               orderID: null,
               orderData: {},
               cartData: null,
               vendor_id:'',
               vendor:'',
               pending:false,
               preparing:false,
               completed:false,
               deliver:false,
               ready:false,
               cancel:false,
               reject:false,
               pickedByDriver:false,
               all:true,
               approves:false,
               isVisible:false,
            }
        },

        methods : {
            setdata() {
                // this.cartID = this.cart_prop;
                this.orderID = this.order_prop;
            },
            orderHistory(){
                this.isVisible = true;
                 axios
                .get("https://backend.ozfoodz.com.au/api/my-orders/" + this.orderID)
                .then((response) => {
                     console.log('order data');
                     console.log(response.data.data.length);
                     this.orderData = response.data
                     this.vendor_id = response.data.data[0].vendor_id;
                     this.isVisible = false;
                })
                .catch((error) => {
                console.error(error);
                 this.isVisible = false;
                });
            },
            // cartDataa() {
            //     axios
            //         .get("https://backend.ozfoodz.com.au/api/cartData/" + this.cartID)
            //         .then((response) => {
            //         this.cartData = response.data;
            //         this.total = 0.0;
            //         this.cartData.data.cart.forEach((cartData) => {
            //             this.total = this.total + cartData.price;
            //         });
            //         })
            //         .catch((error) => {
            //         console.error(error);
            //         });
            //     },
                getVendorDetails() {
                axios
                    .get("https://backend.ozfoodz.com.au/api/single_vendor/"+this.vendor_id)
                    .then((response) => {
                    this.vendor = response.data;
                    this.vendor_id = response.data.data.vendor.id;
                    console.log(this.vendor);
                    })
                    .catch((error) => {
                    console.error(error);
                    });
                },
                pendings(){
                    this.pending = true;
                    this.preparing =false;
                    this.completed =false;
                    this.deliver =false;
                    this.ready =false;
                    this.cancel =false;
                    this.reject =false;
                    this.pickedByDriver =false;
                    this.all = false;
                    this.approves=false;
                },
                preparings(){
                    this.pending = false;
                    this.preparing =true;
                    this.completed =false;
                    this.deliver =false;
                    this.ready =false;
                    this.cancel =false;
                    this.reject =false;
                    this.pickedByDriver =false;
                    this.all = false;
                      this.approves=false;
                },
                completeds(){

                    this.pending = false;
                    this.preparing =false;
                    this.completed =true;
                    this.deliver =false;
                    this.ready =false;
                    this.cancel =false;
                    this.reject =false;
                    this.pickedByDriver =false;
                    this.all = false;
                      this.approves=false;
                },
                delivereds(){
                    this.pending = false;
                    this.preparing =false;
                    this.completed =false;
                    this.deliver =true;
                    this.ready =false;
                    this.cancel =false;
                    this.reject =false;
                    this.pickedByDriver =false;
                    this.all = false;
                      this.approves=false;
                },
                readys(){
                    this.pending = false;
                    this.preparing =false;
                    this.completed =false;
                    this.deliver =false;
                    this.ready =true;
                    this.cancel =false;
                    this.reject =false;
                    this.pickedByDriver =false;
                    this.all = false;
                      this.approves=false;
                },
                cancels(){
                    this.pending = false;
                    this.preparing =false;
                    this.completed =false;
                    this.deliver =false;
                    this.ready =false;
                    this.cancel =true;
                    this.reject =false;
                    this.pickedByDriver =false;
                    this.all = false;
                      this.approves=false;
                },
                rejects(){
                    this.pending = false;
                    this.preparing =false;
                    this.completed =false;
                    this.deliver =false;
                    this.ready =false;
                    this.cancel =false;
                    this.reject =true;
                    this.pickedByDriver =false;
                    this.all = false;
                      this.approves=false;
                },
                picked(){
                    this.pending = false;
                    this.preparing =false;
                    this.completed =false;
                    this.deliver =false;
                    this.ready =false;
                    this.cancel =false;
                    this.reject =false;
                    this.pickedByDriver =true;
                    this.all = false;
                      this.approves=false;
                },
                allOrders(){
                    this.pending = false;
                    this.preparing =false;
                    this.completed =false;
                    this.deliver =false;
                    this.ready =false;
                    this.cancel =false;
                    this.reject =false;
                    this.pickedByDriver =false;
                    this.all = true;
                      this.approves=false;
                },
                approvess(){
                    this.pending = false;
                    this.preparing =false;
                    this.completed =false;
                    this.deliver =false;
                    this.ready =false;
                    this.cancel =false;
                    this.reject =false;
                    this.pickedByDriver =false;
                    this.all = false;
                    this.approves=true;
                }

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

