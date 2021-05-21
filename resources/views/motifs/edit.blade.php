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
                        <h5 class="title p-5">Modifier motif</h5>
                    </div>
                    <form method="post" action="{{route('motif.update', $motif)}}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            @include('motifs._form',['action'=>route('motif.store'),'method'=>'POST'])
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('motif.show',$motif) }}" class="btn btn-default btn-round mr-4">{{__('Cancel')}}</a>
                            <button type="submit" class="btn btn-primary btn-round">{{__('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
