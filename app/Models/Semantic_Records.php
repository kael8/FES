<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semantic_Records extends Model
{
    use HasFactory;

    protected $table = 'semantic_records';

    protected $fillable = [
        'id',
        'positive',
        'negative',
        'respondents',
        'eval_id'
    ];
}
