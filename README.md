# SILVER  

Este proyecto trata de disponibilizar de manera organizada, en interfaz y en api's, la informaci贸n que se encuentra en la base de datos del software SilverTool.

## Comenzando 馃殌

_Para poder ocupar este proyecto necesitamos ejecutar un comando en la terminal  y lo podremos utilizar de forma local_
* el comando a emplear es el siguiente:
 ```
       git clone https://github.com/ERomeroFiab/silver.git
 ```

### Pre-requisitos (Windows) 馃搵

_Para poder proceder con la instalaci贸n se necesita tener un entorno de servidor, los m谩s usados son XAMPP, y LARAGON los cuales se encargan de instalar las siguientes aplicaciones: *(en caso de no tenerlos instalados abajo se explica todo paso por paso)*_
* PHP
* COMPOSER
* NGINX 脫 APACHE

### Pre-requisitos (Linux) 馃搵
 
_Para poder proceder con la instalaci贸n se necesita tener lo siguiente : *(en caso de no tenerlos instalados abajo se explica todo paso por paso)*_
* PHP
* NGINX 脫 APACHE
* MYSQL

### INSTALANDO COMPOSER
* para ello necesitamos abrir el "CMD" y se debe abrir el directorio (depende si tiene XAMPP,LARAGON,ETC) donde se debe instalar Laravel.

### Instalaci贸n de laravel (Windows) 馃敡


1) Para comenzar la instalaci贸n de Laravel debemos tener instalado el gestor de paquetes llamado "COMPOSER".
* para esto debemos descargarlo  desde [la pagina oficial](https://getcomposer.org/download/):

     ```
     * Una vez ya estando en la pagina ofical de COMPOSER, debemos descargar el archivo "Composer-Setup.exe".

     * Luego de que se inicia el instalador, pregunta si deseamos instalarlo como desarrollador ( es opcional pero en este caso no lo haremos) se debe dar en "NEXT".

     * En seguida nos aparecera que seleccionemos el "comando o linea php a utilizar" para ello se debe dar  click en donde dice "BROWSE..." y se busca la ruta donde est谩 instalado todo, (depende de lo que se tenga instalado ya sea XAMP,LARAGON,ETC) igualmente se recomienda usar la versi贸n de PHP mas alta disponible por temas de compatibilidad, luego de eso se le da click en "NEXT".

     * se le vuelve a clickear en "NEXT".

     * y para finalizar se da click donde dice "INSTALL".

     (Como recomendaci贸n antes de dar en instalar siempre copiar el "ADD TO SYSTEM PATH", luego en su pc dirigirse a "este equipo" click derecho y entrar en "PROPIEDADES" una vez dentro ir a "CONFIGURACI脫N AVANZADA DEL SISTEMA" le damos donde dice "VARIABLES DE ENTORNO" y buscar en las variables del sistemas (Generales) el "PATH" y como final se debe verificar tener instalado "COMPOSER" (en caso contrario dar click en nuevo y pegar la ruta copiada anteriormente) )
     ```
*(luego se debe reiniciar el pc)*

2) Encontrandonos ya en el directorio procedemos a instalar Laravel.
* para esto se necesita  ejecutar el siguiente comando :

     ```
     composer global require laravel/install.
     ```

3) Ahora debemos configurar la base de datos.
* Para esto debemos seguir los siguientes pasos:

     ```
     * Vaya a phpMyAdmin y haga clic en crear una nueva pesta帽a.

     * Nombra la base de datos.

     * Presione el bot贸n crear. 
     ```

