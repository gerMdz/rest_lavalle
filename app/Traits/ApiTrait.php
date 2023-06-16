<?php

namespace App\Traits;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

trait ApiTrait
{
    public function scopeIncluye(Builder $qb)
    {
        if (empty($this->permiteIncluye) || empty(request('incluye'))) {
            return;
        }


        $relaciones = explode(',', request('incluye'));
        $incluyePermitidos = collect($this->permiteIncluye);
        foreach ($relaciones as $key => $value) {
            if (!$incluyePermitidos->contains($value)) {
                unset($relaciones[$key]);
            }
        }

        $qb->with($relaciones);

    }

    public function scopeFiltro(Builder $qb)
    {
        if (empty($this->permiteFiltro) || empty(request('filtro'))) {
            return;
        }

        $filtros = request('filtro');

        $filtrosPermitidos = collect($this->permiteFiltro);


        foreach ($filtros as $k => $v) {
            if ($filtrosPermitidos->contains($k)) {
                $qb->where(
                    $k, 'LIKE', '%' . $v . '%'
                );
            }
        }
    }

    public function scopeOrden(Builder $qb)
    {
        if (empty($this->permiteOrdenar) || empty(request('orden'))) {
            return;
        }

        $ordenes = explode(',', request('orden'));

        $ordenesPermitidos = collect($this->permiteOrdenar);


        foreach ($ordenes as $k) {
            $vector = 'asc';
            if (str_starts_with($k, '!')) {
                $vector = 'desc';
                $k = substr($k, 1);
            }
            if ($ordenesPermitidos->contains($k)) {
                $qb->orderBy(
                    $k, $vector
                );
            }
        }
    }

    public function scopeObtenerOrPaginar(Builder $qb): Collection|LengthAwarePaginator|array
    {
        if (request('perPage')) {
            $perPage = (int)request('perPage');
            if ($perPage) {
                return $qb->paginate($perPage);
            }
        }
        return $qb->get();
    }
}
