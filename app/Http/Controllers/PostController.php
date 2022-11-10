<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index () {
        $post = Post::find(2);// обращаемся через класс Post к методу find,который ищет по (id)
        //dd($post);
        $posts = Post::all();
        //dd($posts); дампит переменную и останавливает скрипт
        //методом view(): из директории /viev первый аргумент   <file>, второй - метод compact()c  аргументом в виде переменной без $ строка 12
        return view('posts', compact('posts'));
    } 
    public function create () {
        $postsArr = [
            ['title' => 'title post',
            'content' => 'some interesting text',
            'image' => 'picture',
            'likes' => 20,
            'is_published' => 1,
        ],
        ['title' => 'another title post',
            'content' => 'another some interesting text',
            'image' => 'another picture',
            'likes' => 50,
            'is_published' => 0,
    ],
];
//добавление массива объектов (постов) в БД
foreach ($postsArr as $item){//в цикле перебираем многомерный массив и присваиваем $item массив данных для 
    //dd($item);
    POST:: create ($item);

}
/*добавление одного объекта (поста) в БД
POST:: create ([
    'title' => 'another title post',
            'content' => 'another some interesting text',
            'image' => 'another picture',
            'is_published' => 0,
]);*/
dd('created');
    }
    public function update () {
        $post = Post::find(3);
        //затем через переменную вызовем метод update класса Post
        //обновим НУЖНЫЕ атрибуты (поля) в БД
        $post->update([
            'content' => 'update! interesting text',
            'image' => 'update! picture',
            'is_published' => 0,


        ]);
        echo 'информация добавлена!'.$post['updated_at'];
    }
    public function delete()
    {
//если удаляем данные
        //$post = Post::find(5);
        
        //$post->delete();
//для восстановления прописываем softDelete() в функции up
//пример восстановления ранее удаленного атрибута(поля) зарезервированными методами
        $post = Post::withTrashed()->find(5);
        $post->restore();

        echo 'удалено: '.$post['updated_at'].'успешно!';
    }
//избежать дублирования по каким-либо атрибутам при добавлении  
//аргументы два массива сравнивает ключевые атрибуты первого с БД
//если совпадают не добавляет для наглядности выводит dump
    //firstOrCreate
    //updateOrCreate
    
public function firstOrCreate()
    {
    $post  = Post::FirstOrCreate([
    'title' => '3some title post',
],
 [
    'title' => '33some title post',
    'content' => 'another #3some interesting text',
    'image' => 'another picture',
    'likes'=> 500,
    'is_published' => 0,
]);
dump($post->content);
}
//проверяет массив с ключевыми атрибутами совпадают -обновляет, нет записывает
public function updateOrCreate()
    {
    $post  = Post::updateOrCreate([
    'title' => 'title post',
    'content' => 'another old interesting text',
],
 [
    'title' => 'new post',
    'content' => 'another new interesting text',
    'image' => 'another new 20picture',
    'likes'=> 500,
    'is_published' => 0,
]);
dd($post->content);
}

}
