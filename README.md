## Installation 
Clone the repository

    Git clone https://github.com/MaiCongHau/Test-Burning-Bros.git

Switch to the repo folder

    cd Test-Burning-Bros

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Clear cache 

php artisan optimize:clear
php artisan cache:clear

## Database seeding
Run the database seeder and you're done

php artisan db:seed
Run the database migrations 
php artisan migrate:refresh