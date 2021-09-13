<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user', 'id_rol','status'
    ];
}
