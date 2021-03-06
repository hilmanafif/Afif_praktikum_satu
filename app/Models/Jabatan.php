<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Jabatan extends Model
{
    public $table = "jabatans";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
            'kode_umum',
        		'kode',
            'name',
            'name_umum',
            'Tunjab',
            'Tunpres',
            'Tupel',
            'Turam',
        		'Tunken',
    ];

    public static $rules = [
        // create rules
    ];

    // Jabatan
    public function users()
    {
        return $this->hasMany(User::class);
    }

}
