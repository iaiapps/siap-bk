<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentCall extends Model
{
    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'call_date' => 'date:Y-m-d',
            'attendance_date' => 'date:Y-m-d',
            'parent_attended' => 'boolean',
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

    public function isPublished(): bool
    {
        return $this->status === 'published';
    }

    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }

    public function isCancelled(): bool
    {
        return $this->status === 'cancelled';
    }

    public function isDraft(): bool
    {
        return $this->status === 'draft';
    }
}
