@extends('layout')

@section('content')
    <div class="container">
        <div class="float-right">
            @if (Auth::check() && Auth::user()->is_admin && !Request::is('text/edit'))
                <form action="{{ route('text/edit') }}" method="get">
                    <button type="submit" class="btn btn-outline-success btn-sm"><img style="width: 20px; fill: blue;" src="{{ url('svg/si-glyph-edit.svg') }}"/>Edit</button>
                </form>
            @endif
        </div>

        <h1 class="mb-3">Главная</h1>

        @if (Request::is('text/edit'))
            <form action="{{ route('text/update') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea class="form-control" name="text" id="editor1" required="">{{ $text->text ?? '' }}</textarea>
                </div>
                <button type="submit">Сохранить</button>
            </form>
        @else
            {!! $text->text !!}
        @endif
    </div>
@endsection
