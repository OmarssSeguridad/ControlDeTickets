<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $table='tickets';
    //protected $fillable = [ 'name','sucursal','asunto','detalle','evidencia' ];
    protected $fillable=['status'];
    protected $primaryKey='id';

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
    public function respuestas()
    {
        return $this->belongsTo(Respuestas::class);
    }

}
