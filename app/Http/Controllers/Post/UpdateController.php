<?php

namespace App\Http\Controllers\Post;


use App\Models\Post;
use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
   public function __invoke(Post $post)
   {
      $data = request()->validate([
         'title'=>'required|string',
         'content'=>'required|string',
         'image'=>'required|string',
         'products'=>'',

     ]);
     //применяем тот же подход что и  для создания
     $products = $data['products'];
     unset($data['products']);
     $post->update($data);
     //только метод attach заменим sync
     $post->product()->sync($products);
     
     return redirect()->route('post.show', $post->id);
     
 }
 public function destroy(Post $post)
 {
     
     $post->destroy($post->id);
     return redirect()->route('post.index');

   } 

}
