@extends('layout')

@section('title')
index
@endsection
<a href="/books/create" class="btn btn-success p-3 mb-5">Add</a>

@section('main')



@foreach ($books as $book)


   <img src="{{asset("uploads/$book->img")}}" height="200px">
  {{$book->name}}
   {{$book->desc}}

    <h4>{{$book->cat->name}}</h4>
  {{-- Created R {{$book->id}} --}}
  @auth
  <a href="{{url("books/delete/{$book->id}")}}" class="btn btn-danger"> delete</a>
  <a href="{{url("books/edit/{$book->id}")}}" class="btn btn-success"> Edit</a>
  @endauth


  <hr>
@endforeach

{{$books->links() }}



@endsection
