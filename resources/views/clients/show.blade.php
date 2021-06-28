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
            <div class="col-md-6 p-5">
                <div class="alert alert-dark text-black-50" role="alert">
                    <h6 class="alert-heading text-uppercase">{{$client->personne->name}} {{$client->personne->prenom}}</h6>
                    <p>{{$client->residence ? $client->residence->label : ""}}</p>
                    <p><i class="fas fa-mobile-alt"></i>{{$client->personne->telephone}}</p>
                </div>
                <div class="alert alert-info"  role="alert">
                   <div>
                       <div class="title">statut d'intervention</div>
                       <p>{{$client->statut ? $client->statut->name_statut : ""}}</p>
                       <hr>
                       <p>Date:</p>
                       <p>Technicien:</p>
                   </div>
                </div>
                <div class="overflow-scroll">
                    <div class="alert alert-dark text-black-50 overflow-hidden" role="alert">
                       <div id="marche">
                           <div class="text-secondary">Marché/Commande</div>
                           <p>{{$client->commune->marche ? $client->commune->marche->code_marche : ""}}</p>
                       </div>
                        <div id="adresse">
                            <div class="text-secondary"><i class="fas fa-map-marker-alt"></i> Adresse client</div>
                            <p class="font-weight-normal">{{$client->personne->adresse}}</p>
                        </div>
                    </div>
                    <div class="alert alert-dark text-black-50" role="alert">
                        <div class="information">
                            <div class="title">Informations complémentaires</div>
                                <div id="matricule">
                                <p class="text-secondary">Matricule</p>
                                <p>{{$client->matricule}}</p>
                            </div>
                            <div id="email">
                                <p class="text-secondary"><i class="far fa-envelope"></i> Email</p>
                                <p>{{$client->personne->email}}</p>
                            </div>
                            <div id="commune" class="p-0">
                                <p class="text-secondary">Commune</p>
                                <p>{{$client->commune ? $client->commune->name_commune : ""}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6  p-5">
                <div>
                    <h6>Bilan client</h6>
                </div>
               <div>
                   <a href="#"><button type="button"  class="btn btn-info btn-lg">Planifier</button></a>
                   <a href="#"><button type="button" class="btn  btn-warning btn-lg">Replanifier</button></a>
                   <a href="#"><button type="button" class="btn btn-danger btn-lg">Annuler</button></a>
               </div>
                <form method="post" action="{{route('consigne.store',$client->id)}}" id="form_description">
                    @csrf
                    @method('POST')
                    <div class="form-group {{$errors->has('description') ? 'has-danger':''}}">
                        <input name="client_id" value="{{ $client->id }}" type="hidden" />
                        <label for="exampleFormControlTextarea1">Consigne</label>
                        <textarea name="description" class="form-control border-primary rounded {{$errors->has('description') ? 'is-invalid':''}}" id="descrption" rows="3"></textarea>
                        @include('alerts.feedback',['field'=>'description'])
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">{{__('envoyer')}}</button>
                    </div>
                </form>
                @foreach($client->users as $user)
                <div class="card" id="user-message">
                    <div class="card-body">
                        <p>{{$user->name}}</p>
                        <p>{{$user->pivot->description}}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <iframe
                            width="100%"
                            height="600"
                            style="border:2px"
                            loading="lazy"
                            allowfullscreen
                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAZ0rOxuNI37CBNqCLgkM4JXUHYSgOEpWg&q={{urlencode($client->personne->adresse)}}">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