4) hacer una copia del env.example donde lo debemos pegar en el mismo archivo y cambiarle el nombre a ".ENV".
* Donde debemos hacer lo siguiente:

     ```
     APP_NAME=Laravel ( es el nombre que uno le quiere dar a la aplicaci贸n)
     APP_ENV=local (local 贸 production) 
     APP_KEY=base64:TJ9Sob7KFPhL5XkqT+TyQux3x7UbW08QLb0xtirLWSs=
     (En caso de no generarse la key se puede generar con el comando "php artisan key:generate")
     APP_DEBUG=true (true 贸 false para mostrar o no m谩s detalles de los errores que se presenten) 
     APP_URL=http://localhost (es oopcional, se le puede cambiar por el nombre que sea) 

     LOG_CHANNEL=stack
     LOG_DEPRECATIONS_CHANNEL=null
     LOG_LEVEL=debug 

     DB_CONNECTION= mysql 
     DB_HOST=127.0.0.1 
     DB_PORT=3306 (puerto por defecto de MYSQL)
     DB_DATABASE=test_laravel ( ac谩 va el nombre de la base de datos anteriormente creada) 
     DB_USERNAME=root 
     DB_PASSWORD=  
     ```

5) Como siguiente paso debemos Crear tablas en la base de datos para el acceso a Laravel, tambi茅n ayuda en el control de la versi贸n de la base de datos.
* la migraci贸n se hace con el siguiente comando desde la terminal (debe estar posicionado dentro de su proyecto):
   ```
     php artisan migrate
   ```
* Para crear las tablas en la base de datos y al mismo tiempo agregar el usuario administrador autom谩ticamente, ejecuta el siguiente comando:
   ```
     php artisan migrate --seed
   ```
6) Luego se debe iniciar el servidor de desarrollo.
* El cual se inicia con el siguiente comando desde la terminal (debe estar posicionado dentro de su proyecto):
   ```
     php artisan serve --port=8002 (El puerto puede variar ya que uno lo escoge)
   ```

7) Para finalizar debe dirigirse a la url que le proporciona el cmd y listo, tiene instalado laravel .

### Instalaci贸n de laravel (Linux) 馃敡


1) Para poder comenzar con la instalaci贸n de laravel en linux necesitamos contar con linux totalmente actualizado.
* para actualizar linux necesitamos abrir la terminal (Control + Alt + T) y ejecutar el siguiente comando :

     ```
     sudo apt update
     ```
* Una vez teniendo el anterior paso ya terminado, debemos repetir la ejecuci贸n con este comando :

     ```
     sudo apt upgrade
     ```
*(luego se debe reiniciar el pc)*

2) Una vez ya contando con lo anterior seguiremos con la instalaci贸n del paquete LEMP de NGINX.
* para ello necesitamos ejecutar el siguiente comando :

     ```
     sudo apt install nginx -y
     ```

3) De igual forma procederemos a la instalaci贸n del paquete LEMP de MYSQL.
* para esto se necesita  ejecutar el siguiente comando :

     ```
     sudo apt install mysql-client mysql-server -y
     ```

4) Asimismo procederemos a la instalaci贸n del paquete LEMP de PHP.
* por lo cual se necesita  ejecutar el siguiente comando :

     ```
     sudo apt install php-common php-fpm php-json php-mbstring php-zip php-cli php-xml php-tokenizer -y
     ```

5) Ya teniendo los pasos anteriores listos se puede comenzar con la instalaci贸n de Laravel, para ello necesitamos instalar el gestor de paquetes llamado " COMPOSER ".
* que se ejecuta con el siguiente comando :

     ```
     curl -sS https://getcomposer.org/installer | php
     sudo mv composer.phar /usr/local/bin/composer
     ```

6) Para finalizar se debe dar los permisos correspondientes a Laravel Project.
* que se hacen con los siguientes comandos :

     ```
     sudo chmod -R 755 /var/www/html/project_name.com
     sudo chown -R www-data:www-data /var/www/html/project_name.com
     cd project_name.com 
     composer install
     ```



_( POR EL MOMENTO EL PROYECTO NO CUENTA CON PRUEBAS AUTOMATIZADAS DEFINIDAS, PERO CUANDO ESTAS EXISTAN SE EJECUTAR脕N EN "php artisan test")_

## Construido con 馃洜锔?

* [Laravel](https://laravel.com/docs/8.x) 

## Versionado 馃搶

De momento hay una primera y unica versi贸n hubicada en la rama Master.