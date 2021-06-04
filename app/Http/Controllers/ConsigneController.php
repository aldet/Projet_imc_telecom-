<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Consigne;
use App\Http\Requests\ConsigneRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsigneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consigne=new Consigne();
        return view('consignes.create',compact('consigne'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsigneRequest $request,Client $client)
    {
        $consigne=new Consigne();
        $data=$request->validated();
        //Auth::user()->getId;
        $this->user_id=Auth::id();
        dd($this->user_id);
        $consigne->fill($data)->save();
        return redirect()->route('client.show',$client);
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
        $consigne=new Consigne();
        $consigne->delete();
        return redirect()->route('consigne.index');
    }
}
