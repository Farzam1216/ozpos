@extends('frontend.layouts.master')

@if(isset($_SERVER['HTTP_X_FORWARDED_HOST']))
    @section('logo',)
    @section('subtitle','Live Tracking')
    @section('vendor_lat',)
    @section('vendor_lang',)
    @section('title',)
@else
    @section('title','Live Tracking')

@endif

<style>
  .map
  {
      position:absolute;
      overflow: show;
      height: 400px
  }

</style>
@section('content')
<div class="offer-section py-4">
  <div class="container position-relative">
     <div class="pt-3 text-white">
        <h2 class="font-weight-bold"></h2>
        <p class="text-white m-0"></p>
        <div class="rating-wrap d-flex align-items-center mt-2">
           <ul class="rating-stars list-unstyled">
              <li>

              </li>
           </ul>
        </div>
     </div>

  </div>
</div>
    <!-- SubHeader =============================================== -->

    <section class="parallax-window" id="short" data-parallax="scroll" data-image-src="{{ url('/images/restaurant_cover_blur_10.jpg')}}" data-natural-width="1400" data-natural-height="350">
        <div id="subheader">
            <div id="sub_content">
                <h1>Live Tracking  <span><a  href="{{ url()->previous() }}" class="btn btn-danger btn-sm">
                  <i class="fa fa-arrow-circle-o-left"></i>
                  <span>Back</span>
              </a></span></h1>

              </a>
            </div><!-- End sub_content -->
        </div><!-- End subheader -->
    </section><!-- End section -->
    <!-- End SubHeader ============================================ -->

    <div id="position">
        <div class="container">
            <ul>
                @if(isset($_SERVER['HTTP_X_FORWARDED_HOST']))
                    {{-- <li><a href="{{( ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ) ? 'https' : 'http')}}://{{$_SERVER['HTTP_X_FORWARDED_HOST']}}">{{ $order->name }}</a></li> --}}
                    <li>Live Tracking</li>
                @else
                    {{-- <li><a href="{{ route('customer.home.index')}}">Home</a></li> --}}
                    <li>Live Tracking</li>
                @endif
            </ul>
            <!-- <a href="#0" class="search-overlay-menu-btn"><i class="icon-search-6"></i> Search</a> -->
        </div>
    </div><!-- Position -->
    <div class="" id="collapseMap">
        <div id="track-map" class="map"></div>
    </div><!-- End Map -->





 <script type="text/javascript">
    const vendorLat = '{{$trackData["trackData"]["vendorLat"]}}';
    const vendorLang = '{{$trackData["trackData"]["vendorLang"]}}';
    const userLat = '{{$trackData["trackData"]["userLat"]}}';
    const userLang = '{{$trackData["trackData"]["userLang"]}}';
    const driverID = '{{$trackData["trackData"]["driverID"]}}';
    const orderID = '{{$trackData["trackData"]["orderID"]}}';


 </script>
  <script>

import { initializeApp } from 'https://www.gstatic.com/firebasejs/9.0.1/firebase-app.js';
import { getDatabase, ref, child, get, onChildChanged } from 'https://www.gstatic.com/firebasejs/9.0.1/firebase-database.js';

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

var processTrack = false;
var driverLat = 0;
var driverLang = 0;

var database = getDatabase(app);
const driverDataRef = ref(database);
const driverDataRefLang = ref(database, driverID+'/driverLang');
const driverDataRefLat = ref(database, driverID+'/driverLat');

var driverMarker, start, end, directionsDisplay, directionsService, bounds;

const icons = {
    user: {
        icon: "http://maps.google.com/mapfiles/kml/shapes/" + "man.png",
    },
    vendor: {
        icon: "http://maps.google.com/mapfiles/kml/paddle/" + "V.png",
    },
    driver: {
        icon: "http://maps.google.com/mapfiles/kml/shapes/" + "motorcycling.png",
    },
};

var map = new google.maps.Map(document.getElementById('track-map'), {
    center: {
        lat: parseFloat(vendorLat),
        lng: parseFloat(vendorLang),
    },

    zoom: 2,
    mapTypeId: 'roadmap',
    fullscreenControl: false,

    mapTypeControl: false,
    streetViewControl: false,
    gestureHandling: 'greedy'
});
// console.log(lat);

