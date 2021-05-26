    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <p>Recherche</p>
                    </div>
                    <div class="card-body" id="overflowTest">
                        <form method="GET" action="{{route('rechercheclient')}}">
                            @method('GET')
                            <input class="form-control" type="text" name="recherche" placeholder="nom client, matricule, telephone" aria-label="Search" value="{{request()->q ?? ""}}">
                        <div class="form-group dropdown">
                            <button class="btn col-md-12 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Marchés
                            </button>
                            <ul class="dropdown-menu  col-md-12" aria-labelledby="dropdownMenuButton1">
                                <li><input type="search" name="marche" class="form-control"></li>
                                <li><input type="checkbox" class="form-control-checkbox"></li>
                            </ul>
                        </div>

                        <select name="commune[]" class="form-control selectpicker" multiple data-live-search="true" data-title="Communes">
                            @foreach($communes as $commune)
                                <option value="{{$commune->id}}">{{$commune->name_commune}}</option>
                            @endforeach
                        </select>
                            <select name="type[]" class="form-control selectpicker text-center" multiple data-live-search="true" data-title="Type résidence">
                                @foreach($residences as $residence)
                                    <option value="{{$residence->id}}">{{$residence->label}}</option>
                                @endforeach
                            </select>
                            <select name="adresse[]" class="form-control selectpicker text-center" multiple data-live-search="true" data-title="Adresse client">
                                @foreach($clients as $client)
                                    <option value="{{$client->id}}">{{$client->personne->adresse}}</option>
                                @endforeach
                            </select>

                        <div class="form-group dropdown">
                            <button class="btn  dropdown-toggle col-md-12 " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Adresse client
                            </button>
                            <ul class="dropdown-menu col-md-12 " aria-labelledby="dropdownMenuButton1">
                                <li><input type="search" name="adresse" class="form-control"></li>
                                <li><input type="checkbox" class="form-control-checkbox"></li>
                            </ul>
                        </div>
                        <div class="form-group dropdown">
                            <button class="btn dropdown-toggle col-md-12" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Statut d'intervention
                            </button>
                            <ul class="dropdown-menu col-md-12" aria-labelledby="dropdownMenuButton1">
                                <li><input type="search" name="statut" class="form-control"></li>
                                <li><input type="checkbox" class="form-control-checkbox"></li>
                            </ul>
                        </div>
                        <div class="form-group dropdown">
                            <button class="btn dropdown-toggle col-md-12" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Nécessité de RDV
                            </button>
                            <ul class="dropdown-menu col-md-12" aria-labelledby="dropdownMenuButton1">
                                <li><input type="search" name="necessite" class="form-control"></li>
                                <li><input type="checkbox" class="form-control-checkbox"></li>
                            </ul>
                        </div>
                            <select name="technicien[]" class="form-control selectpicker text-center" multiple data-live-search="true" data-title="Techniciens en charges">
                                @foreach($techniciens as $technicien)
                                    <option value="{{$technicien->id}}">{{$technicien->personne->name}}</option>
                                @endforeach
                            </select>
                            <div class="form-group dropdown">
                                <button class="btn dropdown-toggle col-md-12" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Motif contact infructueux
                                </button>
                                <ul class="dropdown-menu col-md-12" aria-labelledby="dropdownMenuButton1">
                                    <li><input type="search" name="motif" class="form-control"></li>
                                    <li><input type="checkbox" class="form-control-checkbox"></li>
                                </ul>
                            </div>
                           <div class="card-footer mr-0" id="button-footer">
                                <a href="{{route('home')}}"><button type="button" class="btn btn-warning"><i class="fas fa-trash-alt"></i></button></a>
                                <button type="submit" class="btn btn-info">Appliquer</button>
                          </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
    #overflowTest
    {
        overflow: scroll;
        background-color: #0c2646;
    }
</style>
