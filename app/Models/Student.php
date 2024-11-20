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
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
