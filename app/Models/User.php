<?php

namespace App\Models;

use App\Models\AnggotaKeluarga;
use App\Models\Content;
use App\Models\Topic;
use App\Models\Role;
use App\Models\Team;
use App\Models\UserMeta;
use App\Models\Wilayah;
use App\Models\Jabatan;
use App\Models\Tupel;
use App\Models\Pendidikan;
use App\Models\Pengalaman;
use App\Models\Potongan;
use App\Notifications\ResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DateTime;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
         'name','employee_number', 'bagian_id', 'wilayah_id', 'pangkat_id', 'ruang', 'jabatan_id', 'email', 'password','startworking_date'
     ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * User UserMeta
     *
     * @return Relationship
     */
    public function meta()
    {
        return $this->hasOne(UserMeta::class);
    }
    public function potongan()
    {
        return $this->hasOne(Potongan::class,'nip','employee_number');
    }
    /**
     * User Roles
     *
     * @return Relationship
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function wilayahs()
    {
        return $this->belongsTo(Wilayah::class,'wilayah_id');
    }
    public function jabatans()
    {
        return $this->belongsTo(Jabatan::class,'jabatan_id');
    }
    public function pangkats()
    {
        return $this->belongsTo(Pangkat::class,'pangkat_id');
    }
    public function bagians()
    {
        return $this->belongsTo(Bagian::class,'bagian_id');
    }
    public function anggotaKeluargas()
    {
        return $this->hasMany(AnggotaKeluarga::class,'user_id');
    }
    public function jumlahAnak($id)
    {
        //return AnggotaKeluarga::where('user_id',$id)->where('hub_keluarga', 'anak')->where('is_active', 1)->count();
        // Hanya menghitung anak di bawah umur 21 tahun per hari ini
        return AnggotaKeluarga::where('user_id',$id)->where('hub_keluarga', 'anak')->where('is_active', 1)->whereBetween('tanggal_lahir', [Carbon::now()->subYears(21), Carbon::now()])->count();
    }
    public function jumlahPasangan($id)
    {
        return AnggotaKeluarga::where('user_id',$id)->where('hub_keluarga', 'pasangan')->where('is_active', 1)->count();
    }
    public function pendidikans()
    {
        return $this->hasMany(Pendidikan::class,'user_id');
    }
    public function jumlahPendidikan($id)
    {
        return Pendidikan::where('user_id',$id)->count();
    }
    public function pengalamans()
    {
        return $this->hasMany(Pengalaman::class,'user_id');
    }
    public function jumlahPengalaman($id)
    {
        return Pengalaman::where('user_id',$id)->count();
    }
    public function gajiPokok($id){
      $employee=User::findOrFail($id);
      $gapok=GajiPokok::where('pangkat_id',$employee->pangkat_id)
                      ->where('ruang',$employee->ruang)
                      ->first();
      if (!$gapok) {
        return "gapok dengan pangkat ".$employee->pangkat_id." dan ruang ".$employee->ruang." tidak ditemukan";
      }
      return $gapok->gaji_pokok;
    }

    public function tunjanganIstri($id){
      $jumlahPasangan=$this->jumlahPasangan($id);
      $gapok=$this->gajiPokok($id);
      $tunjanganPersen=10/100;

      if ($jumlahPasangan>1) {
        $jumlahPasangan=1;
      }

      $tunjanganIstri=$gapok*$tunjanganPersen*$jumlahPasangan;

      if ($this->meta->jenis_kelamin == 'P') {
        $tunjanganIstri = 0;
      }

      return $tunjanganIstri;
    }

    public function tunjanganAnak($id){
      $jumlahAnak=$this->jumlahAnak($id);
      $gapok=$this->gajiPokok($id);
      $tunjanganPersen=5/100;

      if ($jumlahAnak>2) {
        $jumlahAnak=2;
      }

      $tunjanganAnak=$gapok*$tunjanganPersen*$jumlahAnak;
      return $tunjanganAnak;
    }

    public function natura($id){
      $jumlahAnak=$this->jumlahAnak($id);
      $jumlahPasangan=$this->jumlahPasangan($id);
      $naturaPerJiwa=100000;

      if ($jumlahPasangan>1) {
        $jumlahPasangan=1;
      }
      if ($this->meta->jenis_kelamin == 'P') {
        $jumlahPasangan=0;
      }
      if ($jumlahAnak>2) {
        $jumlahAnak=2;
      }

      $jumlahJiwa=$jumlahAnak+$jumlahPasangan+1;
      $natura=$jumlahJiwa*$naturaPerJiwa;
      return $natura;
    }

    public function tunjanganPelaksana($id){
      $tunjanganPelaksana = Tupel::where('id','=',$id);
      return $tunjanganPelaksana->first()->tupel;
    }

    /**
     * Check if user has role
     *
     * @param  string  $role
     * @return boolean
     */
    public function hasRole($role)
    {
        $roles = array_column($this->roles->toArray(), 'name');
        return array_search($role, $roles) > -1;
    }

    /**
     * Teams
     *
     * @return Relationship
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    /**
     * Team member
     *
     * @return boolean
     */
    public function isTeamMember($id)
    {
        $teams = array_column($this->teams->toArray(), 'id');
        return array_search($id, $teams) > -1;
    }

    /**
     * Team admin
     *
     * @return boolean
     */
    public function isTeamAdmin($id)
    {
        $team = $this->teams->find($id);
        return (int) $team->user_id === (int) $this->id;
    }

    /**
     * Find by Email
     *
     * @param  string $email
     * @return User
     */
    public function findByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
    public static function masakerja($id){
      $user=User::find($id);
      $now= new DateTime(date('Y-m-d'));
      $started= new DateTime($user->startworking_date);
      $diff= $started->diff($now);
      //mengembalikan nilai tahun saja
      return $diff->y;
    }
}
