@extends('navabar')
@section('content')
    <div class="container mt-5">
        <button type="button" class="btn btn-success mb-4"><a href="{{route('CreateEvenement')}}" class="text-decoration-none text-dark" >Ajouter</a></button>
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
                Liste des évènements
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Libelle</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Date</th>
                        <th scope="col">Lieu</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($evenements as $e)
                        <tr>
                            <td>{{$e->libelle}}</td>
                            <td>{{$e->prix}}</td>
                            <td>{{$e->date}}</td>
                            <td>{{$e->lieu}}</td>
                            <td>
                                <div class="d-flex justify-content-evenly">
                                    <button type="button" class="btn btn-primary">Modifier</button>
                                    <form action="{{route('deleteEvenement',$e->id)}}" method="post">
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
    {{$evenements->links()}}
@endsection
