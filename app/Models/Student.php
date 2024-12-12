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

    public function scopeFilter($query, array $filters)
    {
        // Apply search filter
        if (!empty($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('first_name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('last_name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('r_id', 'like', '%' . $filters['search'] . '%');
            });
        }

        // Apply sorting
        if (!empty($filters['sort'])) {
            switch ($filters['sort']) {
                case 'student_id':
                    $query->orderBy('r_id', 'asc');
                    break;
                case 'name':
                    $query->orderBy('first_name', 'asc');
                    break;
                case 'course_name':
                    $query->orderBy('courses.course_name', 'asc'); // Assumes a relationship named 'course'
                    break;
                case 'agent':
                    $query->orderBy('agents.name', 'asc'); // Assumes a relationship named 'agent'
                    break;
                default:
                    break;
            }
        }

        return $query;
    }
}
