<?php
namespace App\Action;

use App\Models\User;
use App\Models\Depart;
use App\Models\Usager;
use App\Models\Arriver;
use App\Models\EtatDossier;
use App\Models\Transmission;
use Illuminate\Http\Request;
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
                        "message" => "Le dossier de $usager->nom_usager  a été bien Livrer",
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
                    $id_personnel_connecteds = Auth::user()->id_personnel;
                    $depart = Depart::Create([
                        'numero_depart' => $request->depart['numero_depart'],
                        'motif_depart' => $request->depart['motif_depart'],
                        'id_usager' => $request->depart['id_usager']
                    ]);
                    $id_depart = $depart->id_depart;
                    $id_usager = $request->depart['id_usager'];

                    $data_depart = EtatDossier::where('id_etat_dosiier',1)
                                                ->update([
                                                    'id_usager' => $id_usager,
                                                    'id_arriver' => $request->depart['id_arriver'],
                                                    'id_depart' => $id_depart,
                                                    'id_transmission' =>  $request->depart['id_transmission'],
                                                    'id_personnel' => $id_personnel_connecteds
                                                ]);      
                    return [
                        "data"    => $depart->id_depart,
                        "message" => "L'insertion du $depart->nom_depart  a été bien effectué",
                    ];
               
            });   
            return $data;
            
        } catch (\Exception $th) {
            return $th;
        }
    }


    public function transmission(Request $request)
    {
        try {
            dd($request);exit;
            $data = DB::transaction(function() use ($request)
            {     
                    $id_personnel_connecteds = Auth::user()->id_personnel;
                    $transmission = Transmission::Create([
                        'numero_transmission' => $request->transmission['numero_transmission'],
                        'id_usager' => $request->depart['id_usager']
                    ]);
                    $id_transmission = $transmission->id_transmission;
                    $id_usager = $request->depart['id_usager'];

                    $data_depart = EtatDossier::where('id_etat_dosiier',1)
                                                ->update([
                                                    'id_usager' => $id_usager,
                                                    'id_arriver' => $request->depart['id_arriver'],
                                                    'id_depart' => $request->depart['id_depart'],
                                                    'id_transmission' =>  $id_transmission,
                                                    'id_personnel' => $id_personnel_connecteds
                                                ]);      
                    return [
                        "data"    => $transmission->id_transmission,
                        "message" => "L'insertion a été bien transmit",
                    ];
               
            });   
            return $data;
            
        } catch (\Exception $th) {
            return $th;
        }
    }
}