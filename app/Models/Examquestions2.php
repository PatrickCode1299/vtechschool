<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examquestions2 extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_title',
        'tutor_email',
        'question',
        'answer1',
        'answer2',
        'answer3',
        'answer4',
        'question_id'
    ];
}
