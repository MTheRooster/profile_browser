# Profile Browser

Application de démo.
la partie backend(laravel) est dans le dossier ./back
la partie frontend(vuejs) est dans le dossier ./front
## Back-end
Pour mettre en place la partie back

`cd ./back/`

`composer install`

Mettre en place une base de donnée MySQL
Dans le répertoire /back créer un fichier .env
Copier l’intégralité du contenu du fichier .env.example dans le fichier .env
Remplacer les variables suivantes en fonction de la configuration locale de la base de données

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=NomDeLaBaseDeDonnée

DB_USERNAME=root

DB_PASSWORD=MotDePasse

Les photos étant stocké dans le répertoire local il faut éxécuter la commande suivante

`php artisan storage:link`

Éffectuer migration et seedings avec 
`php artisan migrate:fresh --seed`

puis lancer le serveur avec
`php artisan serve`


## Front-end

Pour mettre en place la partie front exécuter:
`cd ./front/`

puis
`npm install`

et pour lancer en local:
`npm run dev`

Enfin une fois le front et le back lancés accéder au site via l’adresse **http://localhost:3000**

Attention passer par l’adresse 127.0.0.1:3000 ne fonctionne pas. (domaine non reconnu côté back-end)

pour se Logger à l’application on peut utiliser les authentifiants suivant:
mail: **michel@michel.com**
password: **password**

## INFO Front-end
La partie front-end est réalisé avec **Tailwind** - **Vue** + **Typescript**.
le boiler plate utilisé pour le démarrage de la partie front est **create-tw**
## INFO Back-end
la partie back-end est réalisé avec laravel (breeze + sanctum)
