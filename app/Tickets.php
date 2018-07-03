<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

}
