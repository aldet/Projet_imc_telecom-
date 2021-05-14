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
                        <a href="{{ route('residence.create') }}" class="btn btn-primary btn-round text-white pull-right">Ajouter un type</a>
                        <h5 class="title">{{__("Liste des types")}}</h5>
                        <div class="col-12 mt-2"></div>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Type</th>
                                <th scope="col">Voir</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($residences as $residence)
                                <tr>
                                    <td>{{$residence->id}}</td>
                                    <td>{{$residence->label}}</td>
                                    <td>
                                        <a href="{{ route('residence.show',$residence->id) }}"><button type="button" class="btn btn-info">voir</button></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('$residence.edit',$residence->id) }}"><button type="button" class="btn btn-warning">Modifier</button></a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{route('$residence.destroy',$residence->id)}}">
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
