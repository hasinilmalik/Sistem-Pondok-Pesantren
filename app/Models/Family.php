<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'a_kk',
        'a_nik',
        'a_nama',
        'a_pekerjaan',
        'a_pendidikan',
        'a_phone',
        'a_penghasilan',
        'i_nik',
        'i_nama',
        'i_pekerjaan',
        'i_pendidikan',
        'i_phone',
        'w_hubungan_wali',
        'w_nik',
        'w_nama',
        'w_pekerjaan',
        'w_penghasilan',
    ];
    public function user()
    {
        return $this->belongsTo(Student::class);
    }
}
