<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImgStorage extends Model
{
      public function tickets()
    {
        return $this->hasMany(Tickets::class);
    }

}
