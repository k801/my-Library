@extends('layout')
@section('title')
latest
@endsection
@section('main')
@foreach ($books as $book)

<h3>{{$book->name}}</h3>
 <p>{{$book->desc}}</p>
 <hr>
@endforeach

<a href="{{url('books')}}">back</a>

@endsection
