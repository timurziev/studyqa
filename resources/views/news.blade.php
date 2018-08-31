@extends('layout')

@section('content')
    <div class="container">
        @foreach($news as $new)
            <div class="mb-3 mt-5" style="clear: both; height: 500px">
                <div class="float-right">
                    @if (Auth::check() && Auth::user()->is_admin)
                        <p><a href="">Редактировать</a></p>
                    @endif
                </div>
                <h1><a style="color: #1b497b" href="{{ route('show', $new->id)  }}">{{ $new->title }}</a></h1>
                <img class="mr-3" style="width: 50%; float: left;" src="{{ url('/images') . '/' . $new->image }}">
                <div>
                    {{ \Illuminate\Support\Str::words($new->text, 120, '...') }}
                </div>
            </div>
        @endforeach
        <div>{{$news->render()}}</div>
    </div>
@endsection
