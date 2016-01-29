## Ejemplo de command bus

###  Tarea a realizar (Guardar un usuario)

* Enviar un json que tenga un user y posts que dependan de el

* Recibir el request por post interpretarlo y dividirlo en formado de dato que nos sirva

* Guardar el user y luego guardar los posts que dependen de el

### Base de datos 
![](http://i64.tinypic.com/2v9ysex.png)


### Grafico de ejemplo de formulario a enviar
![](http://i67.tinypic.com/50l9fr.png)

###  Json a enviar por post
`{
   "data":[
      {
         "type":"users",
         "attributes":{
            "name": "User Name",
            "email":"user@example.com",
         }
   ],
   "included":[
     {
         "type":"posts",
         "attributes":{
            "body":"Body lorem input 1",
         }
      },
      {
         "type":"posts",
         "attributes":{
			"body":"Body lorem input 1",
         }
      },
   ]
}`

### Orden de carpetas en laravel
![](http://i63.tinypic.com/25qdmbl.png)

### Explicación de cada carpeta
* __ **App\Helpers\Middlewares**
* __ __ Aca se alojaran los middlewares genericos que pueden servir para transacciones por ejemplo
* __ __ **App\Modules**
* __ __ Aca se dividiran los modulos del proyecto
* __ __ **App\Modules\Users**
* __ __ __ **App\Modules\Users\Respositories**
* __ __ __ __Aca se podran las clases que interactuan con la base de datos de este modulo
* __ __ __ **App\Modules\Users\UserCommandBus**
* __ __ __ __Archivos que se usan para el patron de CommandBus (middlewares, Handler, Command)
* __ __ __ **App\Modules\Users\UserMiddlewares**
* __ __ __ __ Aca se usaran los midlewares especificos para este modulo
* __ __ __ **App\Modules\Users\UserExceptions**
* __ __ __ __Archivos con las excepciones especificas de este modulo
* __ __ __ **App\Modules\Users\UserController**
* __ __ __ __ Controlador asignado a este modulo, que se encarga de recivir petisiones y enviar respuestas

## Hacer funcionar el proyecto

`git clone https://github.com/guduchango/laravelCommandBus/`

`cd ./laravelCommandBus`

 > Se debe modificar el archivo .env para conectarse a la base de datos 

`composer install`

`php artisan migrate`

`php artisan db:seed`

### Ejecutar test
`./vendor/bin/phpunit ./tests/SaveUserPosts`


