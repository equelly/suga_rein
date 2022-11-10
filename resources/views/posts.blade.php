@extends('layouts.main')
@section('content')
    <title>Posts</title>
</head>
<body>
    <H1>Посты</H1>
    <p><h3>всего постов:  {{$posts->count()}}</h3></p>
    @foreach($posts as $post)
    <div>
    {{$post->id}}. {{$post->title}}____{{$post->content}}
    @endforeach
    </div>
@endsection