@extends('frontend.layouts.master')
@section('content')
    <navbar-component></navbar-component>
    <terms-component></terms-component>
    @include('frontend.layouts.footer')
    <script src="{{ asset('js/app.js') }}" ></script>
@endsection
