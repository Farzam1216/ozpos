@extends('frontend.layouts.master')
@section('content')
    <navbar-component></navbar-component>
    <checkout-component :cart_prop="{{ json_encode($cartID) }}"></checkout-component>
    @include('frontend.layouts.footer')
    <script src="{{ asset('js/app.js') }}" ></script>
@endsection
