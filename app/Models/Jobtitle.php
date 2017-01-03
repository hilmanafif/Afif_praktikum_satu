<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jobtitle extends Model
{
    public $table = "jobtitles";

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

    // Jobtitle 

}
