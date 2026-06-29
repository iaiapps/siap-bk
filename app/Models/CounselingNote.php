<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CounselingNote extends Model
{
    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'session_date' => 'date:Y-m-d',
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
