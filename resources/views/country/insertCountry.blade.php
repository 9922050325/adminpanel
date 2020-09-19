@extends('master')
@section('content')

<div>
    @include('flash::message')
</div>
    <form method="POST" action="">
        @csrf
        <input type="text" name="title" />
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
    <div class="container">
        <div class="row text-center">
                <div class="col">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>

                          @foreach ($country as $cont)
                          <tr>
                            <th scope="row">{{$cont->id }}</th>
                            <td>{{ $cont->title }}</td>
                            <td>
                               {{-- <a href='language/update/{{ $lang->id }}'> <button class="btn btn-primary">Update</button></a> --}}
                                <a href="/home/country/delete/{{ $cont->id }}" ><button class="btn btn-danger">delete</button></a>
                               <a href="/home/country/update/{{ $cont->id }}"><button class="btn btn-success">update</button></a>
                            </td>
                          </tr>
                       @endforeach
                        </tbody>
                      </table>
                </div>
        </div>
    </div>
</div>

    </div>
@endsection
