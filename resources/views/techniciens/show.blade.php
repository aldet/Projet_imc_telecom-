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
            <div class="col-md-8">
                <div class="card">
                   <div class="card-header">
                       <h5 class="title">{{__("1.Identification")}}</h5>
                   </div>
                    <div class="card-body">
                        <div class="row">
                                <div class="form-group col-md-6">
                                    <label>{{__(" Nom")}}</label>
                                    <input type="text" name="name" class="form-control" value="{{$technicien->personne->name }}">
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{__("Prenom")}}</label>
                                    <input type="text" name="prenom" class="form-control" value="{{$technicien->personne->prenom }}">
                                    @include('alerts.feedback', ['field' => 'prenom'])
                                </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{{__("Adresse")}}</label>
                                <input type="text" name="adresse" class="form-control" value="{{$technicien->personne->adresse}}">
                                @include('alerts.feedback', ['field' => 'adresse'])
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{__("Code postal")}}</label>
                                <input type="text" name="code_postal" class="form-control" value="{{$technicien->personne->code_postal }}">
                                @include('alerts.feedback', ['field' => 'code_postal'])
                            </div>
                        </div>
                        <div class="row">
                                <div class="form-group col-md-6">
                                    <label>{{__("Telephone")}}</label>
                                    <input type="text" name="telephone" class="form-control" value="{{$technicien->personne->telephone }}">
                                    @include('alerts.feedback', ['field' => 'telephone'])
                                </div>
                            <div class="form-group col-md-6">
                                <label>{{__("Telephone fixe")}}</label>
                                <input type="text" name="telephone_fixe" class="form-control" value="{{$technicien->personne->telephone_fixe }}">
                                @include('alerts.feedback', ['field' => 'telephone_fixe'])
                            </div>
                        </div>
                                <div class="form-group">
                                    <label>{{__("Matricule")}}</label>
                                    <input type="text" name="matricule" class="form-control" value="{{$technicien->matricule}}">
                                    @include('alerts.feedback', ['field' => 'matricule'])
                                </div>
                                <div class="form-group">
                                    <label>{{__("Email")}}</label>
                                    <input type="email" name="email" class="form-control" value="{{$technicien->personne->email }}">
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
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
                <div class="col-md-8">
                   <div class="card">
                       <div class="card-header">
                           <h5 class="title">2.Semaine typique</h5>
                       </div>
                   </div>
                </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">3.Competence</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
