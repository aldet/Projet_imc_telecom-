<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Consigne;
use App\Http\Requests\ConsigneRequest;
use App\Http\Requests\StatutInjoignableRequest;
use App\Http\Requests\StatutRefusRequest;
use App\Http\Requests\StatutChangementContactRequest;
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
        $consigne=Consigne::with([]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consigne=new Consigne();
        return view('consignes.create',[
            'consigne'=>$consigne
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsigneRequest $request)
    {
        $consigne=new Consigne();
        $data=$request->validated();
        $client_id = $data['client_id'];
        $consigne->user_id=Auth::id();
        //dd($data);
        $consigne->fill($data)->save();
        return redirect()->route('client.show', ['client' => $client_id]);
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

    public function Injoignable(Client $client)
    {
        return view('consignes.injoignable',[
            'client'=>$client
        ]);
    }

    public function refus(Client $client)
    {
        return view('consignes.refus',[
            'client'=>$client
        ]);
    }

    public function changementContact(Client $client)
    {
        return view('consignes.changementContact',[
            'client'=>$client
        ]);
    }

    public function injoignableAction(StatutInjoignableRequest $request,Client $client)
    {
         $consigne=new Consigne;
         $data=$request->validated();
         $consigne->statut_client_id=10;
         $client->statut_client_id=10;
         $consigne->user_id=Auth::id();
         $consigne->client_id=$client->id;
         //$consigne->statut_client_id=$client->statut->statut_client_id
         //dd($data);
         $consigne->fill($data)->save();
         $client->save();
         return redirect()->route('client.show',['client' => $client->id]);
    }

    public function refusAction(StatutRefusRequest $request,Client $client)
    {
        $consigne=new Consigne;
        $data=$request->validated();
        $client->statut_client_id=11;
        $consigne->statut_client_id=11;
        $consigne->client_id=$client->id;
        $consigne->user_id=Auth::id();
        //dd($data);
        $client->save();
        $consigne->fill($data)->save();
        return redirect()->route('client.show',['client'=>$client->id]);
    }

    public function changementContactAction(StatutChangementContactRequest $request,Client $client)
    {
        $consigne=new Consigne;
        $data=$request->validated();
        $client->statut_client_id = 12;
        $consigne->user_id=Auth::id();
        $consigne->statut_client_id = 12;
        $consigne->client_id = $client->id;
        $client->save();
        //dd($data);
        $consigne->fill($data)->save();
        return redirect()->route('client.show',['client'=>$client->id]);
    }

}
