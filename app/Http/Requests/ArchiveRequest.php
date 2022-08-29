<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArchiveRequest extends FormRequest
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
            'usager.nom_usager' => 'required',
            'usager.im_usager' => 'required',
            'usager.telephone_usager' => 'required',
            'arriver.num_arriver' => 'required|numeric',
            'arriver.objet_arriver' => 'required',
            'arriver.destinateur_arriver' => 'required',
        ];
    }


    public function messages()
    {
        return [            
            'usager.nom_usager.required' => "Le nom de l'usager ne peut pas etre vide",
            'usager.im_usager.required' => "Veuillez renseigner le im de l'usager",
            'usager.telephone_usager.required' => "Veuillez renseigner le telephone de l'usager",
            'arriver.num_arriver.required' => "Un dossier doit avoir une numero ",
            'arriver.objet_arriver.required' => "Veuillez renseigner l'obet  du dossier",
            'arriver.destinateur_arriver.required' => "Veuillez renseigner le destinateur du dossier"
         ];
    }
}
