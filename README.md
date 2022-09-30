# Laravel API Boilerplate

### Laravel based API boilerplate to be used as a starting point for new microservice API development.
<hr>

## Local Environment Setup

### If you are running multiple Laravel based microservices using Docker at the same time, you will have to edit `docker-compose.yml` to rename services and run each microservice on different port on your localhost. To allow microservices to talk to each other, you also need to configure app shared networks.
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

### Generate API Documentation
```
sail artisan scribe:generate
```

### Create the symbolic link for the files in local storage that should be publicly accessible.
```
php artisan storage:link
```

### Re-generate API Documentation
```
sail artisan scribe:generate --force
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
