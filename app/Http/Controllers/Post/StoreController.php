<?php

namespace App\Http\Controllers\Post;


use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Post\BaseController;

class StoreController extends BaseController
{
   public function __invoke()
   {  
      $data = request()->validate([
            'title'=>'required|string',
            'content'=>'required|string',
            'image'=>'required|string',
            'products'=>'',
        ]);
      
        $products = $data['products'];
      
        unset($data['products']);
        
        $post = Post::create($data);
    
        $post->product()->attach($products);
        return redirect()->route('post.index');
      
    }
   
}
