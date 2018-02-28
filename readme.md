To install:
* git clone https://github.com/Panikola/guestbook.git
* composer install
* npm install
* rename .env.example to .env, fill APP_URL, DB_DATABASE, DB_USERNAME, DB_PASSWORD
* php artisan key:generate
* php artisan migrate:refresh --seed
* php artisan passport:install --force

For testing:
* Open Postman
* Import postman_collection.json and environment from postman_environment.json
* Select Dev environment. Provide your host name in hostName environment variable
* Make "register user1" request. Copy token from response, email and password from body
* Make "register user2" request. Copy token from response, email and password from body
* Change token in "Authorized requests" folder auth property
* Log in user in browser with email and password

Now you can make requests in Postman and monitor notifications in browser
