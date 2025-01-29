@extends('navabar')
@section('content')
    <div class="container mt-5">
        <button type="button" class="btn btn-success mb-4"><a href="{{route('reservations.create')}}" class="text-decoration-none text-dark" >Ajouter</a></button>
        <br>
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif

        @if(session('deleteSuccessfuly'))
            <div class="alert alert-success">
                {{session('deleteSuccessfuly')}}
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white text-center fs-4">
                Liste des Réservations
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Libelle</th>
                        <th scope="col">Evenement</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reservations as $r)
                        <tr>
                            <td>{{$r->name}}</td>
                            <td>{{$r->evenement_id}}</td>

                            <td>
                                <div class="d-flex justify-content-evenly">
                                    <button type="button" class="btn btn-primary"><a href="{{route('editEvenement',$r->id)}}" class="text-decoration-none text-white">Modifier</a></button>
                                    <form action="{{route('deleteEvenement',$r->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button  class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{$reservations->links()}}
@endsection
