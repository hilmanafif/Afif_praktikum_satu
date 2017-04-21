<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    public $table = "payrolls";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        		'id',
		'title',
    'user_id',
		'name',
    'pangkat_id',
    'start_date',
		'end_date',
		'gapok',
    'payrolltype_id',

    ];

    public static $rules = [
        // create rules
    ];

    // Payroll
    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
