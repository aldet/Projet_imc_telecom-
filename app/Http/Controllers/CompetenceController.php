<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompetenceRequest;
use App\Models\Competence;
class CompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  /** @var competence[] $competences*/
        $competences=Competence::all();
        return view('competences.index',[
            'competences'=>$competences
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $competence=new Competence();
        return view('competences.create',[
            'competence'=>$competence
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompetenceRequest $request)
    {
        $competence=new Competence();
        $competence->fill($request->validated())->save();
        return response()->redirectToRoute('competence.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Competence $competence)
    {
        return view('competences.show',[
            'competence'=>$competence
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Competence $competence)

    {
        $oldInput=session()->getOldInput();
        $competence->fill($oldInput);
        return view('competences.edit',[
            'competence'=>$competence
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(competenceRequest $request,Competence $competence,$id)
    {
        $competence->update($request->validated());
        $competence->save();
        return response()->redirectToRoute('competence.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competence $competence)
    {
        $competence->delete();
        return redirect()->route('competence.index');
    }
}
