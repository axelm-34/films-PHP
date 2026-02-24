PREREQUIS :
- Version de PHP >= 8 installé
- Pourvoir lancer un serveur en local avec "php -S"
- VScode

LANCEMENT DE L'API (raw):
Pour que l'api du site soit active, dans le terminal éxécuter cette commande :
php -S localhost:8000

Si le message afficher après exécution de la commande, ressemble a celui-ci :

"[Mon Feb 23 14:27:32 2026] PHP 8.4.16 Development Server (http://localhost:8000) started"

Alors le serveur local est bien actif.

LANCEMENT DE L'AFFICHAGE GRAPHIQUE :
1/ Faire "LANCEMENT DE L'API"
2/ Dans le dossier "site", ouvrir "index.html"


Urls pour l'API (raw):

Liste des films:
http://localhost:8000/movies?type=popular&page= (mettre numéro de la page après le =)

Ajouter un film au favories:
http://localhost:8000/favorites/add?id= (mettre ID du film après le =)

Liste des favories:
http://localhost:8000/favorites/list
