<?php

namespace App\Services\Post;

use App\Models\Post;


class Service 
{
public function store($data)
{
    $products = $data['products'];
      
    unset($data['products']);
    
    
    $post = Post::create($data);

    $post->product()->attach($products);
}

public function update($post, $data)
{
    //применяем тот же подход что и  для создания
    $products = $data['products'];
    unset($data['products']);
    $post->update($data);
    //только метод attach заменим sync
    $post->product()->sync($products);
}

}