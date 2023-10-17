<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation_Responses extends Model
{
    use HasFactory;

    protected $table = 'evaluation_responses';

    protected $fillable = [
        'question',
        'response',
        'comment',
        // Add 'evaluation_record_id' to this array
        'evaluation_record_id',
        // ...
    ];
    
}
