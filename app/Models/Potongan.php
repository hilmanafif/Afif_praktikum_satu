<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Potongan extends Model
{
  public $table = "potongans";

  public $primaryKey = "id";

  public $timestamps = true;

  public $fillable = [
  'nip','jabatan','bpjs','dapenma','bpjskes','bpjspensiun','zakat','bjb','iurandw','tabungan','warung','pinjrutin','pinjperum','utangpeg','potlain','iuranykpp'

  ];

  public static $rules = [
      // create rules
  ];

  // Payroll
  public function user()
  {
      return $this->belongsTo(User::class,'nip','employee_number');
  }


}
