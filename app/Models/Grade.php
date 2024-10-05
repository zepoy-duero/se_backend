<?php

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['student_prospectus_id', 'grade_value'];

    public function studentProspectus()
    {
        return $this->belongsTo(StudentProspectus::class);
    }
}
