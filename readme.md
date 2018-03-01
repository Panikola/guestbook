To install:
``` shell
git clone https://github.com/Panikola/guestbook.git
composer install
npm install
npm install -g laravel-echo-server
```
* rename .env.example to .env, fill APP_URL, DB_DATABASE, DB_USERNAME, DB_PASSWORD
``` shell
php artisan key:generate
php artisan migrate:refresh --seed
php artisan passport:install --force
laravel-echo-server init
```

For testing:
* in your project root directory, run 
``` shell
laravel-echo-server start
php artisan horizon
```
* Open Postman
* Import postman_collection.json and environment from postman_environment.json
* Select Dev environment. Provide your host name in hostName environment variable
* Make "register user1" request. Copy token from response, email and password from body
* Make "register user2" request. Copy token from response, email and password from body
* Change token in "Authorized requests" folder auth property
* Log in user in browser with email and password

Make requests in Postman and monitor notifications in browser

[site-url]/horizon/ monitor redis queues
