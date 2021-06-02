<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarcheRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code_marche'=>['required','min:2','max:50'],
            'label_marche'=>'required',
        ];
    }
}
