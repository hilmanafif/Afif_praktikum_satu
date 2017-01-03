<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $table = "locations";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'name',
		'address',
		'city',
		'lat',
		'long',
		'company_id',
		'timezone_id',

    ];

    public static $rules = [
        // create rules
    ];

    // Location 

}
