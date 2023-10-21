<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semantic_Analysis extends Model
{
    use HasFactory;
    
    protected $table = 'semantic_analysis';

    protected $fillable = [
        'faculty_id',
        'academic_year',
        'semester',
        'A',
        'B',
        'C',
        'D',
        'positive',
        'negative',
        'respondents'
    ];
}
