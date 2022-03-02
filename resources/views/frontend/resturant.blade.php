@extends('frontend.layouts.master')
@section('content')
<navbar-component></navbar-component>
    <resturant-component></resturant-component>
    <script src="{{ asset('js/app.js') }}" ></script>
@endsection
