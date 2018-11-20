<?php

namespace UgoWarembourg\Compteurcycle\Models;

use App\Mqtt\MqttSender;
use App\Mqtt\MSMessage;
use Illuminate\Database\Eloquent\Model;

class CompteurCycleConfig extends Model
{
    protected $fillable = ['temps_ouverture, interval_cyclage, nb_erreurs_max, commentaire, created_at, updated_at'];

    public function compteur()
    {
        return $this->belongsTo('UgoWarembourg\Compteurcycle\Models\CompteurCycle', 'sensor_id');
    }

    public function sendConfig()
    {

    }
}
