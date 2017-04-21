<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    public $table = "payrolls";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'title',
		'user_id',
		'periode',
		'gapok',

    ];

    public static $rules = [
        // create rules
    ];

    // Payroll 

}
