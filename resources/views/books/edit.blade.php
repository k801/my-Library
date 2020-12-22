@extends('layout')
@section('main')




@if($errors->any())
<div class="container alert alert-danger">


    @foreach($errors->all() as $err)
       <p class="m-0">{{$err}}</p>
     @endforeach
</div>

@endif

<form method="POST" action="{{url("books/update/{$book->id}")}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">name</label>
      <input type="text"name='name' class="form-control" value="{{$book->name}}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">description</label>
        <textarea class="form-control m-5" name="desc"  rows="3">{{$book->desc}}</textarea>
    </div>


      <div class="form-group mb-5">

        <select class="custom-select" name="cat_id">
            <option value="{{$c->id}}">{{$c->name}}</option>

            @foreach($cats as $cat)

            <option value="{{$cat->id}}">{{$cat->name}}</option>

            @endforeach
          </select>

    </div>


    <div class="input-group mt-3">
        <div class="custom-file">
            <label>Image</label>
            <img src="{{asset("uploads/$book->img")}}"  class="m-3"width="70px">
          <input type="file" class="control-form" name="img">
        </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
