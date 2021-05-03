<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonneRequest extends FormRequest
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
        $personne=$this->route()->parameter('personne');
        return [
            'name' =>['required','min:2','max:255'],
            'prenom' => ['required', 'min:2', 'max:255'],
            'email'       => [
                'email:rfc',
                Rule::unique('App\Personne', 'email')->ignore($personne),
            ],
            'adresse'=>['required', 'min:2', 'max:255'],
            'telephone'=>['nullable', 'min:4', 'max:50'],
            'code_postal'=>['nullable', 'min:4', 'max:50'],
            'telephone_fixe'=>['nullable', 'min:4', 'max:50']
        ];
    }
}
