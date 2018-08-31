@extends('layout')

@section('content')
    <div class="container">
        @if (Auth::check() && Auth::user()->is_admin)
            <form class="float-left mr-2 mb-3" action="{{ route('news.create' )}}" method="get">
                <button type="submit" class="btn btn-outline-success btn-sm">Создать новость</button>
            </form>
        @endif
        @foreach($news as $new)
            <div class="mb-3 mt-5" style="clear: both; height: 500px">
                <div class="float-right">
                    @if (Auth::check() && Auth::user()->is_admin)
                        <form class="float-left mr-2" action="{{ route('news.edit', $new->id )}}" method="get">
                            <button type="submit" class="btn btn-outline-success btn-sm">Редактировать</button>
                        </form>
                        <form class="float-right" action="{{ route('news.delete', $new->id )}}" method="post">
                            {!! method_field('delete') !!}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-outline-success btn-sm">Удалить</button>
                        </form>
                    @endif
                </div>
                <h1><a style="color: #1b497b" href="{{ route('show', $new->id)  }}">{{ $new->title }}</a></h1>
                <img class="mr-3" style="width: 50%; max-height: 400px; float: left;" src="{{ url('/images') . '/' . $new->image }}">
                <div>
                    {!! \Illuminate\Support\Str::words($new->text, 120, '...') !!}
                </div>
            </div>
        @endforeach
        <div>{{$news->render()}}</div>
    </div>
@endsection
