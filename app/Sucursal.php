<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{	
   	public function usuario()
    {
        return $this->hasMany(Usuario::class);
    }	
   	public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
