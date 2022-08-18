<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonnelRequest extends FormRequest
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
            //
            'personnel.im_personnel' => 'required|numeric',
            'personnel.nom_personnel' => 'required',
            'personnel.fonction_personnel' => 'required',
        ];
    }

    public function messages()
    {
        return [            
            'im_personnel.required' => 'Un personnel doit avoir un numero matricule',
            'nom_personnel.required' => 'Un personnel doit avoire un nom et prenom',
            'fonction_personnel.required' => 'Veuillez designe le fonction de personnel',
         ];
    }
}
