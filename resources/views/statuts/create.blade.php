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
                    <h5 class="title p-5">Ajouter un statut</h5>
                </div>
                <form method="post" action="{{route('statut.store')}}">
                    @csrf
                    @method('POST')
                    <div class="card-body">
                        @include('statuts._form',['action'=>route('statut.store'),'method'=>'post'])
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{route('statut.index')}}" class="btn btn-default btn-round mr-4">{{__('Cancel')}}</a>
                        <button type="submit" class="btn btn-primary btn-round">{{__('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
