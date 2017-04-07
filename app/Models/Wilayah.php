<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Wilayah extends Model
{
    public $table = "wilayahs";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'kode',
		'name',
		'address',

    ];

    public static $rules = [
        // create rules
    ];

    // Wilayah
    public function users()
    {
        return $this->hasMany(User::class);
    }

}
