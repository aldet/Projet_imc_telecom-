<?php

namespace App\Http\Controllers;
use App\Http\Requests\CommuneRequest;
use App\Models\Competence;
use App\Models\Marche;
use Illuminate\Http\Request;
use App\Models\Commune;
use App\Models\Client;
class CommuneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var commune[] $communes*/
        $communes=Commune::with(["marche"])->get();
        return view('communes.index',['communes'=>$communes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $commune=new Commune();
        $marches=Marche::all(['id','code_marche']);
        return view('communes.create',[
            'commune'=>$commune,
            'marches'=>$marches
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommuneRequest $request)
    {
        $commune=new Commune();
        $data=$request->validated();
        //dd($data);
        $commune->fill($data)->save();
        return response()->redirectToRoute('commune.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Commune $commune)
    {
        return view('communes.show',[
            'commune'=>$commune
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Commune $commune)
    {
        $marches=Marche::all(['id','code_marche']);
        $oldInput=session()->getOldInput();
        $commune->fill($oldInput);
        return view('communes.edit',[
            'commune'=>$commune,
            'marches'=>$marches
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommuneRequest $request,Commune $commune)
    {
        $commune->update($request->validated());
        $commune->save();
        return response()->redirectToRoute('commune.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commune $commune)
    {
        $commune->delete();
        return redirect()->route('commune.index');
    }
/*
    public function rechercheCommune()
    {
        $p=request()->input('p');
        $communes=Commune::where('name_commune','like', "%$p%")->get();
        dd($communes);
        return view('recherche.resultat')->with('communes',$communes);
    }
*/
}
