<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
	protected $table='statuses';
	protected $primaryKey='id';
	protected $fillable = [ 'name','descripcion' ];

    public function tickets()
    {
        return $this->hasMany(Tickets::class);
    }
}

