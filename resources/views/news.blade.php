@extends('layout')

@section('content')
    <div class="container">
        @foreach($news as $new)
            <h1 class="mb-4 mt-5">{{ $new->title }}</h1>
            <img class="mb-3" style="width: inherit;" src="{{ url('/images') . '/' . $new->image }}">
            <div>
                {{ $new->text }}
            </div>
        @endforeach
        <div class="mt-5">{{$news->render()}}</div>
    </div>
@endsection
