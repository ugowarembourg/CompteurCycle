@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-6" >
            <h3>Modification des paramètres</h3><hr>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form style="margin-right: 30%"  method="post" action="{{url('/widget/infos/'.$config->id)}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Temps ouverture : </label>
                        <input name="tempsouv" type="text" value="{{$config->temps_ouverture}}" class="form-control" id="tempsouv"  />
                    </div>
                    <div class="form-group">
                        <label>Interval cyclage : </label>
                        <input name="intervalcycle" type="text" class="form-control" id="intervalcycle"   value="{{$config->interval_cyclage}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nombres d'erreur max :</label>
                        <select name="nberreur" class="form-control" id="exampleFormControlSelect1"  required>

                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3" selected>3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Commentaire :</label>
                        <textarea name="commentaire" class="form-control" id="exampleFormControlTextarea1" rows="1"  placeholder="Cause de la modification..." required></textarea>
                    </div>

                    {{--<div class="col" >--}}
                        {{--<div class="form-group">--}}
                            {{--<label>Date :</label>--}}
                            {{--<div class="input-group date" id="datetimepicker3">--}}
                                {{--<input name="date" type="text" class="form-control" placeholder=" 19/11/2018 15:31" required/>--}}
                                {{--<span class="input-group-addon">--}}
                                     {{--<span class="glyphicon glyphicon-calendar"></span>--}}
                                {{--</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<script type="text/javascript">--}}
                        {{--$(function () {--}}
                            {{--$('#datetimepicker3').datetimepicker({--}}
                                {{--locale: 'fr'--}}
                            {{--});--}}
                        {{--});--}}
                    {{--</script>--}}

                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>

                        <h3 style="margin-top: 8%">Lancement</h3><hr>
                    <div class="btn-group" role="group" aria-label="..." style="margin-top: 1%; ">

                        <form style="margin-right: 30%"  method="post" action="{{url('/widget/commande/'.$config->id)}}">
                                <button type="submit" class="btn btn-success" value="208" name="action"><span class="glyphicon glyphicon-play"> Start</span></button>
                        </form>
                    </div>
                    <div class="btn-group" role="group" aria-label="..." style="margin-top: 1%; ">
                        <form style="margin-right: 30%"  method="post" action="{{url('/widget/commande/'.$config->id)}}">
                                <button type="submit" class="btn btn-danger" value="209" name="action"><span class="glyphicon glyphicon-stop"> Stop</span></button>
                        </form>
                    </div>
                    <div class="btn-group" role="group" aria-label="..." style="margin-top: 1%; ">
                        <form style="margin-right: 30%"  method="post" action="{{url('/widget/commande/'.$config->id)}}">
                                <button type="submit" class="btn btn-warning" value="210" name="action"><span class="glyphicon glyphicon-retweet"> Restart</span></button>
                        </form>
                    </div>


            </div>
            <div class="col-lg-6" >
                <ul class="nav nav-tabs" style="margin-top: 6px; margin-bottom: 7%">
                    @if($vue==1)

                    <li role="nav-item" class="active"><a class="nav-link" href="{{url('/widget/infos/'.$config->id.'&view=1')}}">Paramètres actuel</a></li>

                    @else
                    <li role="nav-item"><a class="nav-link" href="{{url('/widget/infos/'.$config->id.'?view=1')}}">Paramètres actuel</a></li>
                    @endif
                    @if($vue==2)
                    <li role="nav-item" class="active"><a class="nav-link" href="{{url('/widget/infos/'.$config->id.'?view=2')}}">Erreurs</a></li>
                    @else
                    <li role="nav-item"><a class="nav-link" href="{{url('/widget/infos/'.$config->id.'?view=2')}}">Erreurs</a></li>
                    @endif
                </ul>

                @if($vue==1)
                    <p> Temps ouverture : {{$config->temps_ouverture}}</p>
                    <p> Interval Cyclage : {{$config->interval_cyclage}}</p>
                    <p> Nombres d'erreus max : {{$config->nb_erreurs_max}}</p>
                    <p> Commentaire : {{$config->commentaire}}</p>
                    <p> Créé le : {{\Carbon\Carbon::parse($config->created_at)->format('d/m/Y H:i:s')}}</p>
                    @endif
                @if($vue==2)

                    @foreach($erreurs as $erreur)
                        <p>La porte a etait en erreur le {{\Carbon\Carbon::parse($erreur->created_at)->format('d/m/Y  à H:i:s')}}</p>
                    @endforeach

                @endif


            </div>
        </div>
    </div>
@endsection