<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pending_Eval extends Model
{
    use HasFactory;

    protected $table = 'pending_eval';

    protected $fillable = [
        'student_id',
        'faculty_id',
        'academic_year',
        'semester',
        'college_id',
        'department_id',
        'program_id',
        'A1',
        'A2',
        'A3',
        'A4',
        'A5',
        'B1',
        'B2',
        'B3',
        'B4',
        'B5',
        'C1',
        'C2',
        'C3',
        'C4',
        'C5',
        'D1',
        'D2',
        'D3',
        'D4',
        'D5',
        'comment',
        'eval_id',
    ];
    
}
