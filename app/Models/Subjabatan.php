<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subjabatan extends Model
{
    public $table = "subjabatans";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'jabatan_id',
		'kode_subjabatan',
		'kode',
		'name',

    ];

    public static $rules = [
        // create rules
    ];

    // Subjabatan 

}
