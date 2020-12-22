@extends('layout')
@section('main')




@if($errors->any())
<div class="container alert alert-danger">


    @foreach($errors->all() as $err)
       <p class="m-0">{{$err}}</p>
     @endforeach
</div>

@endif

<form method="POST" action="{{url('registerData')}}"  >
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">name</label>
      <input type="text"name='name' class="form-control" >
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">email</label>
        <input type="text"name='email' class="form-control" >
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">password</label>
        <input type="password"name='password' class="form-control" >
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">confim password</label>
        <input type="password"name='password_confirmation' class="form-control" >
      </div>
    <button type="submit" class="btn btn-primary">register</button>
  </form>
@endsection
