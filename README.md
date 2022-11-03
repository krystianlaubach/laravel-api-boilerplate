# Laravel API Boilerplate

#### Laravel based API boilerplate to be used as a starting point for new microservice API development.

- PHP 8.1
- Laravel 9.x
- Laravel Sanctum Authentication
- Laravel Scribe API Documentation

Frontend features limited to the login page for authenticating access to the API documentation.
<hr>

## Local Environment Setup

#### If you are running multiple Laravel based microservices using Docker at the same time, you will have to edit `docker-compose.yml` to rename services and run each microservice on different port on your localhost. To allow microservices to talk to each other, you also need to configure app shared networks.
<hr>

### Copy .env.example to .env
```
cp .env.example .env
APP_ENV=local
DB_DATABASE=api_data
```

### Copy .env.example to .env.testing
```
cp .env.example .env.testing
APP_ENV=testing
DB_DATABASE=testing_data
```

### Install dependencies via Composer
```
composer install
```

### Add alias for Sail to your shell configuration file for example `.zshrc`
```
echo "alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'" >> ~/.zshrc
source ~/.zshrc
```

### Run containers
```
sail up -d
```

### Install dependencies via NPM
```
sail npm install
```

### Run development mode (This is an API boilerplate, however we need to build assets for Breeze authentication feature used to secure API Documentation)
```
sail npm run dev
```

### Migrate development database
```
sail artisan migrate --seed
```

### Migrate testing database
```
sail artisan migrate --seed --env=testing
```

### Generate app key
```
sail artisan key:generate
```

### Create the symbolic link for the files in local storage that should be publicly accessible.
```
sail artisan storage:link
```

### App runs at
```
localhost:8888
```

### MySQL container
```
localhost:6033
```

### Mailing service - MailHog
```
SMTP localhost:1026
HTTP localhost:8026
```

<hr>

## API Documentation

By default, project uses Scribe to generate API documentation for humans from Laravel codebase.

https://scribe.knuckles.wtf/laravel/

https://github.com/knuckleswtf/scribe/

### Generate API Documentation
```
sail artisan scribe:generate
```

### Re-generate API Documentation
```
sail artisan scribe:generate --force
```

<hr>

## IDE Helper

Project uses Laravel IDE Helper Generator that enable your IDE to provide accurate autocompletion. 

https://github.com/barryvdh/laravel-ide-helper

### PHPDoc Generation for Laravel Facades
```
sail artisan ide-helper:generate 
```

### PHPDoc Generation for Laravel Models
```
sail artisan ide-helper:models 
```

Once you generated PHPDoc for the model you may want to add the model to `ignored_models` array in `config/ide-helper.php` to prevent overriding PHPDoc next time.
```
'ignored_models' => [
    \App\Models\User::class,
],
```
