@extends('layouts.main')
@section('content')
    <title>Posts</title>
</head>
<body>
    <H1>Редактировать рецепт №{{$post->id}}.</H1>
    <p><h3>всего рецептов:  {{$posts->count()}}</h3></p>
    
    <div>
    <form action =  "{{route('post.update', $post->id)}}" method = "post">
    <!-- токен для безопасной передачи данных всеми методами кроме get-->    
    @csrf
    <!--токен для редактирования, т.к. в html нет метода put/patch -->
    @method('patch')
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name = "title" class="form-control" id="title" placeholder = "title" value = "{{$post->title}}">
    
  </div>
  <div class="mb-3">
    <label for="content" class="form-label">Content</label>
    <textarea name = "content" class="form-control" id="content" placeholder = "content">{{$post->content}}</textarea>
    
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="text" name = "image" class="form-control" id="image" placeholder = "image.jpeg" value = "{{$post->image}}">
    
  </div>
  <div class="form-group">
    <label for="products">продукты</label>
    <select multiple class = "form-control" name = "products[]" id="products">
      @foreach($products as $product)

      <option 
        @foreach($posts as $postProduct)
        {{$product->id == $postProduct->id ? 'selected':''}}
      value="{{$product->id}}">{{$product->name}}</option>
      @endforeach
      @endforeach
    </select>

  </div>
  <button type="submit" class="btn btn-primary">обновить</button>
</form>
    </div>
@endsection