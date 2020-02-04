<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey = "id_user";
    protected $table = "tb_users";
    protected $hidden = ['password', 'created_at', 'updated_at'];
    protected $fillable = ['name', 'email', 'password'];
}
