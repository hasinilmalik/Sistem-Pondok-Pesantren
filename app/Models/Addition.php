<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Addition extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'nism',
        'kip',
        'pkh',
        'kks',
        
        'agama',
        'hobi',
        'cita_cita',
        'kewarganegaraan',
        'kebutuhan_khusus',
        'status_rumah',
        'status_mukim',
        
        
        'lembaga_formal',
        'madin',
        'sekolah_asal',
        'alamat_sekolah_asal',
        'npsn_sekolah_asal',
        'nsm_sekolah_asal',
        'no_ijazah',
        'no_un',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
