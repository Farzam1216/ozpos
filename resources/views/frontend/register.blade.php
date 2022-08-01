@extends('frontend.layouts.master')
@section('content')
<navbar-component></navbar-component>
    <register-component></register-component>
    @include('frontend.layouts.footer')
    <script src="{{ asset('js/app.js') }}" ></script>
@endsection
