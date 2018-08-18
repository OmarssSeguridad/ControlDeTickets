<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
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
