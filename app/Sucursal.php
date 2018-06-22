<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
	
   	public function usuario()
    {
        return $this->belongsTo(usuario::class);
    }	
   	public function tickets()
    {
        return $this->belongsTo(Tickets::class);
    }
}
