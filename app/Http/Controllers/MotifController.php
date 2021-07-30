<?php

namespace App\Http\Controllers;

use App\Http\Requests\MotifRequest;
use App\Models\Motif;
use Illuminate\Http\Request;

class MotifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motifs=Motif::all();
        return view('motifs.index',[
            'motifs'=>$motifs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $motif=new Motif();
        return view('motifs.create',[
            'motif'=>$motif
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MotifRequest $request)
    {
        $motif=new Motif();
        $data=$request->validated();
        //dd($data);
        $motif->fill($data)->save();
        return response()->redirectToRoute('motif.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Motif $motif)
    {
        return view('motifs.show',[
            'motif'=>$motif
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Motif $motif)
    {
         return view('motifs.edit',[
             'motif'=>$motif
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MotifRequest $request,Motif $motif)
    {
        $motif->update($request->validated());
        $motif->save();
        return response()->redirectToRoute('motif.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Motif $motif)
    {

        $motif->delete();
        return redirect()->route('motif.index');
    }
}
