@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            @foreach ($albums as $album)
                <h1>
                    <a href="/gallery?album={{ $album->id }}">
                        {{ $album->name }}
                    </a>
                </h1>

                @foreach ($album->images as $image)
                    <img src="{{ $image->url_cache }}" alt="" class="img-responsive">
                @endforeach
            @endforeach
        </div>
    </div>
@endsection