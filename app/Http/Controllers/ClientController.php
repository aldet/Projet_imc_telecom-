<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Commune;
use App\Models\Residence;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Personne;
use App\Models\Motif;
use App\Models\Statut;
use Illuminate\Support\Facades\DB;

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
        $clients = Client::with(["personne","commune","residence","statut"])->get();
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
        $motifs=Motif::all(['id','motif']);
        $statuts=Statut::all(['id','name_statut']);
        $residences=Residence::all(['id','label']);
        $oldInput=session()->getOldInput();
        $client->fill($oldInput);
        return view('clients.create',[
            'client'=>$client,
            'communes'=>$communes,
            'residences'=>$residences,
            'motifs'=>$motifs,
            'statuts'=>$statuts
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
        //dd($data);
        try {
            DB::beginTransaction();
            $client->fill($data['client'])->save();
            $client->personne()->create($data['personne']);
            DB::commit();
            return response()->redirectToRoute('client.index');
        }
        catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->route('client.create')->with('databaseError', $e->getMessage());
        }
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
        $residences=Residence::all(['id','label']);
        $motifs=Motif::all(['id','motif']);
        $statuts=Statut::all(['id','name_statut']);
        return view('clients.edit',[
            'client'=>$client,
            'communes'=>$communes,
            'residences'=>$residences,
            'motifs'=>$motifs,
            'statuts'=>$statuts
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
    public function recherche()
    {

    }
}
