@extends('layout')
@section('main')

@if($errors->any())
<div class="container alert alert-danger">


    @foreach($errors->all() as $err)
       <p class="m-0">{{$err}}</p>
     @endforeach
</div>

@endif

<form method="POST" action="{{url("cats/update/{$cat->id}")}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">name</label>
      <input type="text"name='name' class="form-control" value="{{$cat->name}}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">description</label>
        <textarea class="form-control m-5" name="desc"  rows="3">{{$cat->desc}}</textarea>
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
