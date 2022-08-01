<template>

    <section v-if="vendor" class="container-fluid p-2">
    <div v-if="isVisible" class="loader-overlay">
            <div class="loader"></div>
            <span class="text">Please Wait</span>
    </div>
        <div  class="container">
        <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
    Launch demo modal
    </button> -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background:none;">
        <div class="modal-body " >
            <!-- <rotate-square2 :color="loaderColor"></rotate-square2> -->
            <div class="text-center">
    <!-- <b-spinner label="Spinning"></b-spinner>
    <b-loading></b-loading> -->
    </div>
        </div>
        </div>
    </div>
    </div>

        </div>
        <div class="offer-section py-4">
            <div class="container position-relative">
                <img alt="#" style="width:200px" v-bind:src=" vendor.data.vendor.image "  class="restaurant-pic">
                <div class="pt-3 text-white">
                    <h2 class="font-weight-bold">
                    {{ vendor.data.vendor.name }}
                    </h2>
                    <p class="text-white m-0">
                    {{ vendor.data.vendor.address }}
                    </p>
                    <div class="rating-wrap d-flex align-items-center mt-2">
                        <ul class="rating-stars list-unstyled">
                            <li>
                                <i class="feather-star text-warning"></i>
                                <i class="feather-star text-warning"></i>
                                <i class="feather-star text-warning"></i>
                                <i class="feather-star text-warning"></i>
                                <i class="feather-star"></i>
                            </li>
                        </ul>
                        <p class="label-rating text-white ml-2 small"> (245 Reviews)</p>
                    </div>
                </div>
                <div class="pb-4">
                    <div class="row">
                        <div class="col-6 col-md-1">
                            <p class="text-white-50 font-weight-bold m-0 small">Open time</p>
                            <p class="text-white m-0">{{ vendor.data.vendor.start_time }}</p>
                        </div>
                        <div class="col-6 col-md-1">
                            <p class="text-white-50 font-weight-bold m-0 small">Close time</p>
                            <p class="text-white m-0">{{ vendor.data.vendor.close_time }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid pt-2">
            <div class="p-3 bg-primary bg-primary mt-n3 rounded position-relative">
                <div class="d-flex align-items-center">
                    <div class="feather_icon">
                        <a href="#ratings-and-reviews" class="text-decoration-none text-dark"><i class="p-2 bg-light rounded-circle font-weight-bold  feather-upload"></i></a>
                        <a href="#ratings-and-reviews" class="text-decoration-none text-dark mx-2"><i class="p-2 bg-light rounded-circle font-weight-bold  feather-star"></i></a>
                        <a href="#ratings-and-reviews" class="text-decoration-none text-dark"><i class="p-2 bg-light rounded-circle font-weight-bold feather-map-pin"></i></a>
                    </div>
                    <a href="contact-us" class="btn btn-sm btn-outline-light ml-auto">Contact</a>
                </div>
            </div>
        </div>
        <!-- menu category from main site  -->
        <div class="container">
            <VueSlickCarousel v-bind="settings">
                <div v-for="MenuCategory in vendor.data.MenuCategory" v-bind:key="MenuCategory.id">
                    <a class="bg-white rounded d-block p-2 text-center shadow-sm active" v-smooth-scroll="{ duration: 2500, offset: -50 }" :href="'#/' + MenuCategory.name.toUpperCase()"  tabindex="0">
                        <p class="m-0 small text-nowrap">{{ MenuCategory.name.toUpperCase() }}</p>
                    </a>
                </div>
            </VueSlickCarousel>
        </div>
        <!-- Menu -->
        <div class="container position-relative">
            <div class="row">
                <div class="col-md-8 pt-4">
                    <div class="shadow-sm rounded bg-white mb-3 overflow-hidden">
                        <div class="d-flex item-aligns-center">
                            <p class="font-weight-bold h6 p-3 border-bottom mb-0 w-100">Menu</p>
                        </div>
                        <div v-for="MenuCategory in vendor.data.MenuCategory" v-bind:key="MenuCategory.id" class="row m-0">
                            <h6 :id="'/'+MenuCategory.name.toUpperCase()" class="p-3 m-0 bg-light w-100">{{ MenuCategory.name.toUpperCase() }}<small class="ml-2 text-black-50">3 ITEMS</small></h6>
                            <!-- single menu -->
                            <div class="col-md-12 px-0 border-top">
                                <div class="">
                                    <div v-for="singleMenu in MenuCategory.single_menu" v-bind:key="singleMenu.id" class="p-3 border-bottom gold-members">
                                        <span class="float-right"><a style="margin-left: 25px;margin-top: 25px;" href="#" id="" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#singlemenuaddModal"   @click="getMenuAddons(vendor.data.vendor.id,singleMenu.menu.id),getMenuSizes(vendor.data.vendor.id,singleMenu.menu.id)">ADD</a></span>
                                        <!-- add extras Modal -->
                                        <div class="modal fade " id="singlemenuaddModal" tabindex="-1" role="dialog"   aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5  class="modal-title">Extras</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <h5 v-if="menuSizes != null && menuSizes.data.MenuSizes.length > 0"  class="font-weight-bold mt-1 ml-3">Pick Size</h5>
                                                    <ul v-if="menuSizes != null" class="nav nav-pills mt-1 ml-3">
                                                        <li  v-for="sizes in menuSizes.data.MenuSizes" v-bind:key="sizes.id">
                                                            <a id="SingleMenuSizeBtn-1-1"  @click="getMenuAddonsWithSize(vendor.data.vendor.id,sizes.menu_id,sizes.id)" class="btn btn-outline-primary btn-sm mb-3 mr-3" data-toggle="pill" href="#">
                                                                <b >{{ sizes.item_size.name}}</b><br>
                                                                <b v-if="sizes.display_discount_price <= 0 && sizes.price > 0">{{ sizes.price}} AUD</b>
                                                                <b v-if="sizes.display_discount_price > 0 "><del v-if="sizes.display_discount_price > 0"> {{ sizes.display_price }} </del> {{ sizes.display_discount_price}} AUD</b>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                        <div class="modal-body">
                                                            <form v-if="menuAddonWithSize != null" >
                                                                <div class="recepie-body" v-for="sizes in  menuAddonWithSize.data.MenuAddon" v-bind:key="sizes.id">
                                                                    <div v-for="addon in sizes.addon_category.addon" v-bind:key="addon.id" v-if="sizes.addon_id === addon.id" class="custom-control custom-radio border-bottom py-2">
                                                                        <input type="checkbox" :id=" addon.name " v-if="sizes.addon_id === addon.id" :value="addon.id" v-model="addon_id[addon.id]" class="custom-control-input" >
                                                                        <label class="custom-control-label" v-if="sizes.addon_id === addon.id" :for="addon.name">{{ addon.name }} <span class="text-muted">+ ${{ sizes.price }}</span></label>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <form v-if="menuAddonWithSize === null  && menuAddon != null" >
                                                                <div class="recepie-body" v-for="sizes in  menuAddon.data.MenuAddon" v-bind:key="sizes.id">
                                                                    <div  class="custom-control custom-radio border-bottom py-2">
                                                                        <input type="checkbox" :id=" sizes.addon.name " v-model="addon_id[sizes.addon.id]" class="custom-control-input" >
                                                                        <label class="custom-control-label"  :for="sizes.addon.name">{{ sizes.addon.name }}<span class="text-muted">+ ${{ sizes.price }}</span></label>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <h6 class="font-weight-bold mt-4">QUANTITY</h6>
                                                                <div class="d-flex align-items-center">
                                                                    <p class="m-0">Select Quantity</p>
                                                                    <div class="ml-auto">
                                                                        <span class="count-number">
                                                                            <input style="width:100px;" required class="count-number-input" v-model="quantity" type="number" min="1"  value="1">
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer p-0 border-0">
                                                            <div class="col-6 m-0 p-0">
                                                                <button type="button" class="btn border-top btn-lg btn-block" data-dismiss="modal">Close</button>
                                                            </div>
                                                            <div class="col-6 m-0 p-0">
                                                                <button type="button"  class="btn btn-primary btn-lg btn-block"  data-dismiss="modal"  @click="addToCart()"> Add To Cart</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div  class="media">
                                            <!-- <div class="mr-3 font-weight-bold text-danger non_veg">.</div> -->
                                            <div>
                                                <img style="width: 60px; height: 60px; object-fit: cover;" :src="singleMenu.menu.image" alt="" class="mr-3 rounded-pill ">
                                            </div>
                                            <div  class="media-body">
                                                <h6 class="mb-1">{{ singleMenu.menu.name }} </h6>
                                                <p class="text-muted mb-0 text-justify"> {{ singleMenu.menu.description }}</p>
                                                <p  class="text-muted mb-0" v-if="singleMenu.menu.display_discount_price <= 0 && singleMenu.menu.price > 0">$ {{ singleMenu.menu.price }}</p>
                                                <p class="text-muted mb-0" v-if="singleMenu.menu.display_discount_price > 0"><del v-if="singleMenu.menu.display_discount_price > 0">$ {{ singleMenu.menu.display_price }}</del> $ {{ singleMenu.menu.display_discount_price }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- half and half menu -->
                            <div class="col-md-12 px-0 border-top">
                                <div class="">
                                    <div v-for="half_n_half_menu in MenuCategory.half_n_half_menu" v-bind:key="half_n_half_menu.id"  class="p-3 border-bottom gold-members">
                                        <span class="float-right"><a style="margin-left: 25px;margin-top: 25px;" href="#" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#halfnhalf"  @click="getHalfandHalfSizes(vendor.data.vendor.id,half_n_half_menu.id)">ADD</a></span>
                                        <!-- add extras Modal -->
                                        <div class="modal fade " id="halfnhalf" tabindex="-1" role="dialog"   aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5  class="modal-title">Extras</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <h5 v-if="halfAndHalfSizes != null" class="font-weight-bold mt-1 ml-3">Pick Size</h5>
                                                    <ul v-if="halfAndHalfSizes != null" class="nav nav-pills mt-1 ml-3">
                                                        <li v-for="halfAndHalfSizes in halfAndHalfSizes.data" v-bind:key="halfAndHalfSizes.id" >
                                                            <a id="SingleMenuSizeBtn-1-1"  @click="getMenuByPickingItemSize(vendor.data.vendor.id,halfAndHalfSizes.id)"  class="btn btn-outline-primary btn-sm mb-3 mr-3" data-toggle="pill" >
                                                                <b >{{ halfAndHalfSizes.name}}</b><br>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <h5 class="font-weight-bold mt-1 ml-3">Pick Side</h5>
                                                    <ul class="nav nav-pills mt-1 ml-3">
                                                        <li >
                                                            <a @click="firstHalf = true , secondHalf=false"  class="btn btn-outline-primary btn-sm mb-3 mr-3" data-toggle="pill" >
                                                                <b >First Half</b>
                                                            </a>
                                                        </li>
                                                        <li >
                                                            <a @click="secondHalf = true , firstHalf=false"   class="btn btn-outline-primary btn-sm mb-3 mr-3" data-toggle="pill" >
                                                                <b >Second Half</b>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                        <p style="margin-left: 16px;" v-if="errors.length">
                                                            <b class="text-danger">Please correct the following error(s):</b>
                                                            <ul >
                                                                <li class="text-danger" v-for="error in errors" :key="error.id">{{ error }}</li>
                                                            </ul>
                                                        </p>
                                                        <div  class="modal-body">
                                                            <form  v-if="getMenuWithMenuSize != null"  v-show="firstHalf">
                                                                <!-- extras body -->
                                                                <h5>First Half</h5>
                                                                <div class="recepie-body" v-for="menu in getMenuWithMenuSize.data.MenuSizes" :key="menu.id">
                                                                    <div class="custom-control custom-radio border-bottom py-2">
                                                                            <span v-if="options.length > 0 && optionMenuId == menu.menu.id" class="float-right">
                                                                                <!-- <a class="btn btn-outline-secondary btn-sm" data-toggle="modal" href="#myModal2">Pick ADDONS</a> -->
                                                                                <multiselect style="
                                                                                    width: 300px;" v-model="addon_id" :options="options" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Pick Addons" label="name" track-by="name" :preselect-first="false">
                                                                                    <template slot="selection" slot-scope="{ values, search, isOpen }">
                                                                                    <span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length }} addon selected</span></template>
                                                                                </multiselect>
                                                                            </span>
                                                                        <input type="radio" @click="getMenuAddonsHalfnHalf(vendor.data.vendor.id,menu.menu.id)" :id=" 'firsthalf'+menu.menu.name " v-model="first_half_id" name="firsthalf" :value="menu.menu.id" class="custom-control-input" >
                                                                        <label class="custom-control-label" :for="'firsthalf'+menu.menu.name">{{menu.menu.name}}<br>
                                                                            <b v-if="menu.display_discount_price <= 0 && menu.display_price > 0">{{ menu.display_price / 2}} A$</b>
                                                                            <b v-if="menu.display_discount_price > 0 "><del v-if="menu.display_discount_price > 0"> {{ menu.display_price / 2 }} A$ </del> {{ menu.display_discount_price / 2}} A$</b>
                                                                        </label>

                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <form v-if="getMenuWithMenuSize != null" v-show="secondHalf">
                                                                <!-- extras body -->
                                                                <h5>Second Half</h5>
                                                                <div class="recepie-body" v-for="menu in getMenuWithMenuSize.data.MenuSizes" :key="menu.id">
                                                                    <div class="custom-control custom-radio border-bottom py-2">
                                                                    <span  v-if="options.length > 0 && optionMenuId == menu.menu.id" class="float-right">
                                                                        <multiselect style="
                                                                                width: 300px;" v-model="addon_id" :options="options" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Pick Addons" label="name" track-by="name" :preselect-first="false">
                                                                                <template slot="selection" slot-scope="{ values, search, isOpen }">
                                                                                <span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length }} addon selected</span></template>
                                                                        </multiselect>
                                                                    </span>
                                                                        <input type="radio" @click="getMenuAddonsHalfnHalf(vendor.data.vendor.id,menu.menu.id)" :id=" 'secondhalf'+menu.menu.name " v-model="second_half_id"  :value="menu.menu.id" name="secondhalf" class="custom-control-input" >
                                                                        <label class="custom-control-label" :for="'secondhalf'+menu.menu.name">{{menu.menu.name}}<br>
                                                                            <b v-if="menu.display_discount_price <= 0 && menu.display_price > 0">{{ menu.display_price / 2}} A$</b>
                                                                            <b v-if="menu.display_discount_price > 0 "><del v-if="menu.display_discount_price > 0"> {{ menu.display_price / 2}} A$ </del> {{ menu.display_discount_price / 2}} A$</b>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <h6 class="font-weight-bold mt-4">QUANTITY</h6>
                                                                <div class="d-flex align-items-center">
                                                                    <p class="m-0">Select Quantity</p>
                                                                    <div class="ml-auto">
                                                                        <span class="count-number">
                                                                            <input style="width:100px;" class="count-number-input" v-model="quantity" type="number" min="1" value="1">
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer p-0 border-0">
                                                            <div class="col-6 m-0 p-0">
                                                                <button type="button" class="btn border-top btn-lg btn-block" data-dismiss="modal">Close</button>
                                                            </div>
                                                            <div class="col-6 m-0 p-0">
                                                                <button type="button" @click="addToCartHalfnHalf()" data-dismiss="modal" class="btn btn-primary btn-lg btn-block">Add To Cart</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div  class="media">
                                            <!-- <div class="mr-3 font-weight-bold text-danger non_veg">.</div> -->
                                            <div>
                                                <img style="width: 60px; height: 60px; object-fit: cover;" :src="half_n_half_menu.image" alt="" class="mr-3 rounded-pill ">
                                            </div>
                                            <div  class="media-body">
                                                <h6  class="mb-1">{{ half_n_half_menu.name }} </h6>
                                                <p class="text-muted mb-0 text-justify">{{ half_n_half_menu.description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- deals menu -->
                            <div class="col-md-12 px-0 border-top">
                                <div class="">
                                    <div v-for="dealsMenu in MenuCategory.deals_menu" v-bind:key="dealsMenu.id" class="p-3 border-bottom gold-members">
                                        <span class="float-right"><a href="#" style="margin-left: 25px;margin-top: 25px;" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#deals" @click="getDealsMenuItems(vendor.data.vendor.id,dealsMenu.id)">ADD</a></span>
                                        <!-- add extras Modal -->
                                        <div class="modal fade" id="deals" tabindex="-1" role="dialog"   aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5  class="modal-title">Extras</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <h5 class="font-weight-bold mt-1 ml-3">Pick Items</h5>
                                                    <ul v-if="deaslMenuItems != null" class="nav nav-pills mt-1 ml-3">
                                                        <li v-for="deals in deaslMenuItems.data" :key="deals.id">
                                                            <a @click="getDealsItems(vendor.data.vendor.id,deals.id)" class="btn btn-outline-primary btn-sm mb-3 mr-3" data-toggle="pill" >
                                                                <b >{{deals.name}}</b>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div  class="modal-body">
                                                    <form  v-if="dealsItems != null"  >
                                                        <div class="recepie-body" v-for="deals in dealsItems.data" :key="deals.id">
                                                            <div v-for="items in deals.item_category.single_menu_item_category " :key="items.id" class="custom-control custom-radio border-bottom py-2">
                                                                <input  type="radio" :id=" 'firsthalf'+items.single_menu.menu.name" class="custom-control-input" >
                                                                <label  class="custom-control-label" :for="'firsthalf'+items.single_menu.menu.name">{{items.single_menu.menu.name}}<br>
                                                                <!-- <b>{{deals.item_category.single_menu_item_category.single_menu_id}}</b> -->
                                                                    <!-- <b v-for="items in deals.item_category.single_menu_item_category" :key="items.id">{{items.single_menu_id}}</b> -->
                                                                    <!-- <b v-if="menu.display_discount_price <= 0 && menu.display_price > 0">{{ menu.display_price}} A$</b>
                                                                    <b v-if="menu.display_discount_price > 0 "><del v-if="menu.display_discount_price > 0"> {{ menu.display_price }} A$ </del> {{ menu.display_discount_price}} A$</b> -->
                                                                </label>
                                                                <br>
                                                            </div>
                                                        </div>
                                                    </form>
                                                        <h6 class="font-weight-bold mt-4">QUANTITY</h6>
                                                            <div class="d-flex align-items-center">
                                                                <p class="m-0">Select Quantity</p>
                                                                <div class="ml-auto">
                                                                    <span class="count-number">
                                                                        <input style="width:100px;" class="count-number-input" type="number" min="1" value="1">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer p-0 border-0">
                                                        <div class="col-6 m-0 p-0">
                                                            <button type="button" class="btn border-top btn-lg btn-block" data-dismiss="modal">Close</button>
                                                        </div>
                                                        <div class="col-6 m-0 p-0">
                                                            <button type="button" data-dismiss="modal" class="btn btn-primary btn-lg btn-block">Add To Cart</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div  class="media">
                                            <div>
                                                <img style="width: 60px; height: 60px; object-fit: cover;" :src="dealsMenu.image" alt="" class="mr-3 rounded-pill ">
                                            </div>
                                            <div  class="media-body">
                                                <h6 class="mb-1">{{ dealsMenu.name }}</h6>
                                                <p class="text-muted mb-0 text-justify">{{ dealsMenu.description }}</p>
                                                <p class="text-muted mb-0" v-if="dealsMenu.display_discount_price <= 0">$ {{ dealsMenu.price }}</p>
                                                 <p class="text-muted mb-0" v-if="dealsMenu.display_discount_price > 0" ><del v-if="dealsMenu.display_discount_price > 0">$ {{ dealsMenu.display_price }}</del> $ {{ dealsMenu.display_discount_price }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 mt-4 ">
                    <div class="osahan-cart-item rounded rounded shadow-sm overflow-hidden bg-white sticky_sidebar">
                        <div class="d-flex border-bottom osahan-cart-item-profile bg-white p-3">
                            <img alt="osahan" v-bind:src=" vendor.data.vendor.image" style="width:50px;" class="mr-3 rounded-circle img-fluid">
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 font-weight-bold">{{vendor.data.vendor.name}}</h6>
                                <p class="mb-0 small text-muted"><i class="feather-map-pin"></i> {{ vendor.data.vendor.address }}</p>
                            </div>
                        </div>
                        <div  class="bg-white p-3 clearfix ">
                                <div  v-if="cartData != null" id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="osahan-card-body p-3">
                                        <form>
                                            <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                                <label class="btn btn-outline-secondary ">
                                                <input @click="delivery = true , pickup=false" type="radio" name="options" id="option1" > Delivery
                                                </label>
                                                <label class="btn btn-outline-secondary">
                                                <input @click="delivery = false , pickup=true" type="radio" name="options" id="option2"> Pickup
                                                </label>

                                            </div>
                                            <br><br>
                                            <p style="margin-left: 16px;" v-if="addressError.length">
                                                <b class="text-danger">Please correct the Delivery Addres:</b>
                                                <ul >
                                                    <li class="text-danger" v-for="error in addressError" :key="error.id">{{ error }}</li>
                                                </ul>
                                            </p>
                                            <div v-show="pickup" class="form-row">
                                                <div class="col-md-12 form-group mb-0">
                                                   <div  class="osahan-cart-item mb-3 rounded shadow-sm bg-white overflow-hidden">
                                                        <div class="osahan-cart-item-profile bg-white p-3">
                                                            <div class="d-flex flex-column">
                                                                <h6 class="mb-3 font-weight-bold">Pickup Address</h6>
                                                            <div class="row">
                                                                <div class="custom-control col-sm-12 custom-radio mb-3 position-relative border-custom-radio">
                                                                    <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" checked>
                                                                    <label class="custom-control-label w-100" for="customRadioInline1">
                                                                        <div>
                                                                            <div class="p-3 bg-white rounded shadow-sm w-100">
                                                                                <div class="d-flex align-items-center mb-2">
                                                                                    <h6 class="mb-0">{{vendor.data.vendor.name}}</h6>
                                                                                    <p class="mb-0 badge badge-success ml-auto"><i class="icofont-check-circled"></i> Default</p>
                                                                                </div>
                                                                                <p class="small text-muted m-0">{{vendor.data.vendor.address}}</p>
                                                                                <!-- <p class="small text-muted m-0">Redwood City, CA 94063</p> -->
                                                                            </div>
                                                                            <!-- <a href="#"  data-toggle="modal" data-target="#exampleModal" class="btn btn-block btn-light border-top">Edit</a> -->
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                                <!-- <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#exampleModal"> ADD NEW ADDRESS </a> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div v-show="delivery" class="form-row">
                                                <div class="col-md-12 form-group mb-0">
                                                   <div  class="osahan-cart-item mb-3 rounded shadow-sm bg-white overflow-hidden">
                                                        <div class="osahan-cart-item-profile bg-white ">
                                                            <div class="d-flex flex-column">
                                                                <h6 class="mb-3 font-weight-bold">Select Delivery Address</h6>
                                                                <div class="row">
                                                                    <div class="custom-control col-lg-12 custom-radio mb-3 position-relative border-custom-radio">
                                                                        <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" checked>
                                                                        <label class="custom-control-label w-100" for="customRadioInline1">
                                                                            <div>
                                                                                <div class="bg-white rounded shadow-sm w-100">
                                                                                    <input type="text" placeholder="Origin" class="form-control" hidden ref="origin" />
                                                                                    <vue-google-autocomplete
                                                                                        :country="['au']"
                                                                                        v-model="textAddress"
                                                                                        class="form-control b2"
                                                                                        id="map"
                                                                                        placeholder="Please type your address"
                                                                                        v-on:placechanged="getAddressData">
                                                                                    </vue-google-autocomplete>
                                                                                </div>
                                                                                <!-- <a href="#"  data-toggle="modal" data-target="#exampleModal" class="btn btn-block btn-light border-top">Edit</a> -->
                                                                            </div>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <!-- <h6 class="mb-3 font-weight-bold">Choose Order Time</h6>
                                                                <div class="row">
                                                                    <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                                                        <label class="btn  border ">
                                                                            <input  type="radio" name="options" id="option1"> ASAP
                                                                        </label>
                                                                        <label class="btn  border" style="width:140px">
                                                                            <datetime type="datetime" class="" v-model="datetime12" use12-hour placeholder="Select Date and Time"></datetime>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <br> -->
                                                                <a class="btn btn-primary text-white" @click="checkAddress()"> CHECK ADDRESS </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                        <div v-if="cartData != null" class="bg-white py-2">
                            <div  v-for="cartData in cartData.data.cart" :key="cartData.id" class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                                <div class="media align-items-center">
                                    <div class="mr-2 text-danger" style="margin-bottom: 15px;">&middot;</div>
                                    <div class="media-body">
                                        <h6 class="mb-1">{{cartData.menu_name}}</h6>
                                        <p class="text-gray mb-0 ml-2 text-muted small">${{cartData.unit_price}}</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="count-number float-right"><button type="button" class="btn-sm left dec btn btn-outline-secondary" @click="minusQuantity(vendor.data.vendor.id,cartData.session_id,cartData.id)"> <i class="feather-minus"></i> </button><input class="count-number-input"  type="text" readonly="" :value="cartData.quantity"><button type="button" class="btn-sm right inc btn btn-outline-secondary" @click="addQuantity(vendor.data.vendor.id,cartData.session_id,cartData.id)"> <i class="feather-plus"></i> </button></span>
                                </div>
                            </div>
                        </div>

                        <div v-if="cartData == null" class="bg-white p-3 clearfix border-bottom">
                            <h6 class="font-weight-bold mb-0">No data in cart.</h6>
                        </div>
                        <div v-if="cartData != null" class="bg-white p-3 clearfix ">
                            <p class="mb-1">Item Total <span class="float-right text-dark">${{total}}</span></p>
                            <hr>
                            <h6 class="font-weight-bold mb-0">TO PAY <span class="float-right">${{total}}</span></h6>
                        </div>
                        <div class="p-3">
                            <a id="checkout" class="btn btn-success btn-block btn-lg" v-if="cartID != null && delivery == false && pickup == false && total != null && total < 200" @click="check()" >checkout<i class="feather-arrow-right"></i></a>
                            <!-- <a id="checkout" class="btn btn-success btn-block btn-lg" v-if="total != null && total < 200" @click="check()" >checkout<i class="feather-arrow-right"></i></a> -->
                            <!-- <a id="checkout" class="btn btn-success btn-block btn-lg" v-if="cartID != null && addressStatus == false && pickup == false" @click="check()" >checkout<i class="feather-arrow-right"></i></a> -->
                            <a id="checkout" class="btn btn-success btn-block btn-lg" v-if="cartID != null && addressStatus == true  && delivery == true && pickup == false"  :href="'checkout/' + cartID" >checkout<i class="feather-arrow-right"></i></a>
                            <a id="checkout" class="btn btn-success btn-block btn-lg" v-if="cartID != null && pickup == true && delivery == false" :href="'checkout/' + cartID" >checkout<i class="feather-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</template>

<script>
    import * as $ from "jquery";
    import * as bootstrap from "bootstrap";
    import Multiselect from 'vue-multiselect'
    import Vue from 'vue';
    import VueSlickCarousel from 'vue-slick-carousel'
    import 'vue-slick-carousel/dist/vue-slick-carousel.css'
    // optional style for arrows & dots
    import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'
    import {RotateSquare2} from 'vue-loading-spinner'
    import { ModelObj } from 'vue-3d-model';
    import VueGoogleAutocomplete from "vue-google-autocomplete";
    import { Datetime } from 'vue-datetime';
    import VueSession from 'vue-session'
    Vue.use(VueSession)
    import LogoutButton from './NavbarComponent.vue';
    import 'vue-datetime/dist/vue-datetime.css'
    export default {
        mounted() {
            this.isVisible = true;
            this.getVendorDetails();
            // console.log(autocomplete)

             const interval = setInterval(() => {
             const autocomplete = new google.maps.places.Autocomplete(this.$refs["origin"]);
             autocomplete.setComponentRestrictions({
                country: ["aus"],
            });
            // console.log(autocomplete)
            }, 50)
        },
        components: {
            Multiselect,
            VueSlickCarousel,
            RotateSquare2,
            VueGoogleAutocomplete,
            datetime: Datetime,
            LogoutButton,
        },
        data(){
            return{
                rotation: {
                    x: -Math.PI / 2,
                    y: 0,
                    z: 0
                },
                settings: {
                //    "dots": true,
                    "centerMode": true,
                    "centerPadding": "20px",
                    "focusOnSelect": true,
                    "infinite": true,
                    "slidesToShow": 6,
                    "speed": 500,
                    "variableWidth": true,
                    "responsive": [
                        {
                        "breakpoint": 1024,
                        "settings": {
                            "slidesToShow": 3,
                            "slidesToScroll": 3,
                            "infinite": true,
                            "dots": true
                        }
                        },
                        {
                        "breakpoint": 600,
                        "settings": {
                            "slidesToShow": 2,
                            "slidesToScroll": 2,
                            "initialSlide": 2
                        }
                        },
                        {
                        "breakpoint": 480,
                        "settings": {
                            "slidesToShow": 1,
                            "slidesToScroll": 1
                        }
                        }
                    ]
                    },
                viewloader:false,
                viewTemplate:true,
                errors:[],
                // select dropdown
                value: [],
                options: {},
                optionMenuId : '',
                // end dropdown
                halfnhalf:'',
                uniqueAddoncategory:[],
                vendor: null,
                menuAddon:null,
                menuSizes:null,
                addonCategory:null,
                menuAddonWithSize:null,
                // half and half
                halfAndHalfSizes:null,
                firstHalf:true,
                secondHalf:false,
                getMenuWithMenuSize:null,
                // deals
                deaslMenuItems:null,
                dealsItems:null,
                dealsCartItems:[],
                cartID:null,
                // cart details
                // single menu cart
                menu_id:'',
                size_id : '',
                addon_id: [],
                single_menu_id:'',
                half_and_half_id:'',
                first_half_id : '',
                second_half_id : '',
                deals_menus_id : '',
                cart : null,
                cartData : null,
                session_id: '',
                quantity: 1,
                vendor_id : '',
                cartQuantity:'',
                total:null,
                // end single menu cart
                // end cart details
                isVisible:false,
                pickup:false,
                delivery:false,
                address: "",
                lat:"",
                lang:"",
                addressStatus:false,
                addressError:[],
                textAddress:'',
                datetime12:''
            }
        },
        methods : {
            userLogout(){
                this.$session.destroy()
                this.userId = null;
            },
            getAddressData: function (addressData, placeResultData, id) {
                this.address = addressData;
                this.lang = this.address.longitude;
                this.lat = this.address.latitude;
                this.textAddress = this.address.route+','+this.address.locality+','+this.address.country;
            },
            check(){
                this.addressError=[];
                if(this.pickup == false && this.delivery==false){
                    this.addressError.push('Please Select Method Pickup or Delivery.');
                }
                if(this.delivery==true){
                    this.addressError.push('Please Select a valid Address.');
                }

                if(this.total < 200){
                    this.addressError.push('Minimum Order Amount is 200 AUS.');
                }


            },
            checkAddress(){
                this.addressError=[];
                this.isVisible =true;
                axios.post('https://backend.ozfoodz.com.au/api/address-check',{
                    vendor_id : this.vendor_id,
                    lat: this.lat,
                    lang: this.lang,
                }).then((response) => {
                    // this.cart.push(response.data);
                    this.isVisible =false;
                    if (response.status == 200) {
                        console.log(response.data)
                        if(response.data.success == false){
                                this.addressError.push('Sorry your address is not in our delivery zone.Only Self Pick Up Available.');
                        }
                        else{
                            this.addToCart();
                            this.addressStatus = true;
                            this.addressError= [];
                        }
                    }
				})
				.catch((error) => {
					console.error(error);
                    this.isVisible =false;
				});
            },
            // cart details
            getCartDetails(session_id){
                    axios.get('https://backend.ozfoodz.com.au/api/getCartData/'+this.vendor_id+'/'+session_id).then((response) => {
                        this.cartData = response.data;
                        console.log(this.cartData);
                        this.total = 0.0;
                        this.cartData.data.cart.forEach(cartData => {
                            this.total = this.total + cartData.price;
                            this.cartID = cartData.id;
                        });
                        console.log(this.cartID);
                    })
                    .catch((error) => {
                        console.error(error);
                    });

            },

            addToCart()
            {
                this.isVisible =true;

                    axios.post('https://backend.ozfoodz.com.au/api/addToCart',{
                        vendor_id : this.vendor_id,
                        session_id: this.session_id,
                        menu_id: this.menu_id,
                        size_id : this.size_id,
                        addon_id: this.addon_id,
                        quantity: this.quantity,
                        single_menu_id : this.single_menu_id,
                        half_and_half_id : this.halfnhalf,
                        deals_menus_id : this.deals_menus_id,
                        first_half_id : this.first_half_id,
                        second_half_id : this.second_half_id,
                        textAddress : this.textAddress,
                        lat:this.lat,
                        lang:this.lang,
                    }).then((response) => {
                        // this.cart.push(response.data);

                        if (response.status == 200) {
                            this.session_id = response.data.data.session_id;
                            this.getCartDetails(this.session_id);
                            this.menu_id ='';
                            this.size_id ='';
                            this.addon_id= [];
                            this.quantity = 1;
                            this.halfnhalf = '';
                            this.deals_menus_id = '';

                        }
                        this.isVisible =false;
                    })
                    .catch((error) => {
                        console.error(error);
                        this.isVisible =false;
                    });
            },

            addToCartHalfnHalf()
            {
                this.errors = [];

                if (!this.first_half_id) {
                    this.errors.push('Please Select item for First Half.');
                }
                if (!this.second_half_id) {
                    this.errors.push('Please Select item for Second Half.');
                }

                axios.post('https://backend.ozfoodz.com.au/api/addToCart',{
                    vendor_id : this.vendor_id,
                    session_id: this.session_id,
                    menu_id: this.halfnhalf,
                    size_id : this.size_id,
                    addon_id: this.addon_id,
                    quantity: this.quantity,
                    single_menu_id : this.single_menu_id,
                    half_and_half_id : this.halfnhalf,
                    deals_menus_id : this.deals_menus_id,
                    first_half_id : this.first_half_id,
                    second_half_id : this.second_half_id,
                }).then((response) => {
                    // this.cart.push(response.data);
                    if (response.status == 200) {
                        this.session_id = response.data.data.session_id;
                        this.getCartDetails(this.session_id);
                        this.menu_id ='';
                        this.size_id ='';
                        this.addon_id= [];
                        this.quantity = 1;
                        this.halfnhalf = '';
                        this.deals_menus_id = '';
                        this.single_menu_id = '';
                        this.first_half_id = '';
                        this.second_half_id = '';
                        swal({
                        title: "Item Added!",
                        text: response.data.message,
                        icon: "success",
                        buttons: true,
                        timer: 3000
                    });
                    }
				});
            },

            addQuantity(vendor_id , session_id , cart_id){
                this.isVisible = true;
                axios.get('https://backend.ozfoodz.com.au/api/addQuantity/'+cart_id).then((response) => {
                    this.getCartDetails(session_id);
                    this.isVisible = false;
				})
				.catch((error) => {
                    this.isVisible = false;
					console.error(error);
				});
            },

            minusQuantity(vendor_id , session_id , cart_id){
                this.isVisible = true;
                axios.get('https://backend.ozfoodz.com.au/api/minusQuantity/'+cart_id).then((response) => {
                    this.getCartDetails(session_id);
                    this.isVisible = false;
				})
				.catch((error) => {
					console.error(error);
                    this.isVisible = false;
				});
            },

            // end cart details
            getVendorDetails()
            {
                this.isVisible = true;
                axios.get('https://backend.ozfoodz.com.au/api/single_vendor/7').then((response) => {
                    this.vendor = response.data;
                    this.vendor_id =response.data.data.vendor.id
                    this.isVisible = false;
				})
				.catch((error) => {
					console.error(error);
                    this.isVisible = false;
				});
            },

            getMenuSizes(vendor_id,menu_id)
            {
                this.vendor_id =vendor_id;
                this.menu_id = menu_id;
                axios.get('https://backend.ozfoodz.com.au/api/menu_size/'+vendor_id+'/'+menu_id).then((response) => {
                    this.menuSizes = response.data;
                    this.menuAddonWithSize=null;
				})
				.catch((error) => {
					console.error(error);
				});
            },

            getMenuAddons(vendor_id,menu_id)
            {
                this.vendor_id =vendor_id;
                this.menu_id = menu_id;
                this.options = [];
                this.addon_id= [''];
                this.optionMenuId = menu_id;
                axios.get('https://backend.ozfoodz.com.au/api/menu_addon/'+vendor_id+'/'+menu_id).then((response) => {
                    this.menuAddon = response.data;
                    this.menuAddonWithSize = null;
				})
				.catch((error) => {
					console.error(error);
				});
            },

            getMenuAddonsHalfnHalf(vendor_id,menu_id)
            {
                this.vendor_id =vendor_id;
                this.menu_id = menu_id;
                this.options = [];
                this.optionMenuId = menu_id;
                axios.get('https://backend.ozfoodz.com.au/api/menu_addon/'+vendor_id+'/'+menu_id).then((response) => {
                    this.menuAddon = response.data;
                    this.menuAddonWithSize = null;
                    if(response.data != null){
                        for (let i = 0; i < this.menuAddon.data.MenuAddon.length; i++) {
                        this.options[i] = {
                            id : this.menuAddon.data.MenuAddon[i].addon_id,
                            name : this.menuAddon.data.MenuAddon[i].addon.name
                        }
                    }
                }
                    console.log(this.options);
				})
				.catch((error) => {
					console.error(error);
				});
            },

            getMenuAddonsWithSize(vendor_id,menu_id,size_id)
            {
                this.vendor_id = vendor_id;
                this.menu_id = menu_id;
                this.size_id = size_id;
                axios.get('https://backend.ozfoodz.com.au/api/menu_size_addon/'+vendor_id+'/'+menu_id+'/'+size_id).then((response) => {
                    this.menuAddonWithSize = response.data;
                    for (let i = 0; i < this.menuAddonWithSize.data.MenuAddon.length; i++) {
                        this.uniqueAddoncategory[i] = this.menuAddonWithSize.data.MenuAddon[i].addon_category.name;
                    }
                    this.uniqueAddoncategory = [ ...new Set(this.uniqueAddoncategory) ]
				})
                .catch((error) => {
					console.error(error);
				});

            },

            // half and half
            getHalfandHalfSizes(vendor_id,half_n_half_menu_id)
            {
                this.vendor_id =vendor_id;
                this.halfnhalf = half_n_half_menu_id;
                axios.get('https://backend.ozfoodz.com.au/api/single_vendor_retrieve_sizes/'+vendor_id+'/'+half_n_half_menu_id).then((response) => {
                    this.halfAndHalfSizes = response.data;
                    this.menuSizes = null;
				})
                .catch((error) => {
					console.error(error);
				});

            },

            getMenuByPickingItemSize(vendor_id,item_size_id)
            {
                this.vendor_id =vendor_id;
                this.menuAddon = null;
                axios.get('https://backend.ozfoodz.com.au/api/menu_size_item_size/'+vendor_id+'/'+item_size_id).then((response) => {
                    this.getMenuWithMenuSize = response.data;
                    this.menuSizes = null;
				})
                .catch((error) => {
					console.error(error);
				});

            },

            getDealsMenuItems(vendor_id,deals_menu_id)
            {
                this.vendor_id =vendor_id;
                axios.get('https://backend.ozfoodz.com.au/api/deals-menu-items/'+vendor_id+'/'+deals_menu_id).then((response) => {
                    this.deaslMenuItems = response.data;
				})
                .catch((error) => {
					console.error(error);
				});

            },
            getDealsItems(vendor_id,deals_menu_id){
                this.vendor_id =vendor_id;
                axios.get('https://backend.ozfoodz.com.au/api/deals-items/'+vendor_id+'/'+deals_menu_id).then((response) => {
                    this.dealsItems = response.data;
				})
                .catch((error) => {
					console.error(error);
				});
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
