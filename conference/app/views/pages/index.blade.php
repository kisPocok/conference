@extends('layouts.master')

@section('header')
@stop

@section('footer')
    @include('includes.footer')
@stop

@section('content')

    <div class="container">
        <h1>Hello Conference!</h1>
    </div>

    <script src="/packages/jquery/dist/jquery.js"></script>
    <script src="/app/js/site.js"></script>

@stop