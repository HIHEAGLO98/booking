<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'sexe',
        'ville',
        'pays',
        'contact',
        'photo',
        'adresse',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
     /** 4
     * un user = organisateur peut avoir plusieurs roles.
   
       * public function roles()
       * {
        *    return $this->belongsToMany(Role::class,"user_role","user_id","role_id");
       * }
        *
      ** public function permission()
    *  {
     *       return $this->belongsToMany(Permission::class,"user_permission","user_id","permission_id");
    *    }
    */  

    /**
     * Vérifier si un user a un certain role
     *
     */
    
    
   /*
   public function hasRole($role)
    {
        return $this->roles()->where("nom_role" , $role)->first() !==null;

    }
    public function hasAnyRoles($roles)
    {
        return $this->roles()->whereIn("nom__role" , $roles)->first() !==null;
    }
    */

    

}
