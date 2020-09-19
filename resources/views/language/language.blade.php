@extends('master')
@section('content')

<div>
    @include('flash::message')
</div>
<form method="POST" action="">
    @csrf
    <input type="text" name="title" />
    <button type="submit" class="btn btn-primary">add</button>
</form>
    <div class="col text-center">


        <table class="table">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>

              @foreach ($language as $lang)
              <tr>
                <th scope="row">{{$lang->id }}</th>
                <td>{{ $lang->title }}</td>
                <td>
                   {{-- <a href='language/update/{{ $lang->id }}'> <button class="btn btn-primary">Update</button></a> --}}
                    <a href="/home/language/delete/{{ $lang->id }}" ><button class="btn btn-danger">delete</button></a>
                   <a href="/home/language/update/{{ $lang->id }}"><button class="btn btn-success">update</button></a>
                </td>
              </tr>
           @endforeach
            </tbody>
          </table>




    </div>
@endsection
