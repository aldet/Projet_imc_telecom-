<?php

namespace App\Http\Controllers;

use App\Http\Requests\TechnicienRequest;
use App\Models\Competence;
use App\Models\Personne;
use Illuminate\Http\Request;
use App\Models\Technicien;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

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

        $techniciens=Technicien::with(["personne","competences"])->get();
         //dd($techniciens);
        return view('techniciens.index',['techniciens'=>$techniciens]);
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
        $competences=Competence::all(['id','label']);
        //$technicien->attach($competences);
        return view('techniciens.create',[
            'technicien'=>$technicien,
            'competences'=>$competences
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
        if ($request->hasFile('photo'))
        {
            $path=$request->file('photo')->store('photos_techniciens','public');
            $data["technicien"]["photo"]=$path;
        }
         //dd($request->post(), $data);
        try {
            DB::beginTransaction();
            $technicien->fill($data['technicien'])->save();
            // On ne peut pas faire $technicien->personne()->create($data['personne']);
            // car il y a un champ 'name_dieuveil' qu'il ne connait pas
            // Il ne sait pas comment traiter 'name_dieuveil'
            // ce que nous voulons c'est que 'name_dieuveil' soit affecté au champ 'name' de Personne
            // sinon le champ 'name' de Personne sera vide et on risque d'avoir l'erreur: "SQLSTATE[HY000]: General error: 1364 Field 'name' doesn't have a default value
            // donc on va devoir faire ça manuellement.
            // c'est pour éviter ce travail manuel que souvent on donne au champ du formulaire le même attribut 'name' que ce qu'il y a dans la base de données

            $personne = $technicien->personne()->make($data['personne']);
            $personne->name = $data['personne']['name_dieuveil']; // on fait le mapping manuel du champ 'name_dieuveil' vers 'name'
            // après on fait la sauvegarde
            $personne->save();
            $technicien->competences()->sync($data['id_des_competences_du_technicien']);
            DB::commit();
            return response()->redirectToRoute('technicien.index');
        }
        catch (\Throwable $e) {
            DB::rollBack();
            dd($e->getMessage());
            return redirect()->route('technicien.create');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Technicien $technicien)
    {
        return view('techniciens.show',[
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
        $competences=Competence::all();
        return view('techniciens.edit',[
            'technicien'=>$technicien,
            'competences'=>$competences
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
        // On ne peut pas faire $technicien->personne()->create($data['personne']);
        // car il y a un champ 'name_dieuveil' qu'il ne connait pas
        // Il ne sait pas comment traiter 'name_dieuveil'
        // ce que nous voulons c'est que 'name_dieuveil' soit affecté au champ 'name' de Personne
        $personne = $technicien->personne;
        $personne->name = $data['personne']['name_dieuveil']; // on fait le mapping manuel du champ 'name_dieuveil' vers 'name'
        $personne->fill($data['personne']);
        // après on fait la sauvegarde
        $personne->save();

        //update image
        if ($request->hasFile('photo'))
        {
            $path=$request->file('photo')->store('photos_techniciens','public');
            $data["technicien"]["photo"]=$path;
        }

        $technicien->fill($data['technicien'])->save();
        //$competences= $data['id_des_competences_du_technicien']??[]; // forme contractée on a utilisé ?? opérateur Null coalescent
        $competences= isset($data['id_des_competences_du_technicien']) ? $data['id_des_competences_du_technicien'] : [];
        unset($data['competences']);
        $technicien->competences()->sync($competences);

        //$technicien->personne()->update($data['personne']);
        return response()->redirectToRoute('technicien.index');

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
