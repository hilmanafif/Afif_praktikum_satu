<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tupel extends Model
{
    public $table = "tupels";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'tupel',
		'tukebar',
		'tujkinerja',
		'jabatan',
		'jabatan_id',

    ];

    public static $rules = [
        // create rules
    ];

    // Tupel 

}
