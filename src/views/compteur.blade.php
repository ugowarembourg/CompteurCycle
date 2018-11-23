<div class="panel panel-default roller_shutter_widget roller_shutter" >
    <div class="panel-heading">
        <h3 class="panel-title">{{$sensor->name}}</h3>
    </div>
    <div class="panel-body text-center" data-sensors-id="{{$config->sensor_id}}">

    <h1 class="nb-cycle_{{$config->sensor_id}}">{{$config->nb_cycles}}</h1>
        <a class="btn btn-primary" style="margin-top: 10px" href="{{url('/widget/infos/'.$config->id.'?view=1')}}">Infos</a><hr>
        <img src="{{$state->image}}" class="image_{{$config->sensor_id}}">
    <div style="margin-bottom: 8px" class="nom_{{$config->sensor_id}}">{{$state->name}}</div>
    </div>
</div>