@extends('base')
@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center fs-4">
            Formulaire de Soumission
        </div>
        <div class="card-body">
            <form action="{{ $evenements->exists ? route('updateEvenement',$evenements->id) : route('storeEvenement')}}" method="POST">
                @csrf
                @if($evenements->exists)
                    @method('put')
                @endif
                <!-- Libelle -->
                <div class="mb-3">
                    <label for="libelle" class="form-label">Libelle</label>
                    <input type="text" class="form-control" id="libelle" name="libelle" required value="{{$evenements->libelle}}">
                </div>

                <!-- Prix -->
                <div class="mb-3">
                    <label for="prix" class="form-label">Prix</label>
                    <input type="number" class="form-control" id="prix" name="prix" required value="{{$evenements->prix}}">
                </div>

                <!-- Date -->
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required value="{{$evenements->date}}">
                </div>

                <!-- Lieu -->
                <div class="mb-3">
                    <label for="lieu" class="form-label">Lieu</label>
                    <input type="text" class="form-control" id="lieu" name="lieu" value="{{$evenements->exists() ? $evenements->lieu: old('lieu')}}" >
                    @error('lieu')
                    <div class="alert alert-danger mt-2">Le champ lieu est obligatoire</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4">
                        {{$evenements->exists() ? $evenements->description : old('description')}}
                    </textarea>
                    @error('description')
                    <div class="alert alert-danger mt-1">Le champ description est obligatoire</div>
                    @enderror
                </div>

                <!-- Bouton d'envoi -->
                <button type="submit" class="btn btn-primary w-100">{{$evenements->exists ? "Modifier": "Ajouter"}}</button>
            </form>
        </div>
    </div>
</div>
@endsection
