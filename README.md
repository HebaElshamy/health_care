# Smart Clinic
## Getting Started

1. Install project dependencies using Composer:

   ```bash
   composer install
2. Copy the .env.example file and rename it to .env:
    ```bash
    cp .env.example .env
3. Generate the application key:
    ```bash
    php artisan key:generate
4. Configure the .env file with your database connection details
5. Run the database migrations to create tables:
    ```bash
    php artisan migrate
6. Start the local server:
    ```bash
    php artisan serve
7. Open the project in the browser at http://localhost:8000.

8. Enjoy your experience!
