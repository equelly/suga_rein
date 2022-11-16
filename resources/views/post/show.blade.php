@extends('layouts.main')
@section('content')
    <title>Posts</title>
</head>
<body>
    <H1>Рецепт №{{$post->id}}.</H1>
    <p><h3>всего рецептов:  {{$posts->count()}}</h3></p>
   
    <div>
    {{$post->id}}. {{$post->title}}____{{$post->content}}
   
    </div>
    <div>
        <a href="{{route('post.index')}}" class="btn btn-primary mt-3">вернуться к постам</a>
    </div>
    <div>
        <a href="{{route('post.edit', $post->id)}}" class="btn btn-primary mt-3">редактировать</a>
    </div>
    <div>
        <!--оборачиваем в форму т.к. в html нет метода delete -->
        <form action="{{route('post.delete', $post->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value = "удалить!" class="btn btn-primary mt-3">
        </form>
        
    </div>


@endsection