<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScormData extends Model
{
    use HasFactory;
  protected  $fillable = [
        "course_id",
        "user_id",
        "data"
  ];
  protected $casts = [
    'data' => 'array'
 ];
}
