<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maille;
use App\Http\Requests\MailleRequest;
class MailleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mailles=Maille::all();
        return view('mailles.index',[
            'mailles'=>$mailles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maille=new Maille();
        return view('mailles.create',[
            'maille'=>$maille
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MailleRequest $request)
    {
        $maille=new Maille();
        $data=$request->validated();
        $maille->fill($data)->save();
        return response()->redirectToRoute('maille.index');

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
    public function edit(Maille $maille)
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maille $maille)
    {
        $maille->delete();
        return redirect()->route('maille.index');
    }
}
