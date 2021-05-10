# Iniciando con el API

## Instalación

## Usuarios

Para interactuar con las funcionalidades debes tener un usuario registrado y autenticado.

### Crear Usuario


## Autenticación

### Credenciales de Aplicación

Cada aplicación que pretenda interactuar con el API debe estar autorizada, se debe solicitar las credenciales de acceso como **Aplicación**.

En las credenciales de acceo tendrás:

- `client_id` : Identificador del cliente
- `client_secret` : Llave secreta del cliente

Estas credenciales se requerirán en el proceso de autenticación.

### Generar Token de Usuario

La autenticación de usuarios sigue el estandar definido de autenticación [Oauth 2.0](https://tools.ietf.org/html/rfc6749).

Para la autenticación de un usuario se debe usar el `grant_type` tipo `password`

Para solicitar tokens de usuario debes contar con las credenciales de autenticación de aplicación `client_id` y `client_secret`

Con los datos requeridos, debes consumir el endpoint [Request Token - API Reference](../reference/wallet.v1.yaml/paths/~1oauth~1token/post)

Con el token generado, despues puedes hacer peticiones enviando ese mismo token como un encabezado de autenticación

```
Authorization: Bearer {TOKEN}
```
