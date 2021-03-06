<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Residence;
use App\Models\Commune;
use App\Models\Technicien;
use App\Models\Client;
use App\Models\Marche;
use App\Models\Motif;
use App\Models\Statut;
use App\Models\Personne;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class RechercheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $residences=Residence::all('id','label');
        $marches=Marche::all('id','code_marche');
        $motifs=Motif::all('id','motif');
        $communes=Commune::all('id','name_commune');
        $statuts=Statut::all('id','name_statut');
        $clients=Client::with(["personne"])->get();
        $techniciens=Technicien::with(["personne","competences"])->get();
        $statuts_client=Statut::where('type_statut','client')->get();
        //$techniciens->personne=Personne::all('id');
        return view('recherche.index',compact('motifs','communes','statuts','clients',
            'techniciens','residences','marches','statuts_client'));

    }

    public function resultat()
    {
        $clients = Client::with(["personne","commune","residence"])->get();
        return view('recherche.resultat',[
            'clients'=>$clients
        ]);
    }

    public function rechercheClient(Request $request)
    {
        //$q=request()->input('q');
        $criteres = $request->all();
        //DB::connection()->enableQueryLog();
        //dd($criteres);

        //$clients=Client::where('matricule','like', "%$q%")->get();
        $requeteClients = Client::where(function(Builder $query) use ($criteres){
            // Si le champ de recherche est rempli, on l'utilise pour faire la recherche sur le nom, l'email et l'adresse dans le modele Personne
            if (isset($criteres['recherche']) && strlen($criteres['recherche']) > 0) {
                $recherche = $criteres['recherche'];
                $query->whereHas('personne',function (Builder $query) use ($recherche) {
                        $query->where('name','like',"%$recherche%")
                            ->orWhere('email','like',"%$recherche%")
                            ->orWhere('adresse','like',"%$recherche%");
                });
                // Si le champ de recherche est rempli, on l'utilise pour faire la recherche sur le matricule
                $query->orWhere('matricule','like',"%$recherche%");
            }
        });

        if (isset($criteres['adresse'])  && count($criteres['adresse']) > 0){
            $adresse=$criteres['adresse'];
            $requeteClients->whereHas('personne',function (Builder $query) use ($adresse){
                $query->where('adresse','like',"%$adresse%");
            });
        }

        // Si le champ de commune est rempli, on l'utilise pour faire la recherche sur le nom de la commune
        if ((isset($criteres['commune']) && is_array($criteres['commune']) && count($criteres['commune']) > 0) || (isset($criteres['marche']) && is_array($criteres['marche']) && count($criteres['marche']) > 0)){
            $communes = $criteres['commune'] ?? [];
            $marche = $criteres['marche'] ?? [];
            $requeteClients->whereHas('commune',function (Builder $query) use ($communes, $marche) {
                if (count($communes)) {
                    $query->whereIn('id', $communes);
                }
                if (count($marche)) {
                    $query->whereHas('marche' ,function(Builder $query) use ($marche){
                        $query->whereIn('id',$marche);
                    });

                }
            });
        }

        // Si le champ de type est rempli, on l'utilise pour faire la recherche sur la r??sidence du client
        if (isset($criteres['type']) && is_array($criteres['type']) && count($criteres['type']) > 0) {
            $type = $criteres['type'];
            $requeteClients->whereHas('residence',function (Builder $query) use ($type) {
                $query->whereIn('id',$type);
            });
        }
        if (isset($criteres['type']) && is_array($criteres['type']) && count($criteres['type']) > 0) {
            $type = $criteres['type'];
            $requeteClients->whereHas('residence',function (Builder $query) use ($type) {
                $query->whereIn('id',$type);
            });
        }
        if(isset($criteres['motif']) && is_array($criteres['motif']) && count($criteres['motif']) > 0){
            $motif=$criteres['motif'];
            $requeteClients->whereHas('motif',function (Builder $query) use ($motif){
                $query->whereIn('id',$motif);
            });
        }

        $clients = $requeteClients->get();

        //$queries = DB::getQueryLog();
        //dump($queries);
        return view('recherche.resultat')->with('clients',$clients);

    }

 }
