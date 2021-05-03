<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TechnicienRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $technicien=$this->route()->parameter('technicien');

        return [
            'tecnicien.matricule'=>['required','min:2','max:50'],
            'personne.name'=>'required',
            'personne.prenom'=>'required',
            'personne.email'=>'required',
            'personne.telephone'=>'required',
            'personne.adresse' => 'required',
            'personne.code_postal' => 'required',
            'personne.adresse_map' => 'required',
            'personne.telephone_fixe' => 'required',
        ];
    }
}
