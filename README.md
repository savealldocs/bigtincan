#This is a stateless JSON REST API build using Slim Framework and Doctrine.

##Installation

###Git clone
To get the latest source you can use git clone.
$ git clone https://github.com/savealldocs/bigtincan.git /path/to/slim-rest-api
###Composer
Installation can be done with the use of composer. If you don't have composer yet you can install it by doing:
$ curl -s https://getcomposer.org/installer | php

### Run Application With Apache or nginx
set the DocumentRoot to point to the public/ directory of  project, example:

DocumentRoot    /var/www/project/src/public/

or for nginx:

root    /var/www/project/src/public/

###Vendor
$ cd /path/to/slim-rest-api
$ composer update
$ composer install
Database credentials
$ cp /path/to/slim-rest-api/config/local.ini.dist /path/to/slim-rest-api/config/local.ini
Edit the credentials in the local.ini file

### Database settings
[database]
driver = 'pdo_sqlite'
path = '/path/to/slim-rest-api/data/courses.db'

###To create schema
$ /path/to/slim-rest-api/vendor/bin/doctrine orm:schema-tool:create
Update schema
$ /path/to/slim-rest-api/vendor/bin/doctrine orm:schema-tool:update --force

###Entities
/path/to/slim-rest-api/app/entity/

###Testing
Example
A Course and Subject resource has been created for testing purposes. These are some cURL commands can be used

* To get All courses
 curl -i -X GET http://localhost/course

* To get all subject of a given courseId
 curl -i -X GET http://localhost/course/1

* To get details of a given subjectid
 curl -i -X GET http://localhost/subject/1

* To edit subject details
 curl -i -X PUT -d "name=newname&description=newdec" http://localhost/subject/1

* To hide/visible the subject
 curl -i -X PUT -d "hidden=1" http://localhost/subject/1

* To delete the subject
 curl -i -X DELETE http://localhost/subject/1



