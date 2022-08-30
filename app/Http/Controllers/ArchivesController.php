<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Action\ArchiveAction;
use App\Http\Requests\DepartRequest;
use App\Http\Requests\ArchiveRequest;
use App\Repository\ArchivesRepository;

class ArchivesController extends Controller
{
    //
    private $archivesRepository;
    public function __construct(
                                ArchivesRepository $archivesRepository,
                                )
    {
        $this->archivesRepository = $archivesRepository;
    }
    public function index()
    {
        $allArchives = $this->archivesRepository->getAllArchive();
        // dd($allArchives);
        return view('archives.index',
                    [
                        'allArchives' => $allArchives
                    ]
                    );
    }


    public function store(ArchiveRequest $request, ArchiveAction $action)
    {
        try {

            $reponse_action = $action->handle($request);
            // dd($reponse_action,'eto reponse');
            if (!is_null($reponse_action['data'])) {
                // dd('ok');
                return redirect()->route('archives.listes',['reponse'=>$reponse_action])->with('success', $reponse_action['message']);
                
            }else {
                
                dd('no');
                // return redirect()::back()->withErrors($errors)->withInput();
                return redirect()->route('archives.listes',['reponse'=>$reponse_action])->with('errors',$reponse_action['message']);
            }
        } catch (Exception $th) {
            //throw $th;
                // dd('no');
            return $th;
        }
    }

    public function storeDepart(DepartRequest $request, ArchiveAction $action)
    {
        try {

            $reponse_action = $action->departement($request);
            dd($reponse_action,'eto reponse');
            if (!is_null($reponse_action['data'])) {
                // dd('ok');
                return redirect()->route('archives.listes',['reponse'=>$reponse_action])->with('success', $reponse_action['message']);
                
            }else {
                
                dd('no');
                // return redirect()::back()->withErrors($errors)->withInput();
                return redirect()->route('archives.listes',['reponse'=>$reponse_action])->with('errors',$reponse_action['message']);
            }
        } catch (Exception $th) {
            //throw $th;
                // dd('no');
            return $th;
        }
    }


    public function storeTransmission(Request $request, ArchiveAction $action)
    {
        try {

            $reponse_action = $action->transmission($request);
            dd($reponse_action,'eto reponse');
            if (!is_null($reponse_action['data'])) {
                // dd('ok');
                return redirect()->route('archives.listes',['reponse'=>$reponse_action])->with('success', $reponse_action['message']);
                
            }else {
                
                dd('no');
                // return redirect()::back()->withErrors($errors)->withInput();
                return redirect()->route('archives.listes',['reponse'=>$reponse_action])->with('errors',$reponse_action['message']);
            }
        } catch (Exception $th) {
            //throw $th;
                // dd('no');
            return $th;
        }
    }

}
