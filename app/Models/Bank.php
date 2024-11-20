<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_name',
        'account_name',
        'branch_address',
        'head_office_address',
        'contact',
        'sort_code',
        'account_number',
        'swift_code',
        'iban',
        'bic',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
