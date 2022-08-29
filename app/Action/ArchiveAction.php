<?php
namespace App\Action;

use App\Models\User;
use App\Models\Depart;
use App\Models\Usager;
use App\Models\Arriver;
use App\Models\EtatDossier;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DepartRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArchiveRequest;


class ArchiveAction
{
    public function handle(ArchiveRequest $request)
    {
        try {
            $usager_data = $request->usager;
            $data = DB::transaction(function() use ($request)
            {     
                    $usager = Usager::Create([
                        'im_usager' => $request->usager['im_usager'],
                        'nom_usager' => $request->usager['nom_usager'],
                        'telephone_usager' => $request->usager['telephone_usager']
                    ]);
                    $id_usager = $usager->id_usager;
                    $arriver = Arriver::Create([
                        'numero_arriver'  => $request->arriver['num_arriver'],
                        'id_usager' => $id_usager,
                        'objet_arriver' => $request->arriver['objet_arriver'],
                        'destinateur_arriver' => $request->arriver['destinateur_arriver'],
                    ]);
    
                    $id_personnel_connected = Auth::user()->id_personnel;
    
                    $etatDossier = EtatDossier::Create([
                        'id_usager' => $id_usager,
                        'id_arriver'  => $id_usager,
                        'id_depart' => null,
                        'id_transmission' => null,
                        'id_personnel' => $id_personnel_connected,
                    ]);
                    return [
                        "data"    => $usager->id_usager,
                        "message" => "L'insertion de l'acte du $usager->nom_usager  a été bien effectué",
                    ];
               
            });   
            return $data;
            
        } catch (\Exception $th) {
            return $th;
        }
    }


    public function departement(DepartRequest $request)
    {
        try {
            // dd($request);exit;
            $data = DB::transaction(function() use ($request)
            {     
                // dd($request);
                    $depart = Depart::Create([
                        'numero_depart' => $request->depart['numero_depart'],
                        'motif_depart' => $request->depart['motif_depart'],
                        'id_usager' => $request->depart['id_usager']
                    ]);
                    // $id_depart = $depart->id_depart;
                    // $id_usager = $request->depart['id_usager'];
                    // // dd($id_depart,$id_usager);exit;
                    // $id_personnel_connected = Auth::user()->id_personnel;
                    // // dd((int)$request->depart['id_usager']);

                    // $data_depart = Depart::find( (int)$depart['etatDossier_id']);

                    // $data_depart->id_usager = (int)$request->depart['id_usager'];
                    // $data_depart->id_arriver = $request->$depart['id_arriver'];
                    // $data_depart->id_depart = $id_depart;
                    // $data_depart->id_transmission = null;
                    // $data_depart->id_personnel = null;

                    // dd($data_depart);
                    return [
                        "data"    => $depart->id_depart,
                        "message" => "L'insertion de l'acte du $depart->nom_depart  a été bien effectué",
                    ];
               
            });   
            return $data;
            
        } catch (\Exception $th) {
            return $th;
        }
    }
}