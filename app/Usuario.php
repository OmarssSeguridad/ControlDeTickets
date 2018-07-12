<?php

namespace App;

use App\Notifications\UsuarioResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','departamento','cargo','telefono','direccion','sucursal','noEmpleado', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','tipoUsuario',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UsuarioResetPassword($token));
    }
   
    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }
    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function tickets()
    {
        return $this->hasMany(Tickets::class);
    }
}
