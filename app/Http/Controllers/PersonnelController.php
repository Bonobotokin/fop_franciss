<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Personnel;
use Illuminate\Http\Request;
use App\Action\PersonnelAction;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PersonnelRequest;
use Illuminate\Support\Facades\Validator;

class PersonnelController extends Controller
{
    //

    public function index()
    {
        return view('personnel.index');
    }

    public function create()
    {
        return view('personnel.create');
    }


    public function  store(PersonnelRequest $request, PersonnelAction $action)
    {
        try {

            $reponse_action = $action->handle($request);
            // dd($reponse_action,'eto reponse');
            if (!is_null($reponse_action['data'])) {
                // dd('ok');
                return redirect()->route('personnels.create',['reponse'=>$reponse_action])->with('success', $reponse_action['message']);
                
            }else {
                
                dd('no');
                // return redirect()::back()->withErrors($errors)->withInput();
                return redirect()->route('personnels.create',['reponse'=>$reponse_action])->with('errors',$reponse_action['message']);
            }
        } catch (\Exception $th) {
            //throw $th;
                // dd('no');
            return $th;
        }
    }


    public function register(Request $request)
    {
        $request =  User::create([
            'name' => $request->name,
            'password' => Hash::make($request['password']),
            'role' => $request->role
        ]);
        dd('okk');

        return  redirect()->route('personnels.create') ;
    }
}