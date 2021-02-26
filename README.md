# Laravel Task
Hello dears

### Usage

I use Docker compose and you have to RUN following commands

<code>sudo docker-compose up -d --build project</code><br/>
<code>sudo docker-compose run --rm composer update</code><br/>
<code>sudo docker-compose run --rm artisan migrate</code><br/>
<code>sudo docker-compose run --rm artisan db:seed</code>

### documentation of routes
#### I created postman file also able for use<br>
```sh
- POST     | api/box/store
- GET|HEAD | api/ingredients
- POST     | api/ingredients/store
- GET|HEAD | api/recipe           
- POST     | api/recipe/store     
```
### Unit test <br>
For unit tests have to run following command<br/>

<code>sudo docker-compose run --rm artisan test</code>

### phpmyadmin for database structure easily
[phpmyadmin](http://localhost:8090/index.php) (http://localhost:8090/index.php)
- username : project
- password : project