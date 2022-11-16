@extends('layouts.main')
@section('content')
    <title>Products</title>
</head>
<body>
    <H1>продукты категории </H1>
    
   
    

    
    <p> категория:
    @foreach($categories as $category)
    {{$category->id == $id ? $category->title:''}}
    
    @endforeach
    </p>
        @foreach($product_cat as $product)
        <div>{{$product->id}}.{{$product->name}}</div>
        @endforeach
        
    <div>
        <a href="{{route('product.index')}}" class="btn btn-primary mt-3">вернуться к списку продуктов</a>
    </div>
    <div>
        <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary mt-3">редактировать</a>
    </div>
    <div>
        <!--оборачиваем в форму т.к. в html нет метода delete -->
        <form action="{{route('product.delete', $product->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value = "удалить!" class="btn btn-primary mt-3">
        </form>
        
    </div>


@endsection