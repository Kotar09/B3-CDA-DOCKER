# GESTION PRODUITS

## Fonctionnalités

- L'application permet de :
    - Lister les produits
    - Afficher la fiche produit en lecture seule
    - Ajouter des produits
    - Modifier les produits
    - Supprimer les produits
    - Pour chaque produit, il est possible d'ajouter autant de photos que nécessaire

## 1 Conteneurisation l’application

### Creation des fichiers DockerFile en suivant les instruction suivante :
### Prérequis

Cette application est compatible `PHP5` et a été testée avec une base de données `MySQL 5.7`.
- Copier les fichiers du dossier `www` dans un dossier accessible par le serveur Web.
- Assurez vous que le dossier `uploads` est accessible en lecture et écriture par le serveur Web : `chmod 777 uploads`
- Importez la base de données test à partir du dump SQL `database/gestion_produits.sql`.
- Connectez vous à l'application avec l'url adaptée avec les informations suivantes :
    - Login : `admin`
    - Mot de passe : `password`
### Installation
- On execute les conteneurs avec les commandes suivantes :

    - `docker build -f DockerFile -t application-php:latest .`

    - `docker build -f DockerFile-Mysql -t application-mysql:latest .`

- Ensuite on lance les conteurs : 

    - `docker run -d --name application-mysql application-mysql:latest`

    - `docker run -d --name application-php --link application-mysql:db -p 80:80 application-php:latest`

## 2 Mise en place de Docker Compose

- Création du fichier ``docker-compose.yml``
- **Lancement avec Docker Compose**
    - ``docker-compose up -d``
    
        ![alt text](img/image.png)

- **arreter les conteneurs et les supprimer**
     - `docker-compose down`

## 3 Version de dev : forme: mise à jour de la plate-forme

- ``git branch dev`` 
- ``git checkout dev``
### Modification des fichiers DockerFile
- Creation d'une version à  :
    - `docker build -f DockerFile-t application-php8:latest .`

    - `docker build -f DockerFile-Mysql -t application-mysql8:latest .`

- Ensuite on lance les conteurs : 

    - `docker run -d --name application-mysql8 application-mysql8:latest`

    - `docker run -d --name application-php8 --link application-mysql8:db -p 80:80 application-php8:latest`

## 4 Branche PostgreSQL

- ``git branch postgre-sql`` 
- ``git checkout postgre-sql``
- ### On effectue les modifications suivante :
    - du fichier **docker-compose.yml**
    - du fichier **connect.php**
    - du fichier **auth.php**

- **Lancement avec Docker Compose**
- ``docker-compose build``
- ``docker-compose up -d``

- **arreter les conteneurs et les supprimer**
     - `docker-compose down`