@extends('layouts.main')
@section('content')
    <title>добавить продукт</title>
</head>
<body>
    <H1>продукты</H1>
    
   
     <div>
        <a href="{{route('product.create')}}" class="btn btn-primary mb-3">добавить новый продукт</a>
     
    @foreach($products as $product)
    <div>
    <a href ="{{route('product.show', $product->id)}} "> 
        
        {{$product->id}}. {{$product->name}} = {{$product->carb}}</a>
    @endforeach
    </div>
    </div>
    <H1>категории</H1>
        <div>
            @foreach($categories as $category)
            <div>
            <a href ="{{route('product.showByCategory', $category->id)}} "> {{ $category->id}}. {{ $category->title}}</a>
            @endforeach
            </div>
        </div>
        
        
@endsection