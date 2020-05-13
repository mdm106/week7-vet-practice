@extends('app')
@section('title'){{
    'MDM Veterinary Practice - Home'
}}@endsection
@section('content')
    @include('_parts/heading')
    @include('_parts/owner_list')
@endsection