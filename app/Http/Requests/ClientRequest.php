<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Client;
class ClientRequest extends FormRequest
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
        $client=$this->route()->parameter('client');
        return [
            'client.matricule' =>['required','min:2','max:50'],
            'personne.name' => 'required',
            'personne.prenom' => 'required',
            'personne.email' => 'required',
            'personne.adresse' => 'required',
            'personne.code_postal' => 'required',
            'personne.telephone' => 'required',
            'personne.telephone_fixe' => 'required',
            'personne.adresse_map'=>'',
            'client.commune_id'=>'required',

         ];
    }
}
