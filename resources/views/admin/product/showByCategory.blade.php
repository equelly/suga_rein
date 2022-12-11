@extends('layouts.admin')
@section('content')
    <title>Products</title>
</head>
<body>
    <H1>каталог продуктов </H1>
    <h3>категория
   
    

    
    
    @foreach($categories as $category)
        @foreach($product_cat as $product)
    {{$category->id == $product->category_id ? $category->title:''}}
        @endforeach
    @endforeach
   </h3>
        @foreach($product_cat as $product)
        <div>{{$product->id}}.{{$product->name}}</div>
        @endforeach
        
    <div>
        <a href="{{route('admin.product.index')}}" class="btn btn-primary mt-3">вернуться к списку продуктов</a>
    </div>
    


@endsection