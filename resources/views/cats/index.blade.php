@extends('layout')

@section('title')
index
@endsection
<a href="/cats/create" class="btn btn-success p-3 mb-5">Add</a>

@section('main')

@include('cats/success')

@foreach ($cats as $cat)

<h2>{{$cat->name}}</h2>
<p>{{$cat->desc}}</p>


  {{-- Created R {{$book->id}} --}}
  <a href="{{url("cats/delete/{$cat->id}")}}" class="btn btn-danger"> delete</a>
  <a href="{{url("cats/edit/{$cat->id}")}}" class="btn btn-success"> Edit</a>

  <hr>
@endforeach




@endsection
