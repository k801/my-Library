@extends('layout')
@section('title')
show
@endsection
@section('main')

<h4>Title</h4>:{{$book->name}}
<p>desc{{$book->desc}}</p>

<a href="{{url('books')}}">back</a>
@endsection
