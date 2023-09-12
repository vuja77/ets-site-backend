<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeworkUpload extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $fillable = [
        'homework_id',
        'user_id',
        'url',
        'file_path',
        'post_content'
    ];
}
