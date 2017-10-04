<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnggotaKeluarga extends Model
{
    public $table = "anggotakeluargas";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'user_id',
		'nama',
		'hub_keluarga',
		'tempat_lahir',
		'tanggal_lahir',
		'jenis_kelamin',
    'agama_id',
		'is_active',

    ];

    public static $rules = [
        // create rules
    ];

    // AnggotaKeluarga

}
