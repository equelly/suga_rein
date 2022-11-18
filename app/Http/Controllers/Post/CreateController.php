<?php

namespace App\Http\Controllers\Post;


use App\Models\Post;
use App\Models\Product;
use App\Http\Controllers\Controller;

class CreateController extends Controller
{
   public function __invoke()
   {
      $posts = Post::all();
        $products = Product::all();
        return view('post.create', compact('posts', 'products'));  
        
        
   } 

}
