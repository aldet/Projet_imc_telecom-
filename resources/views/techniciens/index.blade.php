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
                        <a href="{{ route('technicien.create') }}" class="btn btn-primary btn-round text-white pull-right">Ajouter un technicien</a>
                        <h5 class="title">{{__("Liste des techniciens")}}
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                               <tr>
                                   <th scope="col">ID</th>
                                   <th scope="col">Matricule</th>
                                   <th scope="col">Nom</th>
                                   <th scope="col">Prenom</th>
                                   <th scope="col">Email</th>
                                   <th scope="col">Competence</th>
                                   <th scope="col">Voir</th>
                                   <th scope="col">Modifier</th>
                                   <th scope="col">Supprimer</th>
                               </tr>
                            </thead>
                            <tbody>
                            @foreach($techniciens as $technicien)
                                <tr>
                                    <td>{{$technicien->id}}</td>
                                    <td>{{$technicien->matricule}}</td>
                                    <td> {{ $technicien->personne->name }}</td>
                                    <td> {{ $technicien->personne->prenom }}</td>
                                    <td> {{ $technicien->personne->email}}</td>
                                    <td>
                                        @foreach ($technicien->competences as $competence)
                                          {{$competence->label}}
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('technicien.show',$technicien->id) }}"><button type="button" class="btn btn-info"><i class="fas fa-eye"></i></button></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('technicien.edit',$technicien->id) }}"><button type="button" class="btn btn-warning"><i class="fas fa-edit"></i></button></a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{route('technicien.destroy',$technicien->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button rel="tooltip" type="button" class="btn btn-danger delete-technicien-button"><i class="fas fa-user-slash"></i></button>
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
        $(document).ready(function () {
            $('.delete-technicien-button').click(function(){
                if (confirm('Voulez-vous supprimer ce technicien?')){
                    $(this).closest('form').submit()
                }
            });
        });
    </script>
@endpush
