<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MadinRombel extends Model
{
    protected $table = 'madin_rombel';
    use HasFactory;
    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function madin_institution()
    {
        return $this->belongsTo(MadinInstitution::class);
    }
}
