<div class="container text-left">
    @foreach ($owners as $owner)
    <p class="font-weight-light mt-3">{{ $owner->fullName() }}</p>
    <p class="font-weight-light mt-3">{{ $owner->fullAddress() }}</p>
    <p class="font-weight-light mt-3">{{ $owner->formatTelephone() }}</p>
    @endforeach
</div>