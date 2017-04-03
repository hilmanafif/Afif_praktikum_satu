<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    public $table = "jabatans";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'kode',
		'name',

    ];

    public static $rules = [
        // create rules
    ];

    // Jabatan 

}
