<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    protected $fillable = ['name', 'price'];
    protected $hidden = [ 'created_at', 'updated_at'];
    protected $primaryKey = 'id_drink';
    protected $table = 'tb_drinks';
}
