<?php

namespace UgoWarembourg\Compteurcycle\Events;

use App\Sensor;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use  UgoWarembourg\Compteurcycle\Models\CompteurCycleConfig;
use UgoWarembourg\Compteurcycle\Models\CompteurCycleState;

class CompteurCycleEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $sensor;
    public $config;
    public $etat;


    public function __construct(Sensor $sensor, CompteurCycleConfig $config, CompteurCycleState $etat)
    {
        $this->sensor = $sensor;
        $this->config = $config;
        $this->etat = $etat;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('chan-compteurcycle');
    }
}
