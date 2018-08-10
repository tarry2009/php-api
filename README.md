#Vehicles PHP API

## Requirements
- PHP version: 7.2  
- Apache

Apache rewrite module must be enable.
 
## Installation

Just clone the project in in your www or htdocs directory.

Go into project folder
Then you can install all dependencies via Composer by running this command:
```bash
composer install

```
Composer detail:
https://getcomposer.org/


Rename the .env.example to .env 

Then run below all commands:

```bash
php artisan config:clear
php artisan cache:clear 
php artisan view:clear
php artisan key:generate

```

After that run the server with port 8080

```bash
php artisn serve --port=8080

```

##Note:
If port 8080 not work then you can use other port and access the localhost with that port.

Now, you can check end points:

### Requirement 1
You can visit the following Requirement 1 URLs and get meaningful JSON
output from them:
* `GET http://localhost:8080/vehicles/2015/Audi/A3`
* `GET http://localhost:8080/vehicles/2015/Toyota/Yaris`
* `GET http://localhost:8080/vehicles/2015/Ford/Crown Victoria`
* `GET http://localhost:8080/vehicles/undefined/Ford/Fusion`



### Requirement 2
You can visit the Requirement 2 URL when sending each of the following
JSON request bodies and get meaninful JSON output from each:
```
POST http://localhost:8080/vehicles
```
```
{
"modelYear": 2015,
"manufacturer": "Audi",
"model": "A3"
}
```

### Requirement 3
You can visit the following Requirement 2 URLs and get meaningful JSON
output from them:
* `GET http://localhost:8080/vehicles/<MODEL
YEAR>/<MANUFACTURER>/<MODEL>?withRating=true`

* `GET http://localhost:8080/vehicles/<MODEL
YEAR>/<MANUFACTURER>/<MODEL>?withRating=false` (should return the same
output as Requirement 1)

* `GET http://localhost:8080/vehicles/<MODEL
YEAR>/<MANUFACTURER>/<MODEL>?withRating=bananas` (should return the
same output as Requirement 1)

* `GET http://localhost:8080/vehicles/<MODEL
YEAR>/<MANUFACTURER>/<MODEL>` (should return the same output as
Requirement 1)
