<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Content;

class OfflineWriter extends Model
{
    public $table = "offlinewriters";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'name',
		'description',
		'twitter',
		'email',
		'phone',

    ];

    public static $rules = [
        // create rules
    ];

    public function contents()
    {
        return $this->hasMany(Content::class);
    }
    // OfflineWriter

}
