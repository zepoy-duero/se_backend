<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'first_name',
        'last_name',
        'middle_name',
        'gender',
        'date_of_birth',
        'email',
        'address',
        'course',
        'year_level',
        'college_department',
    ];

    public function prospectuses()
    {
        return $this->hasMany(StudentProspectus::class);
    }
}
