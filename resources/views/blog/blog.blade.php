@extends('master')
@section('content')
@include('flash::message')

    <div class="text-center sticky-top" style="padding:10px">
        <a href="blog/insertblog"><button>Add Blog</button></a>
    </div>

    @include('flash::message')

    <div class="">

            @foreach ($blog as $bl)
            <div class="card" style="padding: 30px;margin:10px">
                <div class="card-header" style="padding:10px">
                   {{ $bl->title }}
                </div>
                  <div class="card-body" style="border: 0.5px solid #ccc;padding:10px">
                    <h5 class="card-title">{{ $bl->heading }}</h5>
                    <p class="card-text">
                        {{ $bl->content }}

                    </p>
                    <div class="col">
                        @if ($bl->image_url != null)
                        <img src="{{ asset('storage/'.$bl->image_url) }}" height="200px" />
                        @endif
                    </div>
                    <div class="col">
                        @if ($bl->video_url != null)
                        <video src="{{ asset('storage/'.$bl->video_url) }}" height="200px" controls="true"></video>
                        @endif
                    </div>

                  </div>
                  <div class="card-footer text-center" style="margin-top:10px">
                    <a href="blog/update/{{ $bl->id }}" class="btn btn-primary">Update</a>
                    <a href="blog/delete/{{ $bl->id }}" class="btn btn-danger">Delete</a>
                  </div>
            </div>
            @endforeach






    </div>
@endsection
