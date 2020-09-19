@extends('master')
@section('content')
@include('flash::message')

    <div class="text-center sticky-top" style="padding:10px">
        <a href="blog/insertblog"><button>Add Blog</button></a>
    </div>
    <div class="">

        <div class="card" style="padding: 30px;margin:10px">
            <div class="card-header" style="padding:10px">
               Title
            </div>
              <div class="card-body" style="border: 0.5px solid #ccc;padding:10px">
                <h5 class="card-title">Blog heading</h5>
                <p class="card-text">With supporting text below as a
                    natural lead-in to additional content. Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Accusamus aperiam nihil molestiae eius, tempore delectus minus exercitatione
                    m facilis aut excepturi esse, rem dolorum dignissimos nam velit nesciunt amet quos odio?
                </p>
              </div>
              <div class="card-footer text-center" style="margin-top:10px">
                <a href="" class="btn btn-primary">Update</a>
                <a href="" class="btn btn-danger">Delete</a>
              </div>
        </div>

        <div class="card" style="padding: 30px;margin:10px">
            <div class="card-header" style="padding:10px">
               Title
            </div>
              <div class="card-body" style="border: 0.5px solid #ccc;padding:10px">
                <h5 class="card-title">Blog heading</h5>
                <p class="card-text">With supporting text below as a
                    natural lead-in to additional content. Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Accusamus aperiam nihil molestiae eius, tempore delectus minus exercitatione
                    m facilis aut excepturi esse, rem dolorum dignissimos nam velit nesciunt amet quos odio?
                </p>
              </div>
              <div class="card-footer text-center" style="margin-top:10px">
                <a href="" class="btn btn-primary">Update</a>
                <a href="" class="btn btn-danger">Delete</a>
              </div>
        </div>




    </div>
@endsection
