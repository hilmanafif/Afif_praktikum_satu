<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public $table = "skills";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'name',
		'description',
		'company_id',

    ];

    public static $rules = [
        // create rules
    ];

    // Skill 

}
