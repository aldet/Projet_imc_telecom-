<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Residence;
use App\Models\Commune;
use App\Models\Technicien;
use App\Models\Client;
use App\Models\Personne;
use Illuminate\Database\Eloquent\Builder;
class RechercheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $residences=Residence::all('id','label');
        $communes=Commune::all('id','name_commune');
        $techniciens=Technicien::with(["personne","competences"])->get();
        //$techniciens->personne=Personne::all('id');
        return view('recherche.index',[
            'residences'=>$residences,
            'communes'=>$communes,
            'techniciens'=>$techniciens
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function resultat()
    {
        $clients = Client::with(["personne","commune","residence"])->get();
        return view('recherche.resultat',[
            'clients'=>$clients
        ]);
    }
    public function rechercheClient()
    {
        $q=request()->input('q');
        //$clients=Client::where('matricule','like', "%$q%")->get();
        $clients=Client::whereHas('personne',function (Builder $query) use ($q)
        {
            $query->where('name','like',"%$q%")
                   ->orWhere('matricule','like',"%$q%")
                   ->orWhere('email','like',"%$q%");
        })->get();
        //dd($clients);
        return view('recherche.resultat')->with('clients',$clients);

    }
}
