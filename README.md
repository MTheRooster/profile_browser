# Profile Browser

Application de démo.
Le dossier [**specs**](./specs/) contient l’ensemble de la documentation du projets.

Note: Bien qu’étant un petit test technique le projet est conçut comme un réel projet avec un ensemble de documentation

Pour mettre en place la partie front exécuter:
`cd ./front/`
puis
`npm install`
et pour lancer en local:
`npm run dev`

## Structure des données

Le dossier **specs** contient plusieurs diagramme UML / conception de donnée ainsi qu’un dictionnaire de donnée.
Bien que ceux-ci soit assez succins il est important de documenter un maximum la conception du projet via différentes sources (UML, cas d’utilisation, worflow etc.) afin de faciliter le travail des équipes.

Aussi il est important de réflechir à **la conception en amont des développements**

Un dictionnaire de données global permet nottament aux développeur d’avoir une vu d’ensemble des données stockées dans un projet et d’éviter la redondance lors de l’ajout de nouvelles tables.

On peu noter plusieurs choix atypique:
Atomiser au maximum les adresses emails en email_local_part@subdomain.domain stocké dans différentes table.
Bien que cela semble rajouter de la complexité, cela permet d’économiser de l’espace de stockage sur les nom de sous domaine étant donnée le nombre d’afficionados de Gmail, Hotmail etc. Premet de rechercher sur des chaînes de caractères moins longues pour la partie utilisateur, fait gagner du temps de traitement et diminue la durée des verrous.

Créer une table pivot (créateur) entre les profils et les utilisateurs.
En effet certain profiles sont présent par défaut dans la base de données et n’ont pas de créateur créer une table pivot permet de ne pas stocker de NULL dans la base de données. Bien que rarement voir jamais appliquée cette règle évite de nombreux effets nefaste de la permission des null en BDD. (stockage, indexation, tri)

Pour la question de **l’atomisation** et de **l’interdiction des null en bdd** voir l’ouvrage de **Christian Soutou** **Modélisation des bases de données** disponible à la BML

## Front-end

La partie front-end est réalisé avec **Tailwind** - **Vue** + **Typescript**.

le boiler plate utilisé pour le démarrage de la partie front est **create-tw**
