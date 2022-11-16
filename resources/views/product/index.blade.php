@extends('layouts.main')
@section('content')
    <title>добавить продукт</title>
</head>
<body>
    <H1>продукты</H1>
    
   
     <div>
        <a href="{{route('product.create')}}" class="btn btn-primary mb-3">добавить новый продукт</a>
     </div>
    @foreach($products as $product)
    <div>
    <a href ="{{route('product.show', $product->id)}} "> {{$product->id}}. {{$product->name}}</a>
    @endforeach
    </div>
    
@endsection