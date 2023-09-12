<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTaker extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $fillable = [
        'student_id',
        'class_id',
        'course_id'
    ];
}
