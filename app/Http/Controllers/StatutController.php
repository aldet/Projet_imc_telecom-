<?php

namespace App\Http\Controllers;
use App\Http\Requests\StatutRequest;
use Illuminate\Http\Request;
use App\Models\Statut;

class StatutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuts=Statut::all();
        return view('statuts.index',[
            'statuts'=>$statuts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statut=new Statut();
        return view('statuts.create',[
            'statut'=>$statut
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatutRequest $request)
    {
        $statut=new Statut();
        $statut->fill($request->validated())->save();
        return response()->redirectToRoute('statut.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Statut $statut)
    {
        return view('statuts.show',[
            'statut'=>$statut
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Statut $statut)
    {
        return view('statuts.edit',[
            'statut'=>$statut
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StatutRequest $request,Statut $statut)
    {
        $statut->update($request->validated());
        $statut->save();
        return response()->redirectToRoute('statut.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statut $statut)
    {
        $statut->delete();
        return redirect()->route('statut.index');
    }
}
