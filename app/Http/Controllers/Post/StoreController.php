<?php

namespace App\Http\Controllers\Post;


use App\Models\Post;
use App\Http\Controllers\Controller;

class StoreController extends Controller
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
