php artisan cache:clear
php artisan config:clear
php artisan debugbar:clear
php artisan event:clear
php artisan optimize:clear
php artisan route:clear
php artisan view:clear
php artisan clear-compiled

#rm -Rf ./.php_cs.cache
# composer install
#npm install

composer dump-autoload
./.bin/php-cs-fixer fix -v
#php artisan optimize

php artisan ide-helper:generate
php artisan ide-helper:meta
#php artisan ide-helper:eloquent
#php artisan ide-helper:models


composer dump-autoload

./.bin/php-cs-fixer fix -v
./.bin/php-cs-fixer fix -v

#npm run dev

git status
