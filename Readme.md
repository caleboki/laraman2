### Steps to install ###
1. Run composer install and npm install
2. After configuring your database settings (see below) run php artisan migrate
3. Run php artisan serve --port=8000
4. Register for an account
5. After successful registration visit the /files URL to see the file upload functionality


### Configure the Database

If you want to use `mysql` for the example, copy the `env.example` file to `.env` and change the settings in this
file. The default settings are:

    DB_HOST=localhost
    DB_DATABASE=homestead
    DB_USERNAME=homestead
    DB_PASSWORD=secret

After the database is configured, apply the migrations:

    php artisan migrate
