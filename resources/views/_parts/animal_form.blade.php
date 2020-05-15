<form class="form card" method="post">
        @csrf
        <h2 class="card-header">Add animal details</h2>
        <fieldset class="card-body"> 
            <div class="form-group">
                <label for="name">Name:</label>
                <input id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required/> 
                @error('name')
                    <p class="invalid-feedback"> 
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="type">Animal type:</label>
                <input id="type" name="type" class="form-control 
                @error('type') is-invalid @enderror" value="{{ old('type')}}" required/> 
                @error('type')
                    <p class="invalid-feedback"> 
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="dob">Date of birth:</label>
                <input id="dob" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob') }}" type="date" required/> 
                @error('dob')
                    <p class="invalid-feedback"> 
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="weight_kg">Weight (kg):</label>
                <input id="weight_kg" name="weight_kg" class="form-control 
                @error('weight_kg') is-invalid @enderror" value="{{ old('weight_kg') }}" required type="number" step=".1"/> 
                @error('weight_kg')
                    <p class="invalid-feedback"> 
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="height_cm">Height (cm):</label>
                <input id="height_cm" name="height_cm" class="form-control 
                @error('height_cm') is-invalid @enderror" value="{{ old('height_cm') }}" type="number" step=".1"/> 
                @error('height_cm')
                    <p class="invalid-feedback"> 
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="biteyness">On a scale of 1-5 how bitey are they?:</label>
                <input id="biteyness" name="biteyness" class="form-control @error('biteyness') is-invalid @enderror" value="{{ old('biteyness') }}" required type="number" step="0" min="1" max="5"/> 
                @error('biteyness')
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