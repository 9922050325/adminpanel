@extends('home')
@section('homeContent')
    <form method="POST" action="/home/country/update/{{ $country->id }}">
        @csrf

        <input type="text" name="id" value={{ $country->id }} disabled/>
        <input type="text" name="title" />
        <button type="submit">Submit</button>


    </form>
@endsection
