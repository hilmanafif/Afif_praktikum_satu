<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $table = "companies";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'name',
		'tax',
		'reg',
		'phone',
		'fax',
		'address1',
		'address2',
		'city',
		'province',
		'zip',
		'country',
		'logo',
		'timezone',
		'currency',

    ];

    public static $rules = [
        // create rules
    ];

    // Company 

}
