@extends('app')
@section('title'){{
    'MDM Veterinary Practice - Animals'
}}@endsection
@section('content')
    <div class="container">
    @if(count($animals) == 0) 
        <h3 class="mt-3">No animals found</h3>
    @else 
        <h3 class="mt-3">Our wonderful animals:</h3>
        @include('_parts/animal_list')
    @endif
    {{ $animals->links() }}
    </div>
@endsection