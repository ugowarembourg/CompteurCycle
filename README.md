# CompteurCycle
C'est un widget pour le site [Larahome](https://github.com/tchoblond59/LaraHome).


# Le widget 
Il permet de voir les informations et de contrôler un banc de test en modifiant les différents paramètres, de voir la date et l'heure des dernières erreurs, puis de pouvoir lancer, arrêter et redémarrer le programme.

Le widget :
![widget](https://github.com/ugowarembourg/CompteurCycle/blob/master/screenshots/widget.png)

La page information, avec le formulaire pour modifier les paramètres et les anciens paramètres.
![widget](https://github.com/ugowarembourg/CompteurCycle/blob/master/screenshots/info.png)

Déclaration automatique des erreurs.
![widget](https://github.com/ugowarembourg/CompteurCycle/blob/master/screenshots/infoerreur.png)

Tableau des messages MySensors:

| Envois auto de l'etat de la porte |                                                |
|-----------------------------------|------------------------------------------------|
|             Ouverture             | mysensors-out/1/0/1/0/24/Porte en Ouverture    |
|             Fermeture             | mysensors-out/1/0/1/0/25/Porte en Fermeture    |
|               Cycle               | mysensors-out/1/0/1/0/203/"le nombre de cycle" |
|              Ouverte              | mysensors-out/1/0/1/0/29/Porte Ouverte         |
|               Fermée              | mysensors-out/1/0/1/0/28/Porte Fermee          |
|               Erreur              | mysensors-out/1/0/1/0/100/Porte en Erreur      |


|  Envois manuel  |                                 |
|:---------------:|---------------------------------|
|  Interval cycle | mysensors-in/1/0/2/1/199/valeur |
| temps ouverture | mysensors-in/1/0/2/0/201/valeur |
|    Erreur max   | mysensors-in/1/0/2/0/200/valeur |
|     Arreter     | mysensors-in/1/0/2/0/209/1      |
|      Lancer     | mysensors-in/1/0/2/0/208/1      |
|    Redémarrer   | mysensors-in/1/0/2/0/209/1      |

# Installer le widget

    1: composer require ugowarembourg/compteurcycle 
    
    2: php artisan migrate
    
    3: artisan vendor:publish --tag=larahome-package --force








