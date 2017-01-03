<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salarycomponent extends Model
{
    public $table = "salarycomponents";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'name',
		'default',
		'description',
		'company_id',

    ];

    public static $rules = [
        // create rules
    ];

    // Salarycomponent 

}
