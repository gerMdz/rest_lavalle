<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EtiquetaPost extends Pivot
{
    //

    protected $table = 'post_tag';
}
