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
                            <input class="form-control p-2" type="text" name="recherche" placeholder="nom client, matricule, telephone" aria-label="Search" value="{{request()->q ?? ""}}">
                        <select name="marche[]" class="form-control selectpicker" multiple data-live-search="true" data-title="Marchés">
                            @foreach($marches as $marche)
                                <option value="{{$marche->id}}">{{$marche->code_marche}}</option>
                            @endforeach
                        </select>
                        <select name="commune[]" class="form-control  selectpicker"  multiple data-live-search="true" data-title="Communes" id="color-select">
                            @foreach($communes as $commune)
                                <option  value="{{$commune->id}}">{{$commune->name_commune}}</option>
                            @endforeach
                        </select>
                            <select name="type[]" class="form-control selectpicker text-center" multiple data-live-search="true" data-title="Type résidence">
                                @foreach($residences as $residence)
                                    <option value="{{$residence->id}}">{{$residence->label}}</option>
                                @endforeach
                            </select>
                            <select name="adresse[]" id="color-select" class="form-control selectpicker text-center" multiple data-live-search="true" data-title="Adresse client" data->
                                @foreach($clients as $client)
                                    <option value="{{$client->id}}">{{$client->personne->adresse}}</option>
                                @endforeach
                            </select>

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
                            <select name="statut[]" class="form-control selectpicker text-center" multiple data-live-search="true" data-title="Statut d'intervention">
                                @foreach($statuts as $statut)
                                    <option value="{{$statut->id}}">{{$statut->name_statut}}</option>
                                @endforeach
                            </select>
                            <select name="motif[]" class="form-control selectpicker" multiple data-live-search="true" data-title="Motifs">
                                @foreach($motifs as $motif)
                                    <option value="{{$motif->id}}">{{$motif->motif}}</strong></option>
                                @endforeach
                            </select>
                           <div class="card-footer mr-0 text-center">
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
        background-color: #002752;
    }
</style>
