@extends('frontend.layouts.master')
@section('content')
    <navbar-component></navbar-component>
    <track-component :user_address_prop="{{ json_encode($useraddress) }}" :driver_address_prop="{{ json_encode($driveraddress) }}"  :order_id_prop="{{ json_encode($order_id) }}"></track-component>
    @include('frontend.layouts.footer')
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src='https://cdn.firebase.com/js/client/2.2.1/firebase.js'></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqh1mQPnqMSiOUlr-1_3p11XyOsPWRYHI&callback=initMap">
    </script>
@endsection
