<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
    //можно присвоить какое-либо свойство, например:
    //public $someproperty;
    //
    //хотя таблица в БД создавалась миграцией вместе с моделью, но лучше указать явно
    protected $table = 'posts';
    
    protected $guarded = [];
}
