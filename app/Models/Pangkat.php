<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pangkat extends Model
{
    public $table = "pangkats";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'kodepangkat',
		'name',

    ];

    public static $rules = [
        // create rules
    ];

    // Pangkat
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
