<<<<<<< HEAD
membres du projet : 
Pablo Lancel

Si vous utilisez une installation PHP brute sous Windows, suivez ces étapes :
1. Allez dans le dossier d'installation de votre PHP.
2. Si vous n'avez pas de fichier `php.ini`, copiez le fichier `php.ini-development` et renommez-le en `php.ini`.
3. Ouvrez ce fichier `php.ini` et **décommentez** (enlevez le `;` au début) les deux lignes suivantes :
   extension_dir = "ext"
   extension=openssl


Urls :

List movies:
http://localhost:8000/movies?type=popular&page=1

Add a favorite:
http://localhost:8000/favorites/add?id=

List favorites:
=======
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
>>>>>>> test
http://localhost:8000/favorites/list