var vendorMarker = new google.maps.Marker({
    position: {
        lat: parseFloat(vendorLat),
        lng: parseFloat(vendorLang),
    },
    icon: {url:icons['vendor'].icon, scaledSize: new google.maps.Size(30, 30)},
    map: map,
    draggable: false
});

var userMarker = new google.maps.Marker({
    position: {
        lat: parseFloat(userLat),
        lng: parseFloat(userLang),
    },
    icon: {url:icons['user'].icon, scaledSize: new google.maps.Size(30, 30)},
    map: map,
    draggable: false
});

get(child(driverDataRef, `${driverID}`)).then((snapshot) => {
  console.log(snapshot.exists());
    if (snapshot.exists()) {
        driverLat = snapshot.val().driverLat;
        driverLang = snapshot.val().driverLang;

        driverMarker = new google.maps.Marker({
            position: {
                lat: parseFloat(driverLat),
                lng: parseFloat(driverLang),
            },
            icon: {url:icons['driver'].icon, scaledSize: new google.maps.Size(30, 30)},
            map: map,
            draggable: false
        });

        start = new google.maps.LatLng(parseFloat(userLat), parseFloat(userLang));
        end = new google.maps.LatLng(parseFloat(driverLat), parseFloat(driverLang));

        directionsDisplay = new google.maps.DirectionsRenderer();
        directionsDisplay.setMap(map);
        directionsDisplay.setOptions( { suppressMarkers: true } );
        directionsDisplay.setOptions( { preserveViewport: true } );

        directionsService = new google.maps.DirectionsService();

        bounds = new google.maps.LatLngBounds();
        bounds.extend(start);
        bounds.extend(end);
        map.fitBounds(bounds);

        calcRoute();
    } else {
        console.log("No data available");
    }
}).catch((error) => {
    console.error(error);
});

onChildChanged(driverDataRef, (data) => {
    if(!processTrack) {
        processTrack = true;
        get(child(driverDataRef, `${driverID}`)).then((snapshot) => {
            if (snapshot.exists()) {
                driverLat = snapshot.val().driverLat;
                driverLang = snapshot.val().driverLang;

                start = new google.maps.LatLng(parseFloat(userLat), parseFloat(userLang));
                end = new google.maps.LatLng(parseFloat(driverLat), parseFloat(driverLang));
                driverMarker.setPosition(end);
                calcRoute();

                bounds = new google.maps.LatLngBounds();
                bounds.extend(start);
                bounds.extend(end);
                map.fitBounds(bounds);
            } else {
                console.log("No data available");
            }

            processTrack = false;
        }).catch((error) => {
            console.error(error);
        });
    }
});

function calcRoute() {

    var request = {
        origin: start,
        destination: end,
        travelMode: google.maps.TravelMode.DRIVING
    };
    directionsService.route(request, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
            directionsDisplay.setMap(map);
            // console.log(response);
        } else {
            console.log("Directions Request from " + userMarker.toUrlValue(6) + " to " + vendorMarker.toUrlValue(6) + " failed: " + status);
        }
    });
    // console.log('Calculated');
}

  </script>
          $(document).ready(function(){
              var alerted = false;

              function trackSingleStatus()
              {
                  $(function() {
                      $.ajaxSetup({
                          headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('.content')
                          }
                      });

                      $.ajax({
                          type:'GET',
                              url:"{{ url('https://ozpos.geekss.com.au/api/get-order/380') }}",
                             data:{},
                          success:function(order){

                              order = JSON.parse(order);
                              if(order.order_status != 'ACCEPT' && order.order_status != 'PICKUP')
                              {
                                  // toastr.success("Order#"+order.id+" Order has been "+order.order_status+", redirecting...");
                                  setTimeout(function() {
                                      @if(isset($_SERVER['HTTP_X_FORWARDED_HOST']))
                                        window.location.replace("{{( ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ) ? 'https' : 'http')}}://{{$_SERVER['HTTP_X_FORWARDED_HOST']}}/orders");
                                      @else
                                      window.location.replace("{{ url('customer/order-history') }}");
                                      @endif
                                  }, 1000);
                              }

                                  //toastr.success('Order#'+order.id+' status updated.', 'Status Update');
                                  alerted = true;
                          }
                      });
                  });
              }
              setInterval( trackSingleStatus, 3000 );
          });
      </script>

@endsection
