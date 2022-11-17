@extends('layouts.main')
@section('content')
    <title>Products</title>
</head>
<body>
    <H1>продукты категории </H1>
    
   
    

    
    <p> категория:
    @foreach($categories as $category)
        @foreach($product_cat as $product)
    {{$category->id == $product->category_id ? $category->title:''}}
        @endforeach
    @endforeach
    </p>
        @foreach($product_cat as $product)
        <div>{{$product->id}}.{{$product->name}}</div>
        @endforeach
        
    <div>
        <a href="{{route('product.index')}}" class="btn btn-primary mt-3">вернуться к списку продуктов</a>
    </div>
    


@endsection