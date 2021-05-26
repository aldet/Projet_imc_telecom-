<?php

namespace App\Http\Requests;

use App\Models\Personne;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Client;
use Illuminate\Validation\Rule;

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
        /** @var Client $client */
        $client = $this->route()->parameter('client');
        return [
            'client.matricule' =>['required','min:2','max:50'],
            'personne.name' => 'required',
            'personne.prenom' => 'required',
            'personne.email' => [
                'required',
                $client ? Rule::unique('personnes', 'email')->ignore($client->personne->id) : Rule::unique('personnes', 'email'),
            ],
            'personne.adresse' => 'required',
            'personne.code_postal' => 'required',
            'personne.telephone' => 'required',
            'personne.telephone_fixe' => 'required',
            'personne.adresse_map'=>'',
            'client.commune_id'=>'required',
            'client.residence_id'=>'required',
            'client.motif_id'=>'required',
            'client.statut_id'=>'required'

         ];
    }
}
