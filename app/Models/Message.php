<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $table = "messages";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'name',
		'message',
		'sender_id',
		'receiver_id',
		'status',

    ];

    public static $rules = [
        // create rules
    ];

    // Message 

}
