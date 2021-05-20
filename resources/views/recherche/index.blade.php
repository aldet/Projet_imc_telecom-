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
                        <p>Recherche</p>
                    </div>
                    <div class="card-body" id="overflowTest" >
                        <form>
                            <input class="form-control" type="search" placeholder="nom client, matricule, telephone" aria-label="Search">
                        <div class="dropdown">
                            <button class="btn col-md-12 dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Marchés
                            </button>
                            <ul class="dropdown-menu  col-md-12" aria-labelledby="dropdownMenuButton1">
                                <li><input type="search" class="form-control"></li>
                                <li><input type="checkbox" class="form-control-checkbox"></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn  dropdown-toggle col-md-12 " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Commune
                            </button>
                            <ul class="dropdown-menu col-md-12 " aria-labelledby="dropdownMenuButton1">
                                  <li><input type="search"  class="form-control"></li>
                                @foreach($communes as $commune)
                                  <li><input type="checkbox" class="form-control-checkbox" value="{{$commune->id}}">{{$commune->name_commune}}</li>
                                @endforeach
                            </ul>
                        </div>
                            <div class="dropdown">
                                <button class="btn  dropdown-toggle col-md-12" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Type de client
                                </button>
                                <ul class="dropdown-menu col-md-12 " aria-labelledby="dropdownMenuButton1">
                                    <li><input type="search"  class="form-control"></li>
                                    @foreach($residences as $residence)
                                        <li><input type="checkbox" class="form-control-checkbox" value="{{$residence->label}}">{{$residence->label}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        <div class="dropdown">
                            <button class="btn  dropdown-toggle col-md-12 " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Adresse client
                            </button>
                            <ul class="dropdown-menu col-md-12 " aria-labelledby="dropdownMenuButton1">
                                <li><input type="search" class="form-control"></li>
                                <li><input type="checkbox" class="form-control-checkbox"></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle col-md-12" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Statut d'intervention
                            </button>
                            <ul class="dropdown-menu col-md-12" aria-labelledby="dropdownMenuButton1">
                                <li><input type="search" class="form-control"></li>
                                <li><input type="checkbox" class="form-control-checkbox"></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle col-md-12" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Nécessité de RDV
                            </button>
                            <ul class="dropdown-menu col-md-12" aria-labelledby="dropdownMenuButton1">
                                <li><input type="search" class="form-control"></li>
                                <li><input type="checkbox" class="form-control-checkbox"></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle col-md-12" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Technicien en charge
                            </button>
                            <ul class="dropdown-menu col-md-12" aria-labelledby="dropdownMenuButton1">
                                <li><input type="search" class="form-control"></li>
                                @foreach($techniciens as $technicien)
                                 <li><input type="checkbox" name="" class="form-control-checkbox">{{$technicien->personne->name}}</li>
                                @endforeach

                            </ul>
                        </div>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle col-md-12" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Motif contact infructueux
                                </button>
                                <ul class="dropdown-menu col-md-12" aria-labelledby="dropdownMenuButton1">
                                    <li><input type="search" class="form-control"></li>
                                    <li><input type="checkbox" class="form-control-checkbox"></li>
                                </ul>
                            </div>
                           <div class="card-footer" id="button-footer">
                                <a><button type="button" class="btn"><i class="fas fa-trash-alt"></i></button></a>
                                <button type="submit" class="btn btn-info">Appliquer</button>
                          </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection
<style>
    #overflowTest
    {
        overflow: scroll;
        width: 25%;
        background-color: #0c2646;
    }
</style>
