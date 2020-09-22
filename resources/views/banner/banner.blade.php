@extends('master')
@section('content')

@include('flash::message')

    <form method="POST" action="" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleFormControlFile1">Image</label>
            <input type="file" class="form-control-file" id="bannerImageInput" name="banner_image">
          </div>

          <div class="form-group">
            <label for="exampleFormControlFile1">Start Date</label>
            <input type="date" class="form-control-file" id="bannerImageInput" name="start_date" required>
          </div>

          <div class="form-group">
            <label for="exampleFormControlFile1">End Date</label>
            <input type="date" class="form-control-file" id="bannerImageInput" name="end_date" required>
          </div>

            <button type="submit" class="btn btn-primary">Add Banner Image</button>
    </form>

    <div>
        @foreach ($banner as $item)
        <div class="card" style="padding: 30px;margin:10px">
            <img src="{{ asset('storage/'.$item->img_url) }}" alt="Avtar" height="200px">
            <p>Start date : {{ $item->start_date }}</p>
            <p>End date : {{ $item->end_date }}</p>
            <p>Status: {{ $item->status }}</p>
            <div>
                <a href="/home/banner/update/{{ $item->id }}" class="btn btn-warning">update</a>
                <a href="/home/banner/status/{{ $item->id }}" class="btn btn-danger">Deactivate</a>
            </div>
        </div>
        @endforeach
    </div>
@endsection

<script>

</script>
