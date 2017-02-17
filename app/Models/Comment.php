<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $table = "comments";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'content_id',
		'name',
		'email',
		'body',
		'status',

    ];

    public static $rules = [
        // create rules
    ];

    // Comment 

}
