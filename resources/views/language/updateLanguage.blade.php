@extends('home')
@section('homeContent')
    <form method="POST" action="/home/language/update/{{ $lang->id }}">
        @csrf

        <input type="text" name="id" value={{ $lang->id }} disabled/>
        <input type="text" name="title" />
        <button type="submit">Submit</button>


    </form>
@endsection
