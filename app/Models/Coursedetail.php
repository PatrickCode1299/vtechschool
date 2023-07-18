<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coursedetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_start_date',
        'course_title',
        'owner_email',
        'tutor_email',
        'views',
    ];
}
