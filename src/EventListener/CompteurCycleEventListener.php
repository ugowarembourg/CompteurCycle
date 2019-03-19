<?php

namespace UgoWarembourg\Compteurcycle\EventListener;

use App\Events\MSMessageEvent;
use App\Sensor;
use App\SensorFactory;
use UgoWarembourg\Compteurcycle\Events\CompteurCycleEvent;
use UgoWarembourg\Compteurcycle\Models\CompteurCycleConfig;
use UgoWarembourg\Compteurcycle\Models\CompteurCycleErreur;

class CompteurCycleEventListener
{
    public $types = [
        'ouverture' => 24,
        'fermeture' => 25,
        'ouverte' => 27,
        'fermee' => 28,
        'porteerreur' => 100,
        'cycle' => 203,
    ];

    public function __construct()
    {
        //
    }


    public function handle(MSMessageEvent $event)
    {
        //\Log::useFiles(storage_path('/logs/compteurcycle.log'), 'info');
        \Log::info('Message recu');
        $msmessage = $event->message;
        $sensor = Sensor::where('node_address', '=', $event->message->getNodeId())
            ->where('sensor_address', '=', $event->message->getChildId())
            ->where('classname', '=', '\UgoWarembourg\Compteurcycle\Models\CompteurCycle')
            ->first();
        if($sensor)
        {

            $compteurcycle = SensorFactory::create($sensor->classname, $sensor->id);
            $Conf = $compteurcycle->config;

            if ($sensor && $event->message->getCommand()==1 && $event->message->getType()== $this->types['ouverture'] )
            {
               \Log::info('porte en ouverture');

               $Conf->compteur_cycle_state_id= 3;
               $Conf->save();
            }
            if ($sensor && $event->message->getCommand()==1 && $event->message->getType()== $this->types['fermeture'] )
            {
                \Log::info('porte en fermeture');

                $Conf->compteur_cycle_state_id= 4;
                $Conf->save();
            }
            if ($sensor && $event->message->getCommand()==1 && $event->message->getType()== $this->types['ouverte'] )
            {
                \Log::info('porte ouverte');

                $Conf->compteur_cycle_state_id= 2;
                $Conf->save();
            }
            if ($sensor && $event->message->getCommand()==1 && $event->message->getType()== $this->types['fermee'] )
            {
                \Log::info('porte fermee');

                $Conf->compteur_cycle_state_id = 1;
                $Conf->save();
            }
            if ($sensor && $event->message->getCommand()==1 && $event->message->getType()== $this->types['porteerreur'] )
            {
                \Log::info('porte en erreur');
                $erreur = new CompteurCycleErreur();
                $erreur->sensor_id = $sensor->id;
                $erreur->erreur = 'La porte est en erreur';
                $erreur->save();


                $Conf->compteur_cycle_state_id = 5;
                $Conf->save();

            }
            if ($sensor && $event->message->getCommand()==1 && $event->message->getType()== $this->types['cycle'] )
            {
                \Log::info('cycle');
                \Log::info($event->message->getMessage());
                $nbCycle= $event->message->getMessage();

                $Conf->nb_cycles=$nbCycle;
                $Conf->save();
            }

            \Log::info('Envoi evenement Compteur');
            $event = new CompteurCycleEvent($sensor, $Conf, $Conf->compteurCycleState);
            event($event);

        }
    }
}
