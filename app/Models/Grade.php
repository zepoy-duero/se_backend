<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['student_prospectus_id', 'grade_value'];

    public function studentProspectus()
    {
        return $this->belongsTo(StudentProspectus::class);
    }
}
