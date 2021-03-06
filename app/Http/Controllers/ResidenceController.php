<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use  App\Http\Requests\ResidenceRequest;
use App\Models\Residence;

class ResidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residences=Residence::all();
        return view('residences.index',[
            'residences'=>$residences
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $residence=new Residence();
        return view('residences.create',[
            'residence'=>$residence
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResidenceRequest $request)
    {
        $residence=new Residence();
        $data=$request->validated();
        $residence->fill($data)->save();
        return response()->redirectToRoute('residence.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('residences.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Residence $residence)
    {
        return view('residences.edit',[
            'residence'=>$residence
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ResidenceRequest $request,Residence $residence)
    {
        $residence->update($request->validated());
        $residence->save();
        return response()->redirectToRoute('residence.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Residence $residence)
    {
        $residence->delete();
        return redirect()->route('residence.index');
    }
}
