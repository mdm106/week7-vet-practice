@extends('app')
@section('title'){{
    'MDM Veterinary Practice - Owners'
}}@endsection
@section('content')
    <div class="container">
        <h3 class="mt-3">Owner Page:</h3>
        <p class="font-weight-light mt-3">{{ $owner->fullName() }}</p>
        <p class="font-weight-light mt-3">{{ $owner->fullAddress() }}</p>
        <p class="font-weight-light mt-3">{{ $owner->formatTelephone() }}</p>
        <h3 class="mt-3">Pets:</h3>
        @if(count($animals) == 0)
        <h3 class="mt-3">No animals found</h3>
        @else 
        @foreach ($animals as $animal)
        <p class="font-weight-light mt-3"><b>Name:</b> {{ $animal->name }}</p>
        <p class="font-weight-light mt-3"><b>Type:</b> {{ $animal->type }}</p>
        @endforeach
        @endif
    @include('_parts/animal_form')
@endsection
