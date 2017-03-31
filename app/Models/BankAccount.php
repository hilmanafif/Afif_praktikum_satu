<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    public $table = "bankaccounts";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'name',
		'address',
		'logo',

    ];

    public static $rules = [
        // create rules
    ];

    // BankAccount 

}
