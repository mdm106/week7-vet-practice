<div class="container text-left">
    <h4 class="font-weight-normal mt-3">Our valued owners:</h4>
    @foreach (App\Owner::all() as $owner)
    <p class="font-weight-light mt-3">{{ $owner->fullName() }}</p>
    @endforeach
</div>