@extends('frontend.layouts.master')
@section('content')
<navbar-component></navbar-component>
    <resturant-component></resturant-component>
    @include('frontend.layouts.footer')
    <script src="{{ asset('js/app.js') }}" ></script>
@endsection
