<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusPerkawinan extends Model
{
    public $table = "statusperkawinans";

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

    // StatusPerkawinan 

}
