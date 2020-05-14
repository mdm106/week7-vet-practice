@extends("app")
@section("content")
    <div class="container text-center">
        <h1 class="font-weight-bold mt-4">Welcome to MDM Veterinary Practice</h1>
    </div>
    <form class="form card" method="post">
        @csrf
        <h2 class="card-header">Add owner details</h2>
        <fieldset class="card-body"> 
            <div class="form-group">
                <label for="first_name">First name:</label>
                <input id="first_name" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" required/> 
                @error('first_name')
                    <p class="invalid-feedback"> 
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="last_name">Last name:</label>
                <input id="last_name" name="last_name" class="form-control 
                @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" required/> 
                @error('last_name')
                    <p class="invalid-feedback"> 
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="telephone">Telephone number:</label>
                <input id="telephone" name="telephone" class="form-control @error('telephone') is-invalid @enderror" value="{{ old('telephone') }}" required/> 
                @error('telephone')
                    <p class="invalid-feedback"> 
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="address_1">First line of address:</label>
                <input id="address_1" name="address_1" class="form-control 
                @error('address_1') is-invalid @enderror" value="{{ old('address_1') }}" required/> 
                @error('address_1')
                    <p class="invalid-feedback"> 
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="address_2">Second line of address:</label>
                <input id="address_2" name="address_2" class="form-control 
                @error('address_2') is-invalid @enderror" value="{{ old('address_2') }}"/> 
                @error('address_2')
                    <p class="invalid-feedback"> 
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="town">Town/city:</label>
                <input id="town" name="town" class="form-control @error('town') is-invalid @enderror" value="{{ old('town') }}" required/> 
                @error('town')
                    <p class="invalid-feedback"> 
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="postcode">Postcode:</label>
                <input id="postcode" name="postcode" class="form-control @error('postcode') is-invalid @enderror" value="{{ old('postcode') }}" required/> 
                @error('postcode')
                    <p class="invalid-feedback"> 
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </fieldset>
        <div class="card-footer text-right">
            <button class="btn btn-success">Submit</button>
        </div>
    </form>
 @endsection