# Profile Browser

Application de démo.
la partie backend(laravel) est dans le dossier ./back
la partie frontend(vuejs) est dans le dossier ./front
## Back-end
Pour mettre en place la partie back

`cd ./back/`

`composer install`

Mettre en place une base de donnée MySQL
Modifier le fichier /back/.env en fonction de la configuration de la base de données:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nomDeLaBaseDeDonnée
DB_USERNAME=root
DB_PASSWORD=motDePasse

Également dans le fichier .env modifier/ajouter les lignes suivantes pour permettre la communication back-front
APP_URL=http://localhost:8000
FRONTEND_URL=http://localhost:3000

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

Enfin une fois le front et le back lancer accéder au site via l’adresse **http://localhost:3000**

Attention passer par l’adresse 127.0.0.1:3000 ne fonctionne pas. (domaine non reconnu côté back-end)

pour se Logger à l’application on peut utiliser les authentifiants suivant:
mail: **michel@michel.com**
password: **password**

## INFO Front-end
La partie front-end est réalisé avec **Tailwind** - **Vue** + **Typescript**.
le boiler plate utilisé pour le démarrage de la partie front est **create-tw**
## INFO Back-end
la partie back-end est réalisé avec laravel (breeze + sanctum)