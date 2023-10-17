<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation_Records extends Model
{
    use HasFactory;

    protected $table = 'evaluation_records';

    protected $fillable = [
        'student_id',
        'faculty_id',
        'academic_year',
        'semester',
        'college_id',
        'department_id',
        'program_id',
        'A',
        'B',
        'C',
        'D',
        'comment',
    ];

   // Assuming a one-to-one relationship with User
public function user()
{
    return $this->belongsTo(User::class, 'faculty_id', 'studentID');
}

public function college()
{
    return $this->belongsTo(College::class, 'college_id', 'id');
}



}
