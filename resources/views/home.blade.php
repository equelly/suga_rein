@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow-lg p-3 mb-5 bg-body rounded">
            <div class="card">
                <a href="{{asset('admin/post')}}"class="card-header">{{ __('Перейти на личную страницу') }}</a>

                <div class="card">
                    <a class="m-3" href="{{route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Вернуться к регистрации') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <?php $time = new DateTime;
                    $time = $time->format("H");
                    if($time>10&&$time<15){
                       echo "Добрый день,";
                    }elseif($time>16&&$time<18){
                        echo "Добрый вечер,";

                    }else{echo "Доброй ночи,";}
                    
                    ?>
                    {{ Auth::user()->name}}!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
