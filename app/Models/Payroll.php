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
    'tunjangan_anak',
    'tunjangan_istri',
    'tunjangan_natura',
    'tunjangan_kinerja',
    'tunjangan_jabatan',
    'tunjangan_kendaraan',
    'tunjangan_pelaksana',
    'payrolltype_id',
    'approved',
    'employee_number'
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
