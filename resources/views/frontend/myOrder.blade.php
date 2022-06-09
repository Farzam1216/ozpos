@extends('frontend.layouts.master')
@section('content')
    <navbar-component></navbar-component>
    <myorder-component :order_prop="{{ json_encode($userID) }}" :cart_prop="{{ json_encode($cartID) }}"></myorder-component>
    @include('frontend.layouts.footer')
    <script src="{{ asset('js/app.js') }}" ></script>
@endsection
