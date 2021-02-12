@echo off
call php artisan migrate:fresh --seed
call composer install
call npm install
call npm run dev
echo "Done!"
PAUSE