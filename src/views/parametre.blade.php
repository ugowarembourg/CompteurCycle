
<p> Temps ouverture : {{$config->temps_ouverture}}</p>
<p> Interval Cyclage : {{$config->interval_cyclage}}</p>
<p> Nombres d'erreus max : {{$config->nb_erreurs_max}}</p>
<p> Commentaire : {{$config->commentaire}}</p>
<p> Créé le : {{\Carbon\Carbon::parse($config->created_at)->format('d/m/Y H:i:s')}}</p>
