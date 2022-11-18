<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
     //разрешение на редактирование атрибуров в БД([] или = false)
    protected $guarded = [];
}
