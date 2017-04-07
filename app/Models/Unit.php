<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public $table = "units";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'kode',
		'name',
		'id_parent',

    ];

    public static $rules = [
        // create rules
    ];

    // Unit 

}
