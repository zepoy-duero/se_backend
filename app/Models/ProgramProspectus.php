<?php

class ProgramProspectus extends Model
{
    use HasFactory;

    protected $fillable = ['program_of_study', 'course_code', 'course_title', 'no_of_hours_lec', 'no_of_hours_lab', 'credit_units', 'pre_requisites'];

    public function studentProspectuses()
    {
        return $this->hasMany(StudentProspectus::class);
    }
}
