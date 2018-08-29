@extends('layout')

@section('content')
    <div class="container">
        @foreach($news as $new)
            <h1 class="mb-3">Главная</h1>
        @endforeach
    </div>
@endsection
