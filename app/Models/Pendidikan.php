<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    public $table = "pendidikans";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'user_id',
		'nama',
		'tingkat',
		'tahun_lulus',

    ];

    public static $rules = [
        // create rules
    ];

    // Pendidikan 

}
