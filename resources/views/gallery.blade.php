@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            @if (Auth::check() && Auth::user()->is_admin)
                <div class="col-md-4 mb-4">
                    <form action="{{ url('/') }}/file-upload" class="dropzone">
                        {{ csrf_field() }}
                        <div class="fallback">
                            <input name="file" type="file" multiple />
                        </div>
                    </form>
                </div>
            @endif
            @foreach($images as $image)
                <div class="col-md-4 mb-4">
                    <a class="fancybox" href="{{ url('uploads/') . '/' . $image->image }}"><img style="width: 100%" src="{{ url('/uploads') . '/' . $image->image }}" alt=""></a>
                </div>
            @endforeach
        </div>
        <div>{{$images->render()}}</div>
    </div>
@endsection
