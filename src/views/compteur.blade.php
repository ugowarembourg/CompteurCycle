
<div class="card">
    <div class="card-header">
        <h5 class="card-title">{{$sensor->name}}</h5>
    </div>
    <div class="card-body" data-sensors-id="{{$config->sensor_id}}" style="text-align: center">
        <h1 class="nb_cycle_{{$config->sensor_id}}">{{$config->nb_cycles}}</h1>
        <a class="btn btn-primary" style="margin-top: 10px" href="{{url('/widget/infos/'.$config->id.'?view=1')}}">Infos</a><hr>
        <img src="{{$state->image}}" class="image_{{$config->sensor_id}}">
        <div style="margin-bottom: 8px" class="nom_{{$config->sensor_id}}">{{$state->name}}</div>

    </div>
</div>