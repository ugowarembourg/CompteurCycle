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

            </div>
            <div class="col-lg-6" >

                <h3>Paramètres actuel</h3><hr>
                <p> Temps ouverture : {{$config->temps_ouverture}}</p>
                <p> Interval Cyclage : {{$config->interval_cyclage}}</p>
                <p> Nombres d'erreus max : {{$config->nb_erreurs_max}}</p>
                <p> Commentaire : {{$config->commentaire}}</p>
                <p> Créé le : {{\Carbon\Carbon::parse($config->created_at)->format('d/m/Y H:i:s')}}</p>

            </div>
        </div>
    </div>
@endsection