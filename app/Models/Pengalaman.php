<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengalaman extends Model
{
    public $table = "pengalaman";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
    'user_id',
		'instansi',
		'jabatan',
		'dari_tanggal',
		'sampai_tanggal',

    ];

    public static $rules = [
        // create rules
    ];

    // Pengalaman

}
