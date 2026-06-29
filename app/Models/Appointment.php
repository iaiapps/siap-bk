<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'appointment_date' => 'date:Y-m-d',
            'appointment_time' => 'string',
        ];
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
