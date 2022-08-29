<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'depart.numero_depart' => 'required|numeric',
        ];
    }


    public function messages()
    {
        return [            
            'depart.numero_depart.required' => "Veuillez renseigner le numero du dossier ",
            'depart.motif_depart.required' => "Veuillez renseigner le motif  du dossier",
         ];
    }
}
