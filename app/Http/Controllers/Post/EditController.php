<?php

namespace App\Http\Controllers\Post;


use App\Models\Post;
use App\Models\PostProduct;
use App\Models\Product;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
   public function __invoke(Post $post)
   {
      $posts = Post::all();
      $products = Product::all();
      $postProducts = PostProduct::all();
      //dd($post);
      return view('post.edit', compact('postProducts','posts', 'products', 'post'));

   } 

}
