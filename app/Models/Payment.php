<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_name',
        'course_name',
        'student_email',
        'instructor_name',
        'payment_date',
        'payment_amount',
        'invoice_id',
        'status'
    ];
}
