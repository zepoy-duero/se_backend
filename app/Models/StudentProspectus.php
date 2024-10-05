<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class StudentProspectus extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'prospectus_id', 'enrollment_date'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function programProspectus()
    {
        return $this->belongsTo(ProgramProspectus::class, 'prospectus_id');
    }

    public function grade()
    {
        return $this->hasOne(Grade::class);
    }
}