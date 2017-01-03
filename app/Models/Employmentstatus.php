<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employmentstatus extends Model
{
    public $table = "employmentstatuses";

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

    // Employmentstatus 

}
