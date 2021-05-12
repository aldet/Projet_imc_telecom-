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
        $path=$request->file('photo')->store('photos_techniciens');
        $data["technicien"]["photo"]=$path;
//         dd($request->post(), $data);
        try {
            DB::beginTransaction();
            $technicien->fill($data['technicien'])->save();
            $technicien->personne()->create($data['personne']);
            $technicien->competences()->sync($data['id_des_competences_du_technicien']);
            DB::commit();
            return response()->redirectToRoute('technicien.index');
        }
        catch (\Throwable $e) {
            DB::rollBack();
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
