@extends('layouts.admin')

@section('content')
<H1>рецепты</H1>
    <div>
    <H1>новый рецепт</H1>
    <p><h3>всего рецептов:  {{$posts->count()}}</h3></p>
    
    <div>
    <form action =  "{{route('admin.post.store')}}" method = "POST">
    <!-- токен для безопасной передачи данных всеми методами кроме get-->    
    @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name = "title" class="form-control" value ="{{old('title')}}"
    id="title" placeholder = "title">
    
    @error('title')
      <p class="text-danger">{{$message}}</p>

    @enderror
  </div>
  <div class="mb-3">
    <label for="content" class="form-label">Content</label>
    <textarea name = "content" class="form-control" 
    id="content" placeholder = "content">{{old('content')}}</textarea>
    @error('content')
      <p class="text-danger">{{$message}}</p>

    @enderror
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="text" name = "image" class="form-control" value ="{{old('image')}}"
    id="image" placeholder = "image.jpeg">
    @error('image')
      <p class="text-danger">{{$message}}</p>

    @enderror
  </div>
  <div class="form-group">
    <label for="products">продукты</label>
    <select multiple class = "form-control" name = "products[]" id="products">
      @foreach($products as $product)
      <option 
        {{ (is_array(old('products')) and in_array($product->id, old('products'))) ? ' selected' : '' }}
      value="{{$product->id}}">{{$product->name}}</option>
      @endforeach
    </select>

  </div>
    <div>
        <button type="submit" class="btn btn-primary mb-3">добавить </button>
  
        <a href="{{route('admin.post.index')}}" class="btn btn-primary mb-3">вернуться</a>
    </div>
</form>
    
</div>
@endsection