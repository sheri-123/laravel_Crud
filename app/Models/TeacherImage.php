<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherImage extends Model
{
    use HasFactory;
    protected $table = 'teacher_images';
    protected $fillable =[
        'student_id',
        'image',
    ];
}
