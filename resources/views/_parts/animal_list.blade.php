<div class="container text-left">
    @foreach ($animals as $animal)
    <p class="font-weight-light mt-3"><span>Name: </span>{{ $animal->name }}</p>
    <p class="font-weight-light mt-3 indent"><span>Type of animal: </span>{{ $animal->type }}</p>
    <p class="font-weight-light mt-3 indent"><span>Date of birth: </span>{{ $animal->dob }}</p>
    <p class="font-weight-light mt-3 indent"><span>Weight (kg): </span>{{ $animal->weight_kg }}</p>
    <p class="font-weight-light mt-3 indent"><span>Height (cm): </span>{{ $animal->height_cm }}</p>
    <p class="font-weight-light mt-3 indent"><span>Biteyness: </span>{{ $animal->biteyness }}</p>
    @if ($animal->dangerous())
    <p class="font-weight-light mt-3 danger indent">Warning: This animal is dangerous!</p>
    @else 
    <p class="font-weight-light mt-3 safe indent">This animal is safe and lovely</p>
    @endif
    <p class="font-weight-light mt-3 indent"><span>Owner: </span>{{ $animal->owner->fullName() }}</p>
    @endforeach
</div>

