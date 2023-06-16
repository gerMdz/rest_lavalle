<?php

namespace App\Models;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EtiquetaPost extends Pivot
{
    //
    use ApiTrait;
    protected $table = 'post_tag';
}
