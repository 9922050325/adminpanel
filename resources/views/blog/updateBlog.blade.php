@extends('master')
@section('content')


<form method="POST" action="" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">Title</label>
      <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ $blog->title }}">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Heading</label>
        <input type="text" name="heading" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ $blog->heading }}">
      </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1">Content</label>
      <textarea class="form-control" name="content"  id="exampleFormControlTextarea1" rows="10" style="resize:none">{{ $blog->content }}</textarea>
    </div>

    <div class="form-group">
        <label for="exampleFormControlFile1">Image</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="blog_image">
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Video</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="blog_video">
      </div>


    <div class="text-center">
        <button type="submit" style="width:50%" class="btn btn-primary">Add</button>
    </div>


  </form>


@endsection
