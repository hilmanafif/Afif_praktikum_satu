<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusKerja extends Model
{
    public $table = "statuskerjas";

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

    // StatusKerja 

}
