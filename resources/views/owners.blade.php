@extends('app')
@section('title'){{
    'MDM Veterinary Practice - Owners'
}}@endsection
@section('content')
    <div class="container">
    @if(count($owners) == 0) 
        <h3 class="mt-3">No owners found</h3>
    @else 
        <h3 class="mt-3">Our valued customers:</h3>
        @include('_parts/owner_list')
    @endif
    {{ $owners->links() }}
    </div>
@endsection