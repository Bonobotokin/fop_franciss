<?php
namespace App\Action;

use Exception;
use App\Models\User;
use App\Models\Personnel;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PersonnelRequest;
use App\Repository\PersonnelsRepository;

class PersonnelAction{
    
    public function handle(PersonnelRequest $request)
    {
        try {
            $data = DB::transaction(function() use ($request)
            {        
                $personnel = Personnel::Create([
                    'im_personnel' => $request->personnel['im_personnel'],
                    'nom_personnel' => $request->personnel['nom_personnel'],
                    'fonction_personnel' => $request->personnel['fonction_personnel'],
                    'telephone_personnel' => $request->personnel['telephone_personnel']
                ]);
                $id_personnels = $personnel->id_personnel;
                $users = User::Create([
                    "name" => $request->user["name"],
                    "id_personnel" => $id_personnels,
                    "role" =>  $request->user["role"],
                    "password" => $request->user["password"]
                ]);
                // dd($users);exit;
                return [
                    "data"    => $personnel->id_personnel,
                    "message" => "$personnel->nom_personnel  a été bien enregistré",
                ];
               
            });   
            return $data;
            
        } catch (Exception $th) {
            return $th;
        }
    }
}


