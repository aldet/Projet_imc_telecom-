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
                    <p><i class="fas fa-mobile-alt"></i> {{$client->personne->telephone}}</p>
                </div>
                <div class="alert alert-info"  role="alert">
                   <div>
                       <div class="title">statut d'intervention</div>
                       <hr>
                       <p>Date:</p>
                       <p>Technicien:</p>
                   </div>
                </div>
                <div class="overflow-scroll">
                    <div class="alert alert-dark text-black-50 overflow-hidden" role="alert">
                       <div id="marche">
                           <div class="text-secondary">Marché / Commande</div>
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
                                <p class="text-secondary p-0">Commune</p>
                                <p class="p-0">{{$client->commune ? $client->commune->name_commune : ""}}
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
                   <a href="#"><button type="button"  class="btn btn-info">Planifier intervention</button></a>
                   <a href="#"><button type="button" class="btn  btn-outline-warning">Replanifier intervention</button></a>
                   <a href="#"><button type="button" class="btn btn-outline-danger">Annuler intervention</button></a>
               </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Consigne</label>
                    <textarea class="form-control border-primary rounded" id="exampleFormControlTextarea1" rows="3"></textarea>
                    <div class="mt-2"><i class="far fa-save"></i> <i class="far fa-window-close"></i></div>
                </div>
            </div>
        </div>
    </div>
@endsection
