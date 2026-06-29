<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function violations()
    {
        return $this->hasMany(Violation::class);
    }

    public function achievments()
    {
        return $this->hasMany(Achievment::class);
    }

    public function counselingNotes()
    {
        return $this->hasMany(CounselingNote::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function parentCalls()
    {
        return $this->hasMany(ParentCall::class);
    }
}
