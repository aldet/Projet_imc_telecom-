@extends('layouts.app', [
    'namePage' => 'Register page',
    'activePage' => 'register',
    'backgroundImage' => asset('assets') . "/img/bg16.jpg",
])
@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">{{__("Liste des clients")}}</h5>
                        @if(request()->input('q'))
                            <h6>{{$clients->count()}} résultat (s)</h6>
                        @endif
                            <div class="col-12 mt-2"></div>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th scope="col">Matricule</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">commune</th>
                                <th scope="col">Typ residence</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)
                                <tr onclick="location.href='{{route('client.show',$client->id)}}'">
                                   <td>{{$client->id}}</td>
                                    <td>{{$client->matricule}}</td>
                                    <td>{{ $client->personne->name }}</td>
                                    <td>{{ $client->personne->prenom }}</td>
                                    <td>{{ $client->personne->email }}</td>
                                    <td>{{ $client->personne->adresse }}</td>
                                    <td>{{ $client->commune ? $client->commune->name_commune : "" }}</td>
                                    <td>{{$client->residence ? $client->residence->label : ""}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')

@endsection
