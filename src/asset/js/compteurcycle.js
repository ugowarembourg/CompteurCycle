/****************CompteurCycle JS Plugin****************/
$(function() {
    e.channel('chan-compteurcycle')
        .listen('.UgoWarembourg.Compteurcycle.Events.CompteurCycleEvent', function (e) {
            console.log('CompteurCycle', e);
        })
});