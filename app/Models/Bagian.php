<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    public $table = "bagians";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'kode',
		'name',
		'id_parent',

    ];

    public static $rules = [
        // create rules
    ];

    // Bagian
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
