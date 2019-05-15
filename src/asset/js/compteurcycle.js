/****************CompteurCycle JS Plugin****************/
$(function() {
    e.channel('chan-compteurcycle')
        .listen('.UgoWarembourg\\Compteurcycle\\Events\\CompteurCycleEvent', function (e) {
            console.log('CompteurCycle', e);
            $('.nb_cycle_'+e.config.sensor_id).text(e.config.nb_cycles);
            $('.image_'+e.config.sensor_id).attr('src', e.etat.image);
            $('.nom_'+e.config.sensor_id).text(e.etat.name);
        })
});