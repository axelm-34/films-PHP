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
http://localhost:8000/favorites/list
