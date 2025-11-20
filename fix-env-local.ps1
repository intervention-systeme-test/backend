# Script pour corriger le .env pour l'utilisation locale
$envContent = @"
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="`${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="`${APP_NAME}"
"@

$envContent | Out-File -FilePath ".env" -Encoding utf8 -Force
Write-Host "Fichier .env mis à jour pour l'utilisation locale !"
Write-Host ""
Write-Host "IMPORTANT :"
Write-Host "1. Vérifiez que MySQL est démarré"
Write-Host "2. Créez une base de données nommée 'laravel' dans MySQL"
Write-Host "3. Si vous avez un mot de passe MySQL, modifiez DB_PASSWORD dans .env"
Write-Host "4. Ensuite exécutez: php artisan migrate"

