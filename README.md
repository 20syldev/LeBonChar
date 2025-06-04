# LeBonChar - Projet MVC

### Prérequis

Installer PHP et MySQL sur votre serveur local.
Exécutez les commandes suivantes dans le dossier du projet :

```sql
CREATE DATABASE lebonchar;
USE lebonchar;
```

```bash
mysql -u root -p lebonchar < sql/schema.sql
```

Créer un fichier `.env` dans le dossier du projet avec les informations de **connexion** à la base de données :

```bash
PRODUCTION=     # Définir si vous souhaitez utiliser les données ci-dessous

DB_HOST=        # Adresse IP de votre serveur MySQL
DB_NAME=        # Nom de la base de données
DB_USER=        # Nom d'utilisateur MySQL
DB_PASSWORD=    # Mot de passe MySQL
DB_PORT=        # Port de connexion MySQL
```

Vous pouvez utiliser les valeurs **par défaut** si vous le souhaitez, mais il vous faut un utilisateur **MySQL** avec comme mot de passe "**password**".

## Lancer le serveur

Utilisez la commande suivante **dans la racine du dossier** pour lancer le serveur :

```bash
php -S 0.0.0.0:8000 -t public
```