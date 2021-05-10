# Iniciando con el API

## Instalación

### Pre-requisitos
- PHP 7.4
- Extensión de MongoDB para php habilitada
- Composer 


### Clonar el código de este repositorio usando git
- `git clone https://github.com/jair921/payload.git`

### Instalar dependencias

- `composer install`

### Duplicar archivo .env.example con el nombre .env 

- `cp .env.example .env`

### Generar el app_key con el comando 

- `php artisan key:generate`

### Configurar conexión a la base de datos en el archivo .env

**Reemplazar:**

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=laravel

DB_USERNAME=root

DB_PASSWORD=

**Por:**

DB_CONNECTION=mongodb

DB_DATABASE=[NAME_DB]

DB_DSN=mongodb+srv://payload:Lanburoot2016@cluster0.7lofe.mongodb.net/locations?retryWrites=true&w=majority

### Generar las colecciones base 

- `php artisan migrate`

### Instalar passport

- `php artisan passport:install`

> Ignorar advertencias después de ejecutar comando

### Generar secrets

- `php artisan passport:client --password --name="API" --provider="users"`

En el documento `oauth_clients` (mongodb), se creo un registro en su `name` con el valor `API`

Usar `_id` como `client_id`

Usar `secret` como `client_secret`

> Ignorar advertencias después de ejecutar comando

## Usuarios

Para interactuar con las funcionalidades debes tener un usuario registrado y autenticado.

### Crear Usuario

Para crear un usuario ejecutamos el comando:

- `php artisan user:make`

Solicitará nombre, email y contraseña.

## Autenticación

### Credenciales de Aplicación

Cada aplicación que pretenda interactuar con el API debe estar autorizada, se debe solicitar las credenciales de acceso como **Aplicación**.

En las credenciales de acceso tendrás:

- `client_id` : Identificador del cliente
- `client_secret` : Llave secreta del cliente

Estas credenciales se requerirán en el proceso de autenticación. 

> Se generaron en el paso [Generar secrets](#generar-secrets)

### Generar Token de Usuario

La autenticación de usuarios sigue el estandar definido de autenticación [Oauth 2.0](https://tools.ietf.org/html/rfc6749).

Para la autenticación de un usuario se debe usar el `grant_type` tipo `password`

Para solicitar tokens de usuario debes contar con las credenciales de autenticación de aplicación `client_id` y `client_secret`

Con los datos requeridos, debes consumir el endpoint `/oauth/token`

Con el token generado, después puedes hacer peticiones enviando ese mismo token como un encabezado de autenticación

```
Authorization: Bearer {TOKEN}
```
