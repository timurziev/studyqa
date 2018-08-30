@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($images as $image)
                <div class="col-md-4 mb-4">
                    <a class="fancybox" href="{{ url('uploads/') . '/' . $image->image }}"><img style="width: 100%" src="{{ url('/uploads') . '/' . $image->image }}" alt=""></a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
