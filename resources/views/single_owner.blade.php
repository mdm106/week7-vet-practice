@extends('app')
@section('title'){{
    'MDM Veterinary Practice - Owners'
}}@endsection
@section('content')
    <div class="container">
        <h3 class="mt-3">A valued customer:</h3>
        <p class="font-weight-light mt-3">{{ $owner->fullName() }}</p>
        <p class="font-weight-light mt-3">{{ $owner->fullAddress() }}</p>
        <p class="font-weight-light mt-3">{{ $owner->formatTelephone() }}</p>
    </div>
@endsection