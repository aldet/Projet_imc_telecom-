@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'User Profile',
    'activePage' => 'profile',
    'activeNav' => '',
])
@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('motif.create') }}" class="btn btn-primary btn-round text-white pull-right">Ajouter un motif</a>
                        <h5 class="title">{{__("Liste des motifs")}}</h5>
                        <div class="col-12 mt-2"></div>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Motif</th>
                                <th scope="col">Voir</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($motifs as $motif)
                                <tr>
                                    <td>{{$motif->id}}</td>
                                    <td>{{$motif->motif}}</td>
                                    <td>
                                        <a href="{{ route('motif.show',$motif->id) }}"><button type="button" class="btn btn-info"><i class="fas fa-eye"></i></button></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('motif.edit',$motif->id) }}"><button type="button" class="btn btn-warning"><i class="fas fa-edit"></i></button></a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{route('motif.destroy',$motif->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button rel="tooltip" type="submit" class="btn btn-danger delete-motif-button"><i class="fas fa-user-slash"></i></button>
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
        $(document).ready(function (){
            $('.delete-motif-button').click(function (){
                if (confirm('voulez-vous supprimer ce march?')){
                    $(this).closest('form').submit()
                }
            });
        });
    </script>
@endpush
