# Desktop Nots
A [Laravel](https://laravel.com) desktop notifications application with [Twilio](https://twilio.com/) SMS

To have this application on your local machine

i. Clone this repo -- `git clone https://github.com/agavitalis`.
ii. Configure the contents of `.env` file, *especially the database and pusher settings and twilio configuration variables*.

iii. Install all dependencies -- `composer install && npm install`

iv. Migrate the database tables -- `php artisan migrate`

v. Edit in your Pusher App Key in `resources/assets/js/bootstrap.js`.

vi. Run using your local web server, or PHP's built-in option - `php artisan serve`
