@extends('layout')

@section('content')
    <div class="container">
            <div class="mb-3 mt-5">
                <h1><a style="color: #1b497b" href="">{{ $new->title }}</a></h1>
                <img class="mb-4" style="width: 100%;" src="{{ url('/images') . '/' . $new->image }}">
                <div>
                    {{ $new->text }}
                </div>
            </div>
    </div>
@endsection
