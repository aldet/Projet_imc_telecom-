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
                        <h5 class="title p-5">Modifier marché</h5>
                    </div>
                    <form method="POST" action="{{route('marche.update', $marche)}}">
                        @csrf
                        @method("PUT")
                        <div class="card-body">
                            @include('marches._form',['action'=>route('marche.store'),'method'=>'POST'])
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('marche.show',$marche) }}" class="btn btn-default btn-round mr-4">{{__('Cancel')}}</a>
                            <button type="submit" class="btn btn-primary btn-round">{{__('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
