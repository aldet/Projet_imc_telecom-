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
                       <a href="{{ route('maille.create') }}" class="btn btn-primary btn-round text-white pull-right">Ajouter une maille</a>
                       <h5 class="title">{{__("Liste des clients")}}</h5>
                       <div class="col-12 mt-2"></div>
                   </div>
                   <div class="card-body">
                       <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                           <thead>
                           <tr>
                               <th scope="col">ID</th>
                               <th scope="col">Date debut</th>
                               <th scope="col">Date fin</th>
                               <th scope="col">Voir</th>
                               <th scope="col">Modifier</th>
                               <th scope="col">Supprimer</th>
                           </tr>
                           </thead>
                           <tbody>
                           @foreach($mailles as $mailles)
                               <tr>
                                   <td>{{$mailles->id}}</td>
                                   <td>{{$mailles->date_debut}}</td>
                                   <td>{{$mailles->date_fin}}</td>
                                   <td>
                                       <a href="{{ route('maille.show',$mailles->id) }}"><button type="button" class="btn btn-info"><i class="fas fa-eye"></i></button></a>
                                   </td>
                                   <td>
                                       <a href="{{ route('maille.edit',$mailles->id) }}"><button type="button" class="btn btn-warning"><i class="fas fa-edit"></i></button></a>
                                   </td>
                                   <td>
                                       <form method="POST" action="{{route('maille.destroy',$mailles->id)}}">
                                           @csrf
                                           @method('DELETE')
                                           <button rel="tooltip" type="button" class="btn btn-danger delete-marche-button delete-marche-button"><i class="fas fa-user-slash"></i></button>
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
