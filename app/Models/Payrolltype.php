<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payrolltype extends Model
{
    public $table = "payrolltypes";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'name',

    ];

    public static $rules = [
        // create rules
    ];

    // Payrolltype 

}
