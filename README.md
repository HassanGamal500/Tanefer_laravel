# Booking Engine

**Installation instructions**

*Rename .env.example file to .env*

*Run those commands* 
<br>
1. git clone <url>
2. composer install
3. php artisan key:generate
4. php artisan migrate --seed
5. php artisan jwt:secret

*Set the following parameters in .env file*
1. Set database connection configuration
2. change value of `QUEUE_CONNECTION` to database
3. add those two lines in .env <br>
SABRE_VERSION=V1 <br>
SABRE_DOMAIN=AA
   
<h3>Laravel Packages Used</h3>

* Firebase SDK: https://github.com/kreait/laravel-firebase
* PaymentGateWay authorizenet SDK: https://github.com/AuthorizeNet/sdk-php
* Telescope (Monitoring Package): https://laravel.com/docs/6.x/telescope
* Laravel cors: https://github.com/spatie/laravel-cors
* Laravel permissions & Roles: https://github.com/spatie/laravel-permission
* JWT auth: https://github.com/tymondesigns/jwt-auth
* wsdl2phpgenerator: https://github.com/wsdl2phpgenerator/wsdl2phpgenerator
