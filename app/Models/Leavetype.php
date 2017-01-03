<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leavetype extends Model
{
    public $table = "leavetypes";

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

    // Leavetype 

}
