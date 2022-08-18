<?php
namespace App\Action;

use App\Models\Personnel;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PersonnelRequest;

class PersonnelAction{
    
    public function handle(PersonnelRequest $request)
    {
        try {
            $personnels_data = $request->personnel;
            // dd($personnels_data,'eto');
            $data = DB::transaction(function() use ($request)
            {        
                $personnel = Personnel::Create([
                    'im_personnel' => $request->personnel['im_personnel'],
                    'nom_personnel' => $request->personnel['nom_personnel'],
                    'fonction_personnel' => $request->personnel['fonction_personnel'],
                    'telephone_personnel' => $request->personnel['telephone_personnel']
                ]);
                // dd($personnel->id);
                // dd($personnel->personnel_id,'eto');exit;
                return [
                    "data"    => $personnel->id,
                    "message" => "L'insertion de l'acte du $personnel->nom_personnel  a été bien effectué",
                ];
               
            });   
            // var_dump($personnel);
            return $data;
            
        } catch (\Exception $th) {
            //throw $th;
            // dd('3to');
            return $th;
        }
    }
}


