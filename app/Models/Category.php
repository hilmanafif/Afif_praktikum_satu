<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Content;

class Category extends Model
{
    public $table = "categories";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'name',
		'description',
		'body',

    ];

    public static $rules = [
        // create rules
    ];

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    // Category

}
