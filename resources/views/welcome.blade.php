@extends('app')
@section('title'){{
    'MDM Veterinary Practice - Home'
}}@endsection
@section('content')
    @include('_parts/heading')
    <div class="container">
        <p class="mt-4">{{ $greeting }} {{ $user->name ?? ""}}</p>
    </div>
@endsection