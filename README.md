# laravel_vue_test

About The Project

The project is written in Laravel - backend, Vue - frontend.
The backend implements 2 api methods to provide the necessary information - the formation of filter fields and displaying data about houses.
On the frontend, a filter is implemented for setting house search criteria and a table with results about houses. Used by Vuex to monitor status.

Built With

Laravel
Vue
Vue Element UI

Installation

To install the project:

on the backend folder (laravel_vue_test/backend)
1) Set up dependencies 
  composer install
2) Create env file and connect to DB
3) Run local backend server
  php artisan serve
4) Run command below to generate app key
  php artisan key:generate
5) Run necessary migrations
  php artisan migrate --seed

on the frontend folder (laravel_vue_test/frontend)
1) Set up dependencies
  yarn
2) Run local frontend server
  yarn serve 
3) Change backend server address in the store.js

Contact
Aleksandr Koveshnikov - a.koveshnikov@dunice.net
https://github.com/AleksandrKoveshnikov/laravel_vue_test

