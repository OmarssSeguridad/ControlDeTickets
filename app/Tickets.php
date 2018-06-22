<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{

    public function usuario()
    {
        return $this->hasMany(Usuario::class);
    }
    public function admin()
    {
        return $this->hasMany(Admin::class);
    }
    public function tickets()
    {
        return $this->hasMany(Tickets::class);
    }

}
