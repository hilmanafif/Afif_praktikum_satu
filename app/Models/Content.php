<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public $table = "contents";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'name',
		'description',
		'quote',
		'body',
		'user_id',
		'offline_writer_id',
		'offline_writer',
		'category_id',
		'topic_id',
		'status',

    ];

    public static $rules = [
        // create rules
    ];

    // Content 

}
