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
                        <a href="{{ route('commune.create') }}" class="btn btn-primary btn-round text-white pull-right">Ajouter une commune</a>
                        <h5 class="title">{{__("Liste des communes")}}</h5>
                        <div class="col-12 mt-2"></div>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Commune</th>
                                <th scope="col">Voir</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($communes as $commune)
                                <tr>
                                    <td>{{$commune->id}}</td>
                                    <td>{{$commune->name_commune}}</td>
                                    <td>
                                        <a href="{{ route('commune.show',$commune->id) }}"><button type="button" class="btn btn-info">voir</button></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('commune.edit',$commune->id) }}"><button type="button" class="btn btn-warning">Modifier</button></a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{route('commune.destroy',$commune->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button rel="tooltip" type="submit" class="btn btn-danger ">Supprimer</button>
                                        </form>
                                    </td>
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
