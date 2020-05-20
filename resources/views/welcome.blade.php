@extends('app')
@section('title'){{
    'MDM Veterinary Practice - Home'
}}@endsection
@section('content')
    @include('_parts/heading')
    <div class="container">
        <p class="mt-4">{{ $greeting }} {{ $user->name ?? ""}}</p>
    </div>
    <div class="container">
        <img class="img-fluid center-block" src="{{ asset('images/dog2.jpg') }}">
@endsection