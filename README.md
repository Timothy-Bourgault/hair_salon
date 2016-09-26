# _hair_salon_

#### _An application for the owner of a hair salon to organize their stylists and the stylists respective clientel, Friday, September 23, 2016_

#### By _**Tim Bourgault**_

## Description

_Organizes and arranges stylists and clients for a hair salon._

| Behavior |      Input    | Output|
|----------|:-------------:|:-----:|
| Add, Save, and Get a stylist and all their information | "'Betty', 'Wednesday, Friday', 'cut, perm, style, shampoo'" | "'Betty', 'Wednesday, Friday', 'cut, perm, style, shampoo'" |
| Edit stylist and their information | Edit Name:'Betty Smith', Edit Schedule:'Wednesday, Saturday, Sunday', Edit Specialties:'cut, style'" | "'Betty Smith', 'Wednesday, Saturday, Sunday', 'cut, style'" |
| Delete stylist and their information | "'Betty Smith', 'Wednesday, Saturday, Sunday', 'cut, style'" | "" |
| Add, Save, and Get a client and all their information | "'2016-10-11', '4:00', 'Mary', 'style, color', 'George'" | "'2016-10-11', '4:00', 'Mary', 'style, color', 'George'" |
| Edit client and their information | Edit Appointment:'2016-10-12', Edit Appointment Time:'5:00', Edit Name:'Mary Engel', Edit regular_specialties: 'twist, perm, shampoo, cut', Edit Stylist: 'George Berkley' | "'2016-10-12', '5:00', 'Mary Engel', 'twist, perm, shampoo, cut', 'George Berkley'" |
| Delete client and their information | "'2016-10-12', '5:00', 'Mary Engel', 'twist, perm, shampoo, cut', 'George Berkley'" | "" |

## SQL Commands Used
* _CREATE DATABASE (table name);_
* _USE (table name);_
* _SELECT DATABASES;_
* _SHOW DATABASE;_
* _CREATE TABLE stylists (name VARCHAR (255), specialties VARCHAR (255), scheduled days VARCHAR (255));_
* _CREATE TABLE clientel (name VARCHAR (255), regular_specialties VARCHAR (255), appointment DATE, appointment_time TIME);_
* _ALTER TABLE (table name) ADD id serial PRIMARY KEY;_
* _INSERT INTO (table name) (name, scheduled_days, specialties) VALUES ('Sally', 'Monday, Wednesday, and Friday', 'cut, color, curl, style, scalp massage');_
* _SELECT * FROM (table name);_
* _ALTER TABLE (table name) DROP (column name);_
* _  _

## Setup/Installation Requirements

* _Clone the program from it's github repository_
* _Navigate to the project directory in a command line software_
* _Type: "cd web" to move into the "web" folder_
* _Type: "php -S localhost:8000" to create a local server for the project_
* _Open the browser of your choice and type in this URL to load the project: "localhost:8000:_
* _You can also view the page online at the URL: timothy-bourgault.github.io/hair_salon


## Known Bugs

_There are no known bugs_

## Support and contact details

_If any issues arise, please send notification to tim.bourgault@gmail.com. Thanks!_

## Technologies Used

_Written using PHP, Silex, PHPUnit testing, Twig, and Bootstrap, MAMP Local Servers: MySQL and Apache_

### License

*This product can be used in accordance with the provisions under its MIT license.*

Copyright (c) 2016 **_Tim Bourgault_**
