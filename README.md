[README.md](https://github.com/user-attachments/files/34302448/README.md)
Yawan Blog App --- CRUD with Reports
Author: Heinz Jul Yawan
Project Overview
Yawan Blog App is a Laravel web application for managing blog posts. It
includes the standard Create, Read, Update, and Delete (CRUD) features,
along with a Reports module that displays posts and exports report data
to PDF and CSV.
Features
Create, view, edit, and delete blog posts
View a report of existing posts
Filter report results by start date and end date
Export report results as a PDF file
Export report results as a CSV file
Display the total number of posts matching the selected filters
Technologies Used
Laravel
PHP
MySQL
Blade templates
Composer
Node.js and npm (if required by the project's frontend assets)
barryvdh/laravel-dompdf for PDF generation
Requirements
Install the following software before setting up the project:
PHP version compatible with the Laravel version used by this project
Composer
MySQL
A local PHP development environment, such as Laravel Herd
Node.js and npm, if rebuilding frontend assets is necessary
Installation and Setup
Clone the repository or download the project files.
Open a terminal in the project directory.
Install PHP dependencies:
    ``` bash
    composer install
    ```
Create a local environment file:
    ``` bash
    cp .env.example .env
    ```
On Windows, you can also copy `.env.example` and rename the copy to
`.env`.
Generate the application key:
    ``` bash
    php artisan key:generate
    ```
Create a MySQL database for the project using your database
management tool, such as phpMyAdmin.
Update the database settings in `.env` to match your local MySQL
configuration:
    ``` dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```
Replace the example values with your own local database details. Do
not commit your `.env` file or database credentials to GitHub.
Run the database migrations:
    ``` bash
    php artisan migrate
    ```
If frontend dependencies need to be installed or assets rebuilt,
run:
    ``` bash
    npm install
    npm run build
    ```
Start the Laravel development server:
    ``` bash
    php artisan serve
    ```
Open the local URL shown in the terminal, usually
`http://127.0.0.1:8000`.
Main Routes
Page or action         Route
---
List blog posts        `/posts`
Create a post          `/posts/create`
View reports           `/posts/reports`
Export report as PDF   `/posts/reports/pdf`
Export report as CSV   `/posts/reports/csv`
The report export links preserve the selected date filters when they are
applied.
Using the Reports Module
Open `/posts/reports`.
Leave both date fields empty to include all posts, or choose a start
date and/or end date.
Select Generate Report to view the matching posts and total
count.
Select Export PDF to download a PDF report.
Select Export CSV to download a CSV file that can be opened in
spreadsheet software.
The start date and end date are inclusive. The end date must not be
earlier than the start date.
Sample Reports and Screenshots
For submission, place example exports in a `sample-reports/` directory,
for example:
`sample-reports/yawan_blog_report.pdf`
`sample-reports/yawan_blog_report.csv`
Save screenshots of the report page and successful PDF/CSV exports in a
clearly named screenshots folder if required by the instructor. These
files should be created from the actual running application.
Troubleshooting
Database connection error: Check that MySQL is running and the
`.env` database settings are correct.
Missing database tables: Run `php artisan migrate` after
configuring the database.
Changes are not appearing: Save the edited files and run
`php artisan optimize:clear`.
PDF export error: Confirm Composer dependencies are installed
with `composer install` and that `barryvdh/laravel-dompdf` is
present in the project dependencies.
Security Notes
Keep `.env` private and do not commit passwords, API keys, or other
credentials.
Do not upload `vendor/` or `node_modules/` to GitHub; Composer and
npm can recreate them from the dependency files.
Only include sample reports and screenshots that are appropriate for
submission.
License
This project was created for educational purposes. Add a license here if
the project is later distributed under a specific license.
