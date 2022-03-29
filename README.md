# SILVER  

_Este proyecto trata de disponibilizar de manera organizada, en interfaz y en api's, la información que se encuentra en la base de datos del software SilverTool. _

## Comenzando 🚀

_Para poder ocupar este proyecto necesitamos clonar el repositorio desde [GitHub](https://github.com/ERomeroFiab/silver), una vez ya realizado ello necesitamos copiar el link que aparece en code - HTTPS, luego debemos ir a nuestro proyecto y hacer el comando " git clone (link)" en la terminal y lo podremos utilizar de forma local._


### Pre-requisitos (Windows) 📋

_Para poder proceder con la instalación se necesita tener lo siguiente : *(en caso de no tenerlos instalados abajo se explica todo paso por paso)*_
* PHP
* COMPOSER
* Gestores de base de datos (XAMPP,LARAGON,ETC)
### Pre-requisitos (Linux) 📋
 
_Para poder proceder con la instalación se necesita tener lo siguiente : *(en caso de no tenerlos instalados abajo se explica todo paso por paso)*_
* PHP
* NGINX O APACHE
* MYSQL
* COMPOSER

### Instalación de laravel (Windows) 🔧


1) Para comenzar la instalción de Laravel debemos tener instalado el gestor de paquetes llamado "COMPOSER".
* para esto debemos descargarlo  desde [la pagina oficial](https://getcomposer.org/download/):

     ```
     * Una vez ya estando en la pagina ofical de COMPOSER, debemos descargar el archivo "Composer-Setup.exe".

     * Luego de que se inicia el instalador, pregunta si deseamos instalarlo como desarrollador ( es opcional pero en este caso no lo haremos) se debe dar en "NEXT".

     * En seguida nos aparecera que seleccionemos el "comando o linea php a utilizar" para ello se debe dar  click en donde dice "BROWSE..." y se busca la ruta donde está instalado todo, (depende de lo que se tenga instalado ya sea XAMP,LARAGON,ETC) igualmente se recomienda usar la versión de PHP mas alta disponible por temas de compatibilidad, luego de eso se le da click en "NEXT".

     * se le vuelve a clickear en "NEXT".

     * y para finalizar se da click donde dice "INSTALL".

     (Como recomendación antes de dar en instalar siempre copiar el "ADD TO SYSTEM PATH", luego en su pc dirigirse a "este equipo" click derecho y entrar en "PROPIEDADES" una vez dentro ir a "CONFIGURACIÓN AVANZADA DEL SISTEMA" le damos donde dice "VARIABLES DE ENTORNO" y buscar en las variables del sistemas (Generales) el "PATH" y como final se debe verificar tener instalado "COMPOSER" (en caso contrario dar click en nuevo y pegar la ruta copiada anteriormente) )
     ```
*(luego se debe reiniciar el pc)*

2) Ya teniendo composer instalado debemos movernos al directorio.
* para ello necesitamos abrir el "CMD" y se debe abrir el directorio (depende si tiene XAMPP,LARAGON,ETC) donde se debe instalar Laravel.


3) Encontrandonos ya en el directorio procedemos a instalar Laravel.
* para esto se necesita  ejecutar el siguiente comando :

     ```
     composer global requiere laravel / installer.
     ```

4) Ahora debemos configurar la base de datos.
* Para esto debemos seguir los siguientes pasos:

     ```
     * Vaya a phpMyAdmin y haga clic en crear una nueva pestaña.

     * Nombra la base de datos.

     * Presione el botón crear. 
     ```

5) Debemos actualizar el archivo ".ENV".
* Debemos hacer lo siguiente:

     ```
     APP_NAME = Laravel ( es el nombre que uno le quiere dar a la aplicación)
     APP_ENV = local 
     APP_KEY=base64:TJ9Sob7KFPhL5XkqT+TyQux3x7UbW08QLb0xtirLWSs= 
     APP_DEBUG = verdadero 
     APP_URL = http://localhost (es oopcional, se le puede cambiar por el nombre que sea) 

     LOG_CHANNEL = pila 
     LOG_LEVEL = depurar 

     DB_CONNECTION = mysql 
     DB_HOST = 127.0.0.1 
     DB_PORT = 3306 
     DB_DATABASE = test_laravel ( acá va el nombre de la base de datos anteriormente creada) 
     DB_USERNAME = root 
     DB_PASSWORD = . 
     ```

6) Como siguiente paso debemos Crear tablas en la base de datos para el acceso a Laravel, también ayuda en el control de la versión de la base de datos.
* la migración se hace con el siguiente comando desde la terminal (debe estar posicionado dentro de su proyecto):
   ```
     php artisan migrate
   ```

7) Luego se debe iniciar el servidor de desarrollo.
* El cual se inicia con el siguiente comando desde la terminal (debe estar posicionado dentro de su proyecto):
   ```
     php artisan serve
   ```

8) Para finalizar debe dirigirse a la url que le proporciona el cmd y listo, tiene instalado laravel .

### Instalación de laravel (Linux) 🔧


1) Para poder comenzar con la instalación de laravel en linux necesitamos contar con linux totalmente actualizado.
* para actualizar linux necesitamos abrir la terminal (Control + Alt + T) y ejecutar el siguiente comando :

     ```
     sudo apt update
     ```
* Una vez teniendo el anterior paso ya terminado, debemos repetir la ejecución con este comando :

     ```
     sudo apt upgrade
     ```
*(luego se debe reiniciar el pc)*

2) Una vez ya contando con lo anterior seguiremos con la instalación del paquete LEMP de NGINX.
* para ello necesitamos ejecutar el siguiente comando :

     ```
     sudo apt install nginx -y
     ```

3) De igual forma procederemos a la instalación del paquete LEMP de MYSQL.
* para esto se necesita  ejecutar el siguiente comando :

     ```
     sudo apt install mysql-client mysql-server -y
     ```

4) Asimismo procederemos a la instalación del paquete LEMP de PHP.
* por lo cual se necesita  ejecutar el siguiente comando :

     ```
     sudo apt install php-common php-fpm php-json php-mbstring php-zip php-cli php-xml php-tokenizer -y
     ```

5) Ya teniendo los pasos anteriores listos se puede comenzar con la instalación de Laravel, para ello necesitamos instalar el gestor de paquetes llamado " COMPOSER ".
* que se ejecuta con el siguiente comando :

     ```
     curl -sS https://getcomposer.org/installer | php
     sudo mv composer.phar /usr/local/bin/composer
     ```

6) Teniendo listo el paso anterioir debemos seguir con la instalación de Laravel Project.
* que efectua con el siguiente comando :

     ```
    cd /var/www/html
    git clone “github_url” “Project_name.com” (El "Project_name.com" es opcional)
     ```

7) Para finalizar se debe dar los permisos correspondientes a Laravel Project.
* que se hacen con los siguientes comandos :

     ```
     sudo chmod -R 755 /var/www/html/project_name.com
     sudo chown -R www-data:www-data /var/www/html/project_name.com
     cd project_name.com 
     composer install
     ```



_( POR EL MOMENTO EL PROYECTO NO CUENTA CON PRUEBAS AUTOMATIZADAS DEFINIDAS, PERO CUANDO ESTAS EXISTAN SE EJECUTARÁN EN "php artisan test")_

## Construido con 🛠️

* [Laravel](https://laravel.com/docs/8.x) 

## Versionado 📌

De momento hay una primera y unica versión hubicada en la rama Master.