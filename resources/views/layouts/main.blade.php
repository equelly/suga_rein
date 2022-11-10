<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    <div>
        <nav>
            <ul>
                <li><a href = "{{route('main.index')}}">main</a></li>
                <li><a href = "{{route('post.index')}}">posts</a></li>
                <li><a href = "{{route('about.index')}}">about</a></li>
                <li><a href = "{{route('contacts.index')}}">contacts</a></li>

            </ul>
        </nav>
    </div>
    
    <div>
    
    </div>

    @yield('content')

    </body>
</html>