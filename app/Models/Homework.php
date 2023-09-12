<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $table = "homeworks";
    protected $fillable = [
        'name',
        'course_id',
        'deadline',
        'description',
    ];
}
