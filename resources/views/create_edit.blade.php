@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-4">
                <h1>{{ Request::is('*/edit/*') ? 'Редактирование статьи' : 'Создание статьи' }}</h1>
                <form action="@if (Request::is('*/edit/*')){{ route('news.update', $new->id) }} @else {{ route('news.store') }} @endif" method="post" enctype="multipart/form-data" class="article-form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Заголовок</label>
                        <input type="text" class="form-control" name="title" required="" value="{{ $new->title ?? '' }}">
                    </div>
                    @if (isset($new))
                        <img src="{{ url('/images') . '/' .$new->image }}" width="300" alt="">
                    @endif
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Изображение</label><br>
                        <input type="file" name="image" {{ isset($new) ? '' : 'required' }}>
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Текст</label>
                        <textarea class="form-control" name="text" id="editor1" required="">{{ $new->text ?? '' }}</textarea>
                    </div>
                    <button class="btn btn-default" type="submit">Отправить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
