@extends('frontend.layouts.master')
@section('content')
<navbar-component></navbar-component>
    <resturantcode-component></resturantcode-component>
    @include('frontend.layouts.footer')
    <script src="{{ asset('js/app.js') }}" ></script>
@endsection
