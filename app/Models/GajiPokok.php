<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GajiPokok extends Model
{
    public $table = "gajipokoks";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'id_pangkat',
		'masa_kerja',
		'gaji_pokok',
		'gaji_tunjangan_pokok',

    ];

    public static $rules = [
        // create rules
    ];

    // GajiPokok

    public function Pangkats(){
      return $this->belongsTo(Pangkat::class,'pangkat_id');
    }

}
