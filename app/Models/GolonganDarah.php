<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GolonganDarah extends Model
{
    public $table = "golongandarahs";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'name',

    ];

    public static $rules = [
        // create rules
    ];

    // GolonganDarah 

}
