<?php
namespace App\Repository;

use Carbon\Carbon;
use App\Models\Usager;
use App\Models\Arriver;
use App\Models\Depart;
use App\Models\Personnel;
use App\Models\EtatDossier;
use Illuminate\Support\Facades\DB;
use App\Interface\ArchivesRepositoryInterface;


class ArchivesRepository implements ArchivesRepositoryInterface
{
    public function getAllArchive()
    {
        $archives = EtatDossier::with('Usager','personnel','arriver','Depart','transmission')
                                ->get()
                                ->map(function($archives) {
                                    // dd($archives);

                                    $date_arriver = is_null($archives->arriver)? null : Carbon::parse($archives->arriver->created_at)->format('d/m/Y');
                                    $date_depart = is_null($archives->depart)? null : Carbon::parse($archives->depart->created_at)->format('d/m/Y');
                                    $date_transmission = is_null($archives->transmission)? null : Carbon::parse($archives->transmission->created_at)->format('d/m/Y');
                                    return [
                                        'id_etat_dossier' => $archives->id_etat_dosiier,
                                        'id_usager' => $archives->Usager->id_usager,
                                        'numero' => $archives->Usager->im_usager,
                                        'usagers' => $archives->Usager->nom_usager,
                                        'id_arriver' => $archives->arriver->id_arriver,
                                        'date_arriver' => $date_arriver,
                                        'date_depart' => $date_depart,
                                        'id_depart' => is_null($archives->depart)? null : $archives->depart->id_depart,
                                        'departement_numero' => is_null($archives->depart)? null : $archives->depart->numero_depart,
                                        'date_transmission' => $date_transmission,
                                        'id_transmission' => is_null($archives->transmission) ? null : $archives->transmission->id_transmission,
                                    ];
                                });
        return $archives;
    }
}