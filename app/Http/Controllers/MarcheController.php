<?php

namespace App\Http\Controllers;
use App\Http\Requests\MarcheRequest;
use App\Models\Marche;
use App\Models\Commune;
use Illuminate\Http\Request;

class MarcheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marches=Marche::all();
        return view('marches.index',[
            'marches'=>$marches
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marche=new Marche();
        return view('marches.create',[
            'marche'=>$marche,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarcheRequest $request)
    {
       $marche=new Marche();
       $data=$request->validated();
       $marche->fill($data)->save();
       return response()->redirectToRoute('marche.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Marche $marche)
    {

        return view('marches.show',[
            'marche'=>$marche
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Marche $marche)
    {
        return view('marches.edit',[
            'marche'=>$marche
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MarcheRequest $request,Marche $marche)
    {
        $marche->update($request->validated());
        $marche->save();
        return response()->redirectToRoute('marche.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marche $marche)
    {
        $marche->delete();
        return redirect()->route('marche.index');
    }
}
