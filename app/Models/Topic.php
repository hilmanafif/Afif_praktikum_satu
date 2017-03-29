<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Content;

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contents()
    {
        return $this->hasMany(Content::class);
    }
    // Topic

}
