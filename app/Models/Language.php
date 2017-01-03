<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public $table = "languages";

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

    // Language 

}
