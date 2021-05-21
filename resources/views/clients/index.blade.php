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
                            <a href="{{ route('client.create') }}" class="btn btn-primary btn-round text-white pull-right">Ajouter un client</a>
                            <h5 class="title">{{__("Liste des clients")}}</h5>
                            <div class="col-12 mt-2"></div>
                        </div>
                      <div class="card-body">
                          <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                              <thead>
                                  <tr>
                                      <th scope="col">ID</th>
                                      <th scope="col">Matricule</th>
                                      <th scope="col">Nom</th>
                                      <th scope="col">Prenom</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">commune</th>
                                      <th scope="col">Typ residence</th>
                                      <th scope="col">Motif</th>
                                      <th scope="col">Voir</th>
                                      <th scope="col">Modifier</th>
                                      <th scope="col">Supprimer</th>
                                  </tr>
                              </thead>
                              <tbody>
                                 @foreach($clients as $client)
                                      <tr>
                                          <td>{{$client->id}}</td>
                                          <td>{{$client->matricule}}</td>
                                          <td>{{ $client->personne->name }}</td>
                                          <td>{{ $client->personne->prenom }}</td>
                                          <td> {{ $client->personne->email }}</td>
                                          <td> {{ $client->commune ? $client->commune->name_commune : "" }}</td>
                                          <td>{{$client->residence ? $client->residence->label : ""}}</td>
                                          <td>{{$client->motif ? $client->motif->motif : ""}}</td>
                                          <td>
                                              <a href="{{ route('client.show',$client->id) }}"><button type="button" class="btn btn-info"><i class="fas fa-eye"></i></button></a>
                                          </td>
                                          <td>
                                              <a href="{{ route('client.edit',$client->id) }}"><button type="button" class="btn btn-warning"><i class="fas fa-edit"></i></button></a>
                                          </td>
                                          <td>
                                              <form method="POST" action="{{route('client.destroy',$client->id)}}">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button rel="tooltip" type="button" class="btn btn-danger delete-client-button"><i class="fas fa-user-slash"></i></button>
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
@push('js')
    <script>
        $(document).ready(function(){
            $('.delete-client-button').click(function(){
                if (confirm('voulez-vous supprimer ce client ?')){
                    $(this).closest('form').submit()
                }
            });
        });
    </script>
@endpush
