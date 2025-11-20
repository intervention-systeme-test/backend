# Backend Laravel 11 - API

## Installation

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

## Structure de la base de données

- **users** : Utilisateurs (privé ou pro)
- **companies** : Entreprises associées aux comptes pro
- **posts** : Publications

## Endpoints API

### Authentification
- `POST /api/register` - Création de compte (privé ou pro)
- `POST /api/login` - Connexion
- `POST /api/logout` - Déconnexion
- `GET /api/user` - Profil utilisateur

### Entreprises
- `GET /api/companies` - Liste des entreprises
- `POST /api/companies` - Ajouter une entreprise
- `PUT /api/companies/{id}` - Modifier une entreprise
- `DELETE /api/companies/{id}` - Supprimer une entreprise

### Publications
- `GET /api/posts` - Liste des publications (avec recherche)
- `POST /api/posts` - Créer une publication
- `PUT /api/posts/{id}` - Modifier une publication
- `DELETE /api/posts/{id}` - Supprimer une publication

## Laravel 11

Ce projet utilise Laravel 11 avec la nouvelle structure simplifiée :
- Configuration centralisée dans `bootstrap/app.php`
- Plus besoin de Kernel.php, Handler.php, etc.
- Structure plus simple et moderne
