<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_title',
        'file1',
        'student_name',
        'tutors_name',
        'unqiue_id',
        'price',
        'module_title',
        'preview',
        'views',
        'category',
        'description'
    ];
    public function tutors(){
        return $this->belongsTo(Tutor::class);
    }
    public function payments(){
        return $this->belongsTo(Payment::class);
    }
}
