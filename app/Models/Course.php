<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use CrudTrait;
    use HasFactory;

    // protected $primaryKey = 'id';
    // public $timestamps = false;
 
    protected $primaryKey = 'id';
    protected $fillable = [
        
        'name',
        'thumbnail',
        'course_type_id',
        
    ];
}
