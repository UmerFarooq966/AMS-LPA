<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'university_name',
        'admission_year',
        'course_code',
        'r_id',
        'first_name',
        'last_name',
        'student_picture',
        'gender',
        'passport_number',
        'nationality',
        'date_of_birth',
        'course_id',
        'bank_id',
        'country',
        'city',
        'embassy',
        'agent_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function scopeFilter($query, $filters)
    {
        // Apply Search
        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('r_id', 'like', "%{$search}%")
                    ->orWhereHas('course', function ($q) use ($search) {
                        $q->where('course_name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('agent', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            });
        }

        // Apply Sorting
        if (!empty($filters['sort'])) {
            switch ($filters['sort']) {
                case 'name':
                    $query->orderBy('first_name')->orderBy('last_name');
                    break;
                case 'course':
                    $query->orderBy('course.course_name');
                    break;
                case 'date':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'agent':
                    $query->orderBy('agent.name');
                    break;
            }
        }

        return $query;
    }
}
