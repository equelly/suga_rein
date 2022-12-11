@extends('layouts.admin')
@section('content')
    
</head>
<body>
    <div class="container">
        <div class="ml-4 pl-4">
            <H1>рецепты</H1>
            <p><h3>всего рецептов:  {{$posts->total()}}</h3></p>
            <div >
                <a href="{{route('post.create')}}" class="btn btn-primary mb-3">добавить новый рецепт</a>
            </div>
        </div>
        <div class="ml-5">
            @foreach($posts as $post)
            <div class="callout mb-1 w-90"><a href ="{{route('post.show', $post->id)}} ">
            <h3 class="fw-light text-muted">{{$post->title}}</h3><p class="text-muted">рецепт: {{$post->content}}</p></a>
            <p>
                 необходимые продукты
            </p>
            @foreach($postproducts as $postproduct)
                @if($post->id ==$postproduct['post_id'])
                 
                    @foreach($products as $product)
                    
                    @if($postproduct['product_id'] == $product->id )
                    <div class="btn btn-outline-primary ml-2">{{$product->name}}</div>
                    @endif
                        
                   
                    @endforeach
                @endif
                @endforeach
            
            </div>
            @endforeach
        
        </div>
        
        <!-- пагинация-->
        <div>
            {{$posts->withQueryString()->links()}}
        </div>
    </div>
@endsection