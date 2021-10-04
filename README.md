##Environment
Ubuntu 20.04.3 LTS

## Install instructions

We are going to use laravel sail for this project
- [Laravel Sail](https://laravel.com/docs/8.x/sail).

Add this line on the .bashrc file on home folder
```
alias sail='bash vendor/bin/sail'
OR USE
./vendor/bin/sail 
```

So we use docker and Laravel. Before you are able to use this remember to stop all services for mysql/apache/nginx on local
```
git clone git@github.com:gup2014/laravel-test.git
cd laravel-test
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs
```
Now copy .env.example to .env, this is the variables file.
APP_KEY is important so in after you copy .env you need to generate one unique APP KEY for yourself with this command

```
php artisan key:generate 
```
And finally bring it all up
```
sail up
OR
./vendor/bin/sail up 
```

##Database
Run the sail migrate command to create database tables
```
sail artisan migrate
OR
./vendor/bin/sail artisan migrate 
```

##Api Url

You can check the app on the 0.0.0.0 url

Examples:
```
http://0.0.0.0/?q=deadwood
http://0.0.0.0/?q=girls
http://0.0.0.0/?q=thriller
```

##Api Response
You will get a json with the following structure:

{
    'status': 200;
    'data' : "Deadwood"
}

#Unit tests
A several tests have beed added. To run them automatically, please run the following command:
```
sail artisan test
OR
./vendor/bin/sail artisan test
```

##How to improve
