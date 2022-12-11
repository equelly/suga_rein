@extends('layouts.admin')

@section('content')
<title>добавить продукт</title>
</head>
<body>
    <H1>продукты</H1>
    <p>общеее количество: {{$products->count()}}</p>
   
     <div>
        <a href="{{route('admin.product.create')}}" class="btn btn-primary mb-3">добавить новый продукт</a>
     
   <div class="col-4">
    <div id="list-example" class="list-group-flush sticky-top ">
    
      <div class="table-responsive">
            @foreach($categories as $category)
            <div>
            <a href ="{{route('admin.product.showByCategory', $category->id)}} "> {{ $category->id}}. {{ $category->title}}</a>
            @endforeach
           
            <div class="col-7">	    
    @foreach($products as $product)
    <div>
    <a href ="{{route('admin.product.show', $product->id)}} "> 
        
        {{$product->id}}. {{$product->name}} = {{$product->carb}}</a>
    @endforeach
    </div>
    </div>
        </div>
    </div>
   </div>
   
   
        </div>
        <div>
        {{$products->links()}}
        </div>
@endsection