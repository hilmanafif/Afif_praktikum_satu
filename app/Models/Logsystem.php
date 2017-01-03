<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logsystem extends Model
{
    public $table = "logsystems";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'name',
		'ipaddress',
		'user_id',

    ];

    public static $rules = [
        // create rules
    ];

    // Logsystem 

}
