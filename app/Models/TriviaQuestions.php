<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TriviaQuestions extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_title',
        'module_title',
        'instructor_email',
        'trivia_question',
        'answer',
        'answer1',
        'answer2',
        'answer3'

    ];
}
