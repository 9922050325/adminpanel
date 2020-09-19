@extends('master')
@section('content')
<form method="POST" action="">
    <div class="form-group">
      <label for="exampleFormControlInput1">Title</label>
      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Heading</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
      </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1">Content</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" style="resize:none"></textarea>
    </div>

    <div class="text-center">
        <button type="submit" style="width:50%" class="btn btn-primary">Add</button>
    </div>
  </form>
@endsection
