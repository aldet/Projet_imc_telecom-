<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatutRequest extends FormRequest
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
        return [
            'name_statut'=>['required','min:2','max:50'],
            'type_statut'=>['min:2','max:50']
        ];
    }
}
