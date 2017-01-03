<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documenttype extends Model
{
    public $table = "documenttypes";

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

    // Documenttype 

}
