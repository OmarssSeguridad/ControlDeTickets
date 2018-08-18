<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
	    protected $fillable = ['name'];
    public function admin()
    {
        return $this->hasMany(Admin::class);
    }
        public function usuario()
    {
        return $this->hasMany(Usuario::class);
    }
}
