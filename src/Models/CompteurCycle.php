<?php
/**
 * Created by PhpStorm.
 * User: ugo
 * Date: 16/11/18
 * Time: 13:46
 */

namespace UgoWarembourg\Compteurcycle\Models;
use App\Message;
use App\Mqtt\MqttSender;
use App\Mqtt\MSMessage;
use App\Sensor;

class CompteurCycle extends Sensor
{
    public $types = [
      'temps_ouverture' => 201,
      'nb_erreurs_max' => 200,
      'interval_cyclage' => 199,
    ];
    public function getWidget(\App\Widget $widget)
    {
        $config=$this->config;
        $state=CompteurCycleState::find($config->compteur_cycle_state_id);
        return view('compteurcycle::compteur')->with(['widget' => $widget,
            'sensor' => $this,
            'config'=> $config,
            'state'=>$state,
        ]);
    }

    public function erreurs()
    {
        return $this->hasMany('UgoWarembourg\Compteurcycle\Models\CompteurCycleErreur', 'sensor_id');
    }

    public function config()
    {
        return $this->hasOne('UgoWarembourg\Compteurcycle\Models\CompteurCycleConfig', 'sensor_id');
    }

    public function state()
    {
        return $this->hasOne('UgoWarembourg\Compteurcycle\Models\CompteurCycleState', 'id');
    }

    public function sendConfig()
    {
        $message = new MSMessage(Message::first()->id);
        $message->fromScratch($this->node_address, $this->sensor_address, 2, 0,  $this->types['temps_ouverture']);
        $message->setMessage($this->config->temps_ouverture);
        MqttSender::sendMessage($message);

        $message->fromScratch($this->node_address, $this->sensor_address, 2, 0,  $this->types['interval_cyclage']);
        $message->setMessage($this->config->interval_cyclage);
        MqttSender::sendMessage($message);

        $message->fromScratch($this->node_address, $this->sensor_address, 2, 0,  $this->types['nb_erreurs_max']);
        $message->setMessage($this->config->nb_erreurs_max);
        MqttSender::sendMessage($message);
    }


}