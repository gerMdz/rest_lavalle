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

Query Scope

> Dentro del modelo se agrega una función que con le prefijo 'scope' importando Builder

```php
use Illuminate\Database\Eloquent\Builder;

public function scopeValorDeLaUrl(Builder $qb)
```

Crea clientes con uuid
```php
php artisan passport:install --uuids
```


### Next

[Cap 21](https://codersfree.com/courses-status/aprende-a-crear-una-api-restful-con-laravel/instalar-laravel-passport-ii)

