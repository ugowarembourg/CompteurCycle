<?php

namespace UgoWarembourg\Compteurcycle\Controllers;

use App\Http\Controllers\Controller;
use App\Message;
use App\Sensor;
use Carbon\Carbon;
use UgoWarembourg\Compteurcycle\Models\CompteurCycle;
use UgoWarembourg\Compteurcycle\Models\CompteurCycleConfig;
use UgoWarembourg\Compteurcycle\Models\CompteurCycleErreur;
use Illuminate\Http\Request;
use UgoWarembourg\Compteurcycle\Models\CompteurCycleState;




class CompteurcycleController extends Controller
{
    public function index(Request $request, $id)
    {
     //dd($request->toArray());

        $config = CompteurCycleConfig::find($id);
        //$state = CompteurCycleState::find();

        if($request->exists('tempsouv'))
        {
            $tempsouv= $request->tempsouv;
        }
        else
        {
            $tempsouv=null;
        }
        if($request->exists('intervalcycle'))
        {
            $intervalcycle = $request->intervalcycle;
        }
        else
        {
            $intervalcycle=null;
        }
        if($request->exists('nberreur'))
        {
            $nberreur = $request->nberreur;
        }
        else
        {
            $nberreur=null;
        }
        if($request->exists('commentaire'))
        {
            $commentaire = $request->commentaire;
        }
        else
        {
            $commentaire=null;
        }
        if($request->exists('date'))
        {
            $date = $request->date;
        }
        else
        {
            $date=null;
        }

        //dd($tempsouv,$intervalcycle,$nberreur,$commentaire,$date);
        $erreurs =CompteurCycleErreur::orderBy('created_at', 'desc')->paginate(20);
        //$erreur =$erreurs->orderBy('created_at', 'desc');dd($request);
        //dd($erreurs->toArray());
        return view('compteurcycle::infos')->with([
            'config' => $config,
            'vue' => $request->view,
            'erreurs'=>$erreurs,
        ]);

    }

    public function postInfo($id, Request $request)
    {
        $this->validate($request,[
           'tempsouv' => 'required|numeric',
           'intervalcycle' => 'required|numeric',
           'nberreur' => 'required|numeric',
           'commentaire' => 'required',

        ]);
        //dd($request->toArray());
        $config = CompteurCycleConfig::find($id);
        $config->temps_ouverture = $request->tempsouv;
        $config->interval_cyclage = $request->intervalcycle;
        $config->nb_erreurs_max = $request->nberreur;
        $config->commentaire = $request->commentaire;
        $config->created_at = Carbon::now();
        $config->save();

        $config->compteur->sendConfig();

        return redirect()->back();
    }

    public function postCommande($id, Request $request)
    {
//dd($request->toArray());
        if($request->action)
        {
            $action = CompteurCycleConfig::find($id);
            //$start = $request->start;
            //dd($request->toArray());
            $action->compteur->sendStart($request->action);
        }

        return redirect()->back();
    }




}