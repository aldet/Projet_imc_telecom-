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
            <div class="col-md-4 p-5">
                <div class="alert alert-dark" role="alert">
                    <h6 class="alert-heading">{{$technicien->personne->name}} {{$technicien->personne->prenom}}</h6>
                    <p>{{$technicien->personne->telephone}}</p>
                </div>
                <div class="alert alert-dark" role="alert">
                    <p>statut d'intervention</p>
                    <h4 class="alert-heading">Well done!</h4>
                    <p>Aww yeah, you successfully read this important alert message. This example </p>
                    <hr>
                    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>
            </div>
            <div class="col-md-4 p-5 ml-auto">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{asset('assets')}}/img/bg5.jpg" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="{{asset('assets')}}/img/default-avatar.png" alt="...">
                                <h5 class="title">{{ $technicien->personne->name }}</h5>
                            </a>
                            <p class="description">
                                {{$technicien->personne->email }}
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="button-container">
                        <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                            <i class="fab fa-facebook-square"></i>
                        </button>
                        <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                            <i class="fab fa-google-plus-square"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
