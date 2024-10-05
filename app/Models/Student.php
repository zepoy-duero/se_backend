<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'date_of_birth', 'email', 'address'];

    public function studentProspectuses()
    {
        return $this->hasMany(StudentProspectus::class);
    }
}
