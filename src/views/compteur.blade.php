<div class="panel panel-default roller_shutter_widget roller_shutter">
    <div class="panel-heading">
        <h3 class="panel-title">{{$sensor->name}}</h3>
    </div>
    <div class="panel-body text-center" >

    <div style="font-size: 40px">{{$config->nb_cycles}}</div>
        <a class="btn btn-primary" style="margin-top: 10px" href="{{url('/widget/infos/'.$config->id)}}">Infos</a><hr>
        <img src="{{$state->image}}">
    <div style="margin-bottom: 8px">{{$state->name}}</div>






    </div>
</div>