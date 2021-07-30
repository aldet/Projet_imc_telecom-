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
                        Consigne
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('consigne.store')}}">
                            @csrf
                            @method("POST")
                            <div class="card-body">
                                @include('consignes._form',['action'=>route('consigne.store'),'method'=>"POST"])
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection