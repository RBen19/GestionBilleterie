@extends('base')
@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white text-center fs-4">
                Formulaire de Soumission
            </div>
            <div class="card-body">
                <form action="{{ $reservation->exists ? route('updateEvenement',$reservation->id) : route('reservations.store')}}" method="POST">
                    @csrf
                    @if($reservation->exists)
                        @method('put')
                    @endif
                    <!-- Libelle -->
                    <div class="mb-3">
                        <label for="name" class="form-label">name</label>
                        <input type="text" class="form-control" id="name" name="name" required value="{{ $reservation->id ? $reservation->name: old('name')}}">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">{{$reservation->exists ? "Modifier": "Ajouter"}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
