<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusPegawai extends Model
{
    public $table = "statuspegawais";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'kode',
		'name',

    ];

    public static $rules = [
        // create rules
    ];

    // StatusPegawai 

}
