## Api Codersfree

### Configs

* Server http://api.local.xip.ip:8002/
```bash
php artisan serve --host=api.local.xip.ip --port=8002
```

El cliente tiene que tener en el header
> Content-Type: multipart/form-data
> 
> Accept: application/json

Convenciones

Las tablas en minúsculas, inglés y plural.

Las llaves foráneas en singular `nombre_id`

Crea factories
```bash
php artisan make:factory ImageFactory
```

Crea acceso directo a public/storage
- se debe cambiar el '.env' en FILESYSTEM_DISK
```bash
php artisan storage:link
```

Crea seeder

```bash
php artisan make:seeder UserSeeder
```

### Next
[Cap 10](https://codersfree.com/courses-status/aprende-a-crear-una-api-restful-con-laravel/solucionando-posible-error-con-faker)
