Pour que les url fonctionnent, avec le serveur intégré de php, il faut effectuer la commande : php -S localhost:8000 -t public

Développer une application PHP permettant de visualiser graphiquement l'historique de qualité de l'air d'une localité donnée sur les 30 derniers jours.
Pour cela tu utiliseras :

L'API "Air Quality" de Google dont la documentation est ici https://developers.google.com/maps/documentation/air-quality/reference

La clé API AIzaSyCjuzZ-TJjT1tkkGRlUdwssAnVlfnH_HMY créée spécialement pour toi le temps du processus de recrutement

D'un point de vue UX :

Une CSS de base par défaut du framework UI choisi
Un sélecteur de localité par liste déroulante avec latitudes et longitudes codées en dur (2 villes suffisent)
La première localité de cette liste est sélectionnée par défaut à l'arrivée sur la page et le graphique correspondant affiché
Le changement de localité déclenche l'actualisation du graphique affiché
---