# Migration vers Laravel 11

## Changements effectués

### 1. Composer.json
- ✅ Mise à jour vers Laravel 11 (`^11.0`)
- ✅ Mise à jour de Sanctum vers `^4.0`
- ✅ Mise à jour de PHP vers `^8.2`
- ✅ Mise à jour des dépendances de développement

### 2. Structure simplifiée
- ✅ `bootstrap/app.php` - Configuration centralisée (nouvelle structure Laravel 11)
- ✅ Suppression de `app/Http/Kernel.php` (plus nécessaire)
- ✅ Suppression de `app/Console/Kernel.php` (plus nécessaire)
- ✅ Suppression de `app/Exceptions/Handler.php` (plus nécessaire)
- ✅ Suppression de `app/Providers/RouteServiceProvider.php` (plus nécessaire)
- ✅ Suppression des middlewares individuels (gérés dans bootstrap/app.php)

### 3. Configuration
- ✅ `config/app.php` - Simplifié (plus de providers/aliases manuels)
- ✅ `config/sanctum.php` - Mis à jour pour Laravel 11
- ✅ Middleware CSRF configuré dans `bootstrap/app.php`

### 4. Fonctionnalités conservées
- ✅ Tous les contrôleurs (AuthController, CompanyController, PostController)
- ✅ Tous les modèles (User, Company, Post)
- ✅ Toutes les migrations
- ✅ Toutes les routes API
- ✅ Authentification Sanctum

## Avantages de Laravel 11

1. **Structure simplifiée** : Moins de fichiers de configuration
2. **Performance améliorée** : Framework plus rapide
3. **Syntaxe moderne** : Utilisation de PHP 8.2+
4. **Configuration centralisée** : Tout dans `bootstrap/app.php`

## Notes importantes

- Les middlewares `EncryptCookies` et `VerifyCsrfToken` sont toujours présents mais peuvent être supprimés si non utilisés
- La configuration CSRF est maintenant dans `bootstrap/app.php` avec `validateCsrfTokens()`
- Laravel 11 nécessite PHP 8.2 minimum

