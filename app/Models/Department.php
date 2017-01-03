<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public $table = "departments";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
      'id',
  		'name',
  		'description',
      'company_id',
    ];

    public static $rules = [
        // create rules
    ];

    // Department

}
