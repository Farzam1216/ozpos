@extends('frontend.layouts.master')
@section('content')
    <navbar-component></navbar-component>
    <checkout-component></checkout-component>
    <script src="{{ asset('js/app.js') }}" ></script>
@endsection
