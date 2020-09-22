# Twilio Desktop Nots
A [Laravel](https://laravel.com) desktop notifications application with [Twilio](https://twilio.com/) SMS

To have this application on your local machine

i. Clone this repo -- `git clone https://github.com/agavitalis`.

ii. Configure the contents of `.env` file, *especially the database and pusher settings and twilio configuration variables*.

iii. Edit the ` configure\broadcasting.php` file and ensure the `cluster` variable is the same with yours.

iii. In the ` welcome.blade.php` file, ensure that the pusher variables are all correct.

iii. Install all dependencies -- `composer install`

iv. Migrate the database tables -- `php artisan migrate`

v. Generate an App Key using the command `php artisan key:generate`.

vi. Run using your local web server, or PHP's built-in option - `php artisan serve`

## Built With
- Laravel framework
- Twilio SMS SDK
- Pusher