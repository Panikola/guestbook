To install:
* git clone
* composer install
* php artisan key:generate
* rename .env.example to .env and fill APP_URL, DB_DATABASE, DB_USERNAME, DB_PASSWORD
* php artisan migrate:refresh --seed
* php artisan passport:install --force

For testing:
* import guestbook.postman_collection.json and Dev.postman_environment.json to Postman
* Select Dev environment and provide your host name in hostName environment variable
* Make register user1 request and copy token from response
* Add token to Authorized requests folder authorization property
