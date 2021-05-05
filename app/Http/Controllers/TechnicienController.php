<?php

namespace App\Http\Controllers;

use App\Http\Requests\TechnicienRequest;
use App\Models\Personne;
use Illuminate\Http\Request;
use App\Models\Technicien;
class TechnicienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var Technicien[] $techniciens */

        $techniciens=Technicien::with(["personne"])->get();
         //dd($techniciens);
        return view('techniciens.index',[
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
        $technicien=new Technicien();
        $technicien->personne=new Personne();
        return view('techniciens.create',[
            'technicien'=>$technicien
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TechnicienRequest $request)
    {
        $technicien = new Technicien();
        $data = $request->validated();
        $technicien->fill($data['technicien'])->save();
        $technicien->personne()->create($data['personne']);
        return response()->redirectToRoute('technicien.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Technicien $technicien)
    {
        return view('technicien.show',[
            'technicien'=>$technicien
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Technicien $technicien)
    {
        return view('techniciens.edit',[
            'technicien'=>$technicien
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TechnicienRequest $request,Technicien $technicien)
    {
        $data=$request->validated();
        $technicien->fill($data['technicien'])->save();
        $technicien->personne()->update($data['personne']);
        response()->redirectToRoute('technicien.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technicien $technicien)
    {
        $technicien->delete();
        return redirect()->route('technicien.index');
    }
}
