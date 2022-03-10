<?php

namespace App\Models;

use App\Models\Addition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $guarded=[''];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function family()
    {
        return $this->hasOne(Family::class);
    }
    public function addition()
    {
        return $this->hasOne(Addition::class);
    }
}
