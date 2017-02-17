<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public $table = "topics";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'name',
		'description',
		'body',
		'user_id',
		'status',

    ];

    public static $rules = [
        // create rules
    ];

    // Topic 

}
