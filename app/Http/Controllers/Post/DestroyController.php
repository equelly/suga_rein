<?php

namespace App\Http\Controllers\Post;


use App\Models\Post;
use App\Http\Controllers\Controller;

class DestroyController extends Controller
{
   public function __invoke(Post $post)
   {
      $post->destroy($post->id);
        return redirect()->route('post.index');

   } 

}
