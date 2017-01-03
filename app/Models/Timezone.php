<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timezone extends Model
{
    public $table = "timezones";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'name',
		'company_id',

    ];

    public static $rules = [
        // create rules
    ];

    // Timezone 

}
