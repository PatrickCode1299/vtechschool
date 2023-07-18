<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'module_title',
        'student_email',
        'creator_email',
        'trivia_answered',
    ];
}
