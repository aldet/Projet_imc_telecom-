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
                        <h5 class="title p-5">Modifier</h5>
                    </div>
                        <form method="post" action="{{route('residence.update',$residence)}}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                @include('residences._form',['action'=>route('residence.store'),'methode'=>'POST'])
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{ route('recherche.show',$residence) }}" class="btn btn-default btn-round mr-4">{{__('Cancel')}}</a>
                                <button type="submit" class="btn btn-primary btn-round">{{__('Save')}}</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
