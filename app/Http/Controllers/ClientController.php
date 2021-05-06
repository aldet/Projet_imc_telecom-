<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Commune;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Personne;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var Client[] $clients */
        $clients = Client::with(["personne","commune"])->get();
        //dd($clients);
        return view('clients.index',
            ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $client=new Client();
        $client->personne=new Personne();
        $communes=Commune::all(['id','name_commune']);
        return view('clients.create',[
            'client'=>$client,
            'communes'=>$communes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ClientRequest $request)
    {
        $client = new Client();
        $data = $request->validated();
        $client->fill($data['client'])->save();
        $client->personne()->create($data['personne']);
        return response()->redirectToRoute('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('clients.show',['client' =>$client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $communes=Commune::all(['id','name_commune']);
        return view('clients.edit',[
            'client'=>$client,
            'communes'=>$communes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request,Client $client,Personne $personne)
    {
        $data = $request->validated();
        $client->fill($data['client'])->save();
        $client->personne()->update($data['personne']);
        return response()->redirectToRoute('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('client.index');

    }
}
