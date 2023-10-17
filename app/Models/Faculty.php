<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $table = 'faculty';
    
    protected $fillable = [
        'studentID',
        'facultyID',
    ];


    public function user()
    {
        return $this->hasOne(User::class, 'facultyID', 'studentID');
    }
}
