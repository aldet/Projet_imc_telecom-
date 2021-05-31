<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\Types\Nullable;

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
            'technicien.matricule'=>['required','min:2','max:50'],
            'photo'=>['nullable','image','max:5000'],
            'personne.name_dieuveil'=>'required',
            'personne.prenom'=>'required',
            'personne.email'=>'required',
            'personne.telephone'=>'required',
            'personne.adresse' => 'required',
            'personne.code_postal' => 'required',
            'personne.adresse_map' => 'required',
            'personne.telephone_fixe' => 'required',
            'id_des_competences_du_technicien'=>'min:1'
        ];
    }
}
