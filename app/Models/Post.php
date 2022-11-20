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
    //разрешение на редактирование атрибуров в БД([] или = false)
    protected $guarded = [];

    //метод для связывания один ко многим

    public function category(){
    return $this->belongsTo(Category::class, `category_id`,`id`);
}
//метод для связывания многие ко многим и определяет сколько post и какие
//атрубуты связаны с product,т.к. отношения создаем для posts табл. post_product первым аргументом post_id

    public function product(){
        return $this->belongsToMany(Product::class, 'post_products','post_id','product_id');
    }
}
