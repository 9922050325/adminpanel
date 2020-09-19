@extends('home')
@section('homeContent')
    <form method="POST" action="/home/category/update/{{ $category->id }}">
        @csrf

        <input type="text" name="id" value={{ $category->id }} disabled/>
        <input type="text" name="title" />
        <button type="submit">Submit</button>


    </form>
@endsection
